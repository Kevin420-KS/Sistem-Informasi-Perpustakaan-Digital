<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Admin\Widgets\BukuStatistics;
use App\Filament\Admin\Widgets\TingkatPeminatStatistics;
use App\Filament\Admin\Widgets\RangeUmur;
use App\Filament\Admin\Widgets\PeminatGenderChart;

class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            BukuStatistics::class,
            TingkatPeminatStatistics::class,
            RangeUmur::class,
            PeminatGenderChart::class,
        ];
    }
}
