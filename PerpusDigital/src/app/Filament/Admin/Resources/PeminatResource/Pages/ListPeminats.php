<?php

namespace App\Filament\Admin\Resources\PeminatResource\Pages;

use App\Filament\Admin\Resources\PeminatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeminats extends ListRecords
{
    protected static string $resource = PeminatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
