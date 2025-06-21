<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Admin\Widgets\BukuStatistics;
use App\Filament\Admin\Widgets\PembacaStatistics;
use App\Filament\Admin\Widgets\PeminatStatistics;

class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            BukuStatistics::class,
            PembacaStatistics::class,
            PeminatStatistics::class,
        ];
    }
}
