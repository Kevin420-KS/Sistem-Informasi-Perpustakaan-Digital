<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Pembaca;
use Filament\Widgets\ChartWidget;

class RangeUmur extends ChartWidget
{
    protected static ?string $heading = 'Statistik Pembaca Berdasarkan Range Umur';
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $data = Pembaca::selectRaw('range_umur, COUNT(*) as total')
            ->groupBy('range_umur')
            ->orderByRaw("FIELD(range_umur, 'Anak-anak', 'Praremaja', 'Remaja', 'Dewasa')")
            ->get();

        return [
            'labels' => $data->pluck('range_umur')->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Pembaca',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => [
                        '#F87171', // Merah muda
                        '#FB923C', // Oranye
                        '#FACC15', // Kuning
                        '#34D399', // Hijau
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
