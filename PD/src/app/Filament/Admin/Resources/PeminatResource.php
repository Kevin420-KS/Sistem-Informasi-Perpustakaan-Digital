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

            TextInput::make('usia_min')->numeric()->required()->readOnly(),
            TextInput::make('usia_max')->numeric()->required()->readOnly(),
            TextInput::make('jenis_buku')->required(),
            TextInput::make('laki_laki')
                ->numeric()
                ->required()
                ->reactive()
                ->afterStateUpdated(fn ($state, callable $set, callable $get) =>
                    self::updatePembaca($set, $get, (int) $state, (int) $get('perempuan'))
                ),
            TextInput::make('perempuan')
                ->numeric()
                ->required()
                ->reactive()
                ->afterStateUpdated(fn ($state, callable $set, callable $get) =>
                    self::updatePembaca($set, $get, (int) $get('laki_laki'), (int) $state)
                ),
            TextInput::make('total_pembaca')->numeric()->required()->readOnly(),
            TextInput::make('tingkat_minat')->readOnly()->label('Tingkat Minat'),
        ]);
    }

    private static function updatePembaca(callable $set, callable $get, int $laki, int $perempuan): void
    {
        $total = $laki + $perempuan;
        $set('total_pembaca', $total);

        $set('tingkat_minat', match (true) {
            $total <= 40 => 'Kurang Diminati',
            $total <= 70 => 'Lumayan Diminati',
            default => 'Sangat Diminati',
        });
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kelompok_usia')
                    ->searchable()
                    ->sortable(query: function ($query, $direction) {
                        $customOrder = ['Anak-anak', 'Praremaja', 'Remaja', 'Dewasa'];
                        $orderSql = "FIELD(kelompok_usia, '" . implode("','", $customOrder) . "') $direction";
                        return $query->orderByRaw($orderSql);
                    }),
                TextColumn::make('jenis_buku')->searchable(),
                TextColumn::make('laki_laki'),
                TextColumn::make('perempuan'),
                TextColumn::make('total_pembaca'),
                TextColumn::make('tingkat_minat'),
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
            'index' => Pages\ListPeminat::route('/'),
            'create' => Pages\CreatePeminat::route('/create'),
            'edit' => Pages\EditPeminat::route('/{record}/edit'),
        ];
    }
}
