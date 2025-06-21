<?php

namespace App\Filament\Admin\Resources\PeminatResource\Pages;

use App\Filament\Admin\Resources\PeminatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeminat extends EditRecord
{
    protected static string $resource = PeminatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
