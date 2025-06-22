<?php

namespace App\Filament\Admin\Resources\BukuResource\Pages;

use App\Filament\Admin\Resources\BukuResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\CreateAction;

class ListBuku extends ListRecords
{
    protected static string $resource = BukuResource::class;

    use CreateAction;
}
