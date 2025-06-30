<?php

namespace App\Filament\Admin\Resources\PeminatResource\Pages;

use App\Filament\Admin\Resources\PeminatResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreatePeminat extends CreateRecord
{
    protected static string $resource = PeminatResource::class;

    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Data berhasil ditambahkan')
            ->success()
            ->send();
    }
}