<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BukuResource\Pages;
use App\Models\Buku;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Set;

class BukuResource extends Resource
{
    protected static ?string $model = Buku::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Buku';
    protected static ?string $pluralModelLabel = 'Buku';
    protected static ?string $slug = 'buku';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('judul')->label('Judul')->required(),
            TextInput::make('penulis')->label('Penulis')->required(),
            TextInput::make('jenis_buku')->label('Jenis Buku')->required(),
            TextInput::make('tahun_terbit')->label('Tahun Terbit')->numeric()->required(),
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
            TextInput::make('status_akses')
                ->label('Status Akses')
                ->required()
                ->disabled()
                ->reactive(),
        ]);
    }

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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBuku::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }
}
