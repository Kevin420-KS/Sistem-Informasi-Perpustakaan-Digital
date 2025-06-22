<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Admin\Widgets\BukuStatistics;
use App\Filament\Admin\Widgets\PembacaStatistics;
use App\Filament\Admin\Widgets\PeminatStatistics;
use App\Filament\Admin\Widgets\PeminatGenderChart;

class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            PembacaStatistics::class,
            BukuStatistics::class,
            PeminatStatistics::class,
            PeminatGenderChart::class,
        ];
    }
}
