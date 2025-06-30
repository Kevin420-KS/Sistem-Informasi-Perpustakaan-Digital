<?php

namespace App\Filament\Admin\Resources\PembacaResource\Pages;

use App\Filament\Admin\Resources\PembacaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPembaca extends EditRecord
{
    protected static string $resource = PembacaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}