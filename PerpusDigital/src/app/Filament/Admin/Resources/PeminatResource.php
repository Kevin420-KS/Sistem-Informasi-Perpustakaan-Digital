<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PeminatResource\Pages;
use App\Models\Peminat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class PeminatResource extends Resource
{
    protected static ?string $model = Peminat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Peminat';
    protected static ?string $pluralLabel = 'Peminat';
    protected static ?string $navigationLabel = 'Peminat';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('usia_min')
                ->numeric()
                ->required(),

            TextInput::make('usia_max')
                ->numeric()
                ->required(),

            TextInput::make('kelompok_usia')
                ->required(),

            TextInput::make('jenis_buku')
                ->required(),

            TextInput::make('laki_laki')
                ->numeric()
                ->required()
                ->reactive()
                ->afterStateUpdated(fn ($state, callable $set, callable $get) =>
                    $set('total_pembaca', (int)$state + (int)$get('perempuan'))
                ),

            TextInput::make('perempuan')
                ->numeric()
                ->required()
                ->reactive()
                ->afterStateUpdated(fn ($state, callable $set, callable $get) =>
                    $set('total_pembaca', (int)$get('laki_laki') + (int)$state)
                ),

            TextInput::make('total_pembaca')
                ->numeric()
                ->required()
                ->readonly(), // penting: readonly agar tetap dikirim, tapi tidak bisa diedit

            Select::make('tingkat_minat')
                ->required()
                ->label('Tingkat Minat')
                ->options([
                    'kurang diminati' => 'kurang diminati',
                    'lumayan diminati' => 'lumayan diminati',
                    'sangat diminati' => 'sangat diminati',
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kelompok_usia')->searchable()->sortable(),
                TextColumn::make('jenis_buku')->searchable(),
                TextColumn::make('laki_laki'),
                TextColumn::make('perempuan'),
                TextColumn::make('total_pembaca')->searchable(),
                TextColumn::make('tingkat_minat')->searchable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPeminats::route('/'),
            'create' => Pages\CreatePeminat::route('/create'),
            'edit' => Pages\EditPeminat::route('/{record}/edit'),
        ];
    }
}
