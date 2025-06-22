<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Peminat;
use Filament\Widgets\ChartWidget;

class TingkatPeminatStatistics extends ChartWidget
{
    protected static ?string $heading = 'Statistik Tingkat Peminat Berdasarkan Jenis Buku';
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $data = Peminat::orderBy('jenis_buku')->get();

        $labels = $data->pluck('jenis_buku')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Laki-laki',
                    'data' => $data->pluck('laki_laki')->toArray(),
                    'borderColor' => '#60A5FA',
                    'backgroundColor' => '#60A5FA',
                    'fill' => false,
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Perempuan',
                    'data' => $data->pluck('perempuan')->toArray(),
                    'borderColor' => '#F472B6',
                    'backgroundColor' => '#F472B6',
                    'fill' => false,
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Total Pembaca',
                    'data' => $data->pluck('total_pembaca')->toArray(),
                    'borderColor' => '#34D399',
                    'backgroundColor' => '#34D399',
                    'fill' => false,
                    'tension' => 0.4,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
