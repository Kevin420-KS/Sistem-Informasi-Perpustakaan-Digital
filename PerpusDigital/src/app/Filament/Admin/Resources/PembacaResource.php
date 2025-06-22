<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PembacaResource\Pages;
use App\Models\Pembaca;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PembacaResource extends Resource
{
    protected static ?string $model = Pembaca::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Pembaca';
    protected static ?string $pluralModelLabel = 'Pembaca';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('usia')
                    ->numeric()
                    ->required(),

                Forms\Components\Select::make('gender')
                    ->required()
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ]),

                Forms\Components\TextInput::make('range_umur')
                    ->disabled()
                    ->dehydrated(false), // Hanya ditampilkan, tidak dikirim saat submit
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('usia'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('range_umur'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Dibuat'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Tombol edit per baris
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(), // ✔️ Aktifkan delete massal
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPembaca::route('/'),
            'create' => Pages\CreatePembaca::route('/create'),
            'edit' => Pages\EditPembaca::route('/{record}/edit'),
        ];
    }
}
