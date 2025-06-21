<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Peminat;
use Filament\Widgets\ChartWidget;

class PeminatStatistics extends ChartWidget
{
    protected static ?string $heading = 'Statistik Peminat Berdasarkan Jenis Buku';
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $data = Peminat::orderBy('jenis_buku')->get();

        $labels = $data->pluck('jenis_buku')->toArray();

        $laki = $data->pluck('laki_laki')->toArray();
        $perempuan = $data->pluck('perempuan')->toArray();
        $total = $data->pluck('total_pembaca')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Laki-laki',
                    'data' => $laki,
                ],
                [
                    'label' => 'Perempuan',
                    'data' => $perempuan,
                ],
                [
                    'label' => 'Total Pembaca',
                    'data' => $total,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
