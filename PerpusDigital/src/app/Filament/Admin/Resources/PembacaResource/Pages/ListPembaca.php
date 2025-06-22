<?php

namespace App\Filament\Admin\Resources\PembacaResource\Pages;

use App\Filament\Admin\Resources\PembacaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPembaca extends ListRecords
{
    protected static string $resource = PembacaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(), // Menampilkan tombol "New" / "Tambah"
        ];
    }
}
