<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PeminatResource\Pages;
use App\Models\Peminat;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class PeminatResource extends Resource
{
    protected static ?string $model = Peminat::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';
    protected static ?string $label = 'Peminat';
    protected static ?string $pluralLabel = 'Peminat';
    protected static ?string $navigationLabel = 'Peminat';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('kelompok_usia')
                ->required()
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set) {
                    // Set usia_min dan usia_max berdasarkan pilihan kelompok usia
                    $ranges = [
                        'Anak-anak' => [0, 9],
                        'Praremaja' => [10, 12],
                        'Remaja' => [13, 17],
                        'Dewasa' => [18, 40],
                    ];

                    if (array_key_exists($state, $ranges)) {
                        [$min, $max] = $ranges[$state];
                        $set('usia_min', $min);
                        $set('usia_max', $max);
                    }
                })
                ->options([
                    'Anak-anak' => 'Anak-anak : 0 – 9 tahun',
                    'Praremaja' => 'Praremaja : 10 – 12 tahun',
                    'Remaja' => 'Remaja : 13 – 17 tahun',
                    'Dewasa' => 'Dewasa : 18 – 40 tahun',
                ])
                ->label('Kelompok Usia'),

            TextInput::make('usia_min')
                ->numeric()
                ->required()
                ->readOnly(),

            TextInput::make('usia_max')
                ->numeric()
                ->required()
                ->readOnly(),

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
                ->readonly(),

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
                \Filament\Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\BulkActionGroup::make([
                    \Filament\Tables\Actions\DeleteBulkAction::make(),
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
