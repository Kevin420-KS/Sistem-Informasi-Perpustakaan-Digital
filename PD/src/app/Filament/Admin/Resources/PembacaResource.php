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
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Carbon;

class PembacaResource extends Resource
{
    protected static ?string $model = Pembaca::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Pembaca';
    protected static ?string $pluralModelLabel = 'Pembaca';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(2)->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('usia')
                    ->numeric()
                    ->required()
                    ->live()
                    ->afterStateUpdated(function ($state, Set $set) {
                        if ($state <= 9) {
                            $set('range_umur', 'Anak-anak');
                        } elseif ($state <= 12) {
                            $set('range_umur', 'Praremaja');
                        } elseif ($state <= 17) {
                            $set('range_umur', 'Remaja');
                        } else {
                            $set('range_umur', 'Dewasa');
                        }
                    }),

                Select::make('gender')
                    ->required()
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ]),

                Select::make('status')
                    ->required()
                    ->options([
                        'aktif' => 'Aktif',
                        'tidak aktif' => 'Tidak Aktif',
                        'keluar' => 'Keluar',
                    ]),

                DatePicker::make('created_at')
                    ->label('Tanggal Buat')
                    ->default(now())
                    ->required(),

                DatePicker::make('tanggal_keluar')
                    ->label('Tanggal Keluar')
                    ->visible(fn (Get $get) => $get('status') === 'keluar')
                    ->rules([
                        function (Get $get) {
                            return function (string $attribute, $value, $fail) use ($get) {
                                $createdAt = $get('created_at');

                                if (
                                    $get('status') === 'keluar' &&
                                    $value &&
                                    $createdAt &&
                                    Carbon::parse($value)->lt(Carbon::parse($createdAt))
                                ) {
                                    $fail('Tanggal keluar tidak boleh lebih awal dari tanggal dibuat.');
                                }
                            };
                        },
                    ]),
            ]),

            TextInput::make('range_umur')
                ->disabled()
                ->dehydrated(false),
        ])
        ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('usia')->sortable(),
                Tables\Columns\TextColumn::make('gender')->searchable(),
                Tables\Columns\TextColumn::make('range_umur')->searchable(),
                Tables\Columns\TextColumn::make('status')->badge()->searchable(),
                Tables\Columns\TextColumn::make('tanggal_keluar')->date()->label('Keluar'),
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
