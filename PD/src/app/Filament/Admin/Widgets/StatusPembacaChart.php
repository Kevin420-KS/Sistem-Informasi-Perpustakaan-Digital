<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Pembaca;
use Filament\Widgets\ChartWidget;

class StatusPembacaChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Status Pembaca';

    // Tampilkan lebih atas dari widget lain
    protected static ?int $sort = -1;

    // Lebar kecil agar bisa sejajar
    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $total = Pembaca::count();

        $aktif = Pembaca::where('status', 'aktif')->count();
        $tidakAktif = Pembaca::where('status', 'tidak aktif')->count();
        $keluar = Pembaca::where('status', 'keluar')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Status Pembaca',
                    'data' => [
                        $aktif,
                        $tidakAktif,
                        $keluar,
                    ],
                    'backgroundColor' => ['#10B981', '#F59E0B', '#EF4444'],
                ],
            ],
            'labels' => ['Aktif', 'Tidak Aktif', 'Keluar'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
