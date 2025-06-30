<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BukuResource\Pages;
use App\Models\Buku;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;

// Komponen form
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Set;

// Komponen tabel
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;

class BukuResource extends Resource
{
    // Menghubungkan resource dengan model Buku
    protected static ?string $model = Buku::class;

    // Konfigurasi sidebar admin
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Buku';
    protected static ?string $pluralModelLabel = 'Buku';
    protected static ?string $slug = 'buku';

    /**
     * Mendefinisikan form create & edit buku
     */
    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('judul')->label('Judul')->required(),
            TextInput::make('penulis')->label('Penulis')->required(),
            TextInput::make('jenis_buku')->label('Jenis Buku')->required(),
            TextInput::make('tahun_terbit')->label('Tahun Terbit')->numeric()->required(),

            // Dropdown platform yang otomatis mengatur status akses
            Select::make('platform')
                ->label('Platform')
                ->required()
                ->options([
                    'Perpusnas' => 'Perpusnas',
                    'Gramedia Digital' => 'Gramedia Digital',
                ])
                ->reactive()
                ->afterStateUpdated(function (Set $set, ?string $state) {
                    if ($state === 'Perpusnas') {
                        $set('status_akses', 'gratis');
                    } elseif ($state === 'Gramedia Digital') {
                        $set('status_akses', 'beli penuh');
                    } else {
                        $set('status_akses', null);
                    }
                }),

            DatePicker::make('tanggal_rilis')->label('Tanggal Rilis')->required(),

            // Input status akses otomatis (non-editable)
            TextInput::make('status_akses')
                ->label('Status Akses')
                ->required()
                ->disabled()
                ->reactive(),
        ]);
    }

    /**
     * Mendefinisikan tabel daftar buku
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->label('Judul')->searchable()->sortable(),
                TextColumn::make('penulis')->label('Penulis')->searchable()->sortable(),
                TextColumn::make('jenis_buku')->label('Jenis Buku'),
                TextColumn::make('tahun_terbit')->label('Tahun Terbit')->searchable(),
                TextColumn::make('platform')->label('Platform')->searchable(),
                TextColumn::make('tanggal_rilis')->label('Tanggal Rilis')->date(),
                TextColumn::make('status_akses')->label('Status Akses'),
            ])
            ->headerActions([ CreateAction::make() ])
            ->actions([ EditAction::make() ])
            ->bulkActions([ DeleteBulkAction::make() ]);
    }

    /**
     * Mendefinisikan rute halaman untuk resource
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBuku::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }
}
