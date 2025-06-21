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
        $data = Pembaca::select('kelompok_usia', 'gender', DB::raw('count(*) as total'))
            ->groupBy('kelompok_usia', 'gender')
            ->orderBy('kelompok_usia')
            ->get()
            ->groupBy('gender');

        $labels = Pembaca::select('kelompok_usia')->distinct()->pluck('kelompok_usia')->toArray();

        $datasets = [];

        foreach ($data as $gender => $grouped) {
            $counts = [];
            foreach ($labels as $kelompok) {
                $count = $grouped->where('kelompok_usia', $kelompok)->first();
                $counts[] = $count ? $count->total : 0;
            }
            $datasets[] = [
                'label' => $gender,
                'data' => $counts,
            ];
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
}
