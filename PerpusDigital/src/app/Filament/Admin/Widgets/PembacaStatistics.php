<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Pembaca;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PembacaStatistics extends ChartWidget
{
    protected static ?string $heading = 'Statistik Usia Pembaca';
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Ambil data dan normalisasi huruf menjadi lowercase agar konsisten
        $data = Pembaca::whereNotNull('gender')
            ->whereNotNull('kelompok_usia')
            ->selectRaw('LOWER(kelompok_usia) as kelompok_usia, LOWER(gender) as gender, COUNT(*) as total')
            ->groupByRaw('LOWER(kelompok_usia), LOWER(gender)')
            ->orderBy('kelompok_usia')
            ->get()
            ->groupBy('gender');

        // Ambil label kelompok usia secara unik dan urut
        $labels = Pembaca::whereNotNull('kelompok_usia')
            ->selectRaw('LOWER(kelompok_usia) as kelompok_usia')
            ->distinct()
            ->orderBy('kelompok_usia')
            ->pluck('kelompok_usia')
            ->toArray();

        $colors = ['#F472B6', '#60A5FA']; // pink untuk perempuan, biru untuk laki-laki
        $genderLabels = ['perempuan' => 'Perempuan', 'laki-laki' => 'Laki-laki'];
        $datasets = [];
        $i = 0;

        foreach ($genderLabels as $genderKey => $genderLabel) {
            $counts = [];
            foreach ($labels as $kelompok) {
                $count = $data[$genderKey]?->firstWhere('kelompok_usia', $kelompok)?->total ?? 0;
                $counts[] = $count;
            }

            $datasets[] = [
                'label' => $genderLabel,
                'data' => $counts,
                'borderColor' => $colors[$i % count($colors)],
                'backgroundColor' => $colors[$i % count($colors)],
                'fill' => false,
                'tension' => 0.4,
            ];
            $i++;
        }

        return [
            'datasets' => $datasets,
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): ?array
    {
        return [
            'scales' => [
                'y' => [
                    'min' => 0,
                    'max' => 60,
                    'ticks' => [
                        'stepSize' => 10,
                    ],
                    'title' => [
                        'display' => true,
                        'text' => 'Jumlah Pembaca',
                    ],
                ],
            ],
        ];
    }
}
