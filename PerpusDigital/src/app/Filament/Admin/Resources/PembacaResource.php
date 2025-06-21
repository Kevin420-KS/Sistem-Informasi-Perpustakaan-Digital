<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PembacaResource\Pages;
use App\Models\Pembaca;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class PembacaResource extends Resource
{
    protected static ?string $model = Pembaca::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Pembaca';
    protected static ?string $modelLabel = 'Pembaca';
    protected static ?string $pluralModelLabel = 'Pembaca';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')
                ->required()
                ->label('Nama Lengkap'),

            TextInput::make('usia')
                ->numeric()
                ->required()
                ->label('Usia'),

            Select::make('gender')
                ->label('Jenis Kelamin')
                ->options([
                    'Laki-laki' => 'Laki-laki',
                    'Perempuan' => 'Perempuan',
                ])
                ->required(),

            Select::make('kelompok_usia')
                ->label('Kelompok Usia')
                ->options([
                    'anak-anak' => 'anak-anak',
                    'remaja' => 'remaja',
                    'dewasa muda' => 'dewasa muda',
                    'dewasa' => 'dewasa',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
                TextColumn::make('nama')
                    ->searchable()
                    ->sortable()
                    ->label('Nama'),

                TextColumn::make('usia')
                    ->searchable()
                    ->label('Usia'),

                TextColumn::make('gender')
                    ->searchable()
                    ->label('Jenis Kelamin'),

                TextColumn::make('kelompok_usia')
                    ->searchable()
                    ->label('Kelompok Usia'),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
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
