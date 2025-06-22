<?php

namespace App\Filament\Admin\Resources\PembacaResource\Pages;

use App\Filament\Admin\Resources\PembacaResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\CreateAction;

class ListPembaca extends ListRecords
{
    protected static string $resource = PembacaResource::class;

    use CreateAction;
}
