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
            TextInput::make('judul')->required(),
            TextInput::make('penulis')->required(),
            TextInput::make('jenis_buku')->required(),
            TextInput::make('tahun_terbit')->numeric()->required(),
            TextInput::make('platform')->required(),
            DatePicker::make('tanggal_rilis')->required(),
            Select::make('status_akses')
                ->required()
                ->options([
                    'gratis' => 'Gratis',
                    'beli penuh' => 'Beli Penuh',
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
                TextColumn::make('judul')->searchable()->sortable(),
                TextColumn::make('penulis')->searchable()->sortable(),
                TextColumn::make('jenis_buku'),
                TextColumn::make('tahun_terbit'),
                TextColumn::make('platform'),
                TextColumn::make('tanggal_rilis')->date(),
                TextColumn::make('status_akses'),
            ])
            ->filters([])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\DeleteBulkAction::make(),
            ]);
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
