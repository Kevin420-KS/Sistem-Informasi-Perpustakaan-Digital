<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PembacaResource\Pages;
use App\Models\Pembaca;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class PembacaResource extends Resource
{
    protected static ?string $model = Pembaca::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Pembaca';
    protected static ?string $pluralModelLabel = 'Pembaca';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')->required()->maxLength(255),

            TextInput::make('usia')
                ->numeric()
                ->required()
                ->live() // agar bisa trigger perubahan secara langsung
                ->afterStateUpdated(function ($state, callable $set) {
                    if ($state <= 9) {
                        $set('range_umur', 'Anak-anak');
                    } elseif ($state <= 12) {
                        $set('range_umur', 'Praremaja');
                    } elseif ($state <= 17) {
                        $set('range_umur', 'Remaja');
                    } elseif ($state <= 40) {
                        $set('range_umur', 'Dewasa');
                    } else {
                        $set('range_umur', 'Dewasa');
                    }
                }),

            Select::make('gender')->required()->options([
                'Laki-laki' => 'Laki-laki',
                'Perempuan' => 'Perempuan',
            ]),

            TextInput::make('range_umur')
                ->disabled()
                ->dehydrated(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('usia')->sortable(),
                Tables\Columns\TextColumn::make('gender')->searchable(),
                Tables\Columns\TextColumn::make('range_umur'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Dibuat'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
