<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Buku;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BukuStatistics extends ChartWidget
{
    protected static ?string $heading = 'Tren Penerbitan Buku per Jenis dan Tahun';
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $data = Buku::select('tahun_terbit', 'jenis_buku', DB::raw('count(*) as total'))
            ->groupBy('tahun_terbit', 'jenis_buku')
            ->orderBy('tahun_terbit')
            ->get()
            ->groupBy('jenis_buku');

        $labels = Buku::select('tahun_terbit')
            ->distinct()
            ->orderBy('tahun_terbit')
            ->pluck('tahun_terbit')
            ->toArray();

        $colors = ['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#14B8A6'];
        $datasets = [];
        $i = 0;

        foreach ($data as $jenis => $grouped) {
            $counts = [];
            foreach ($labels as $tahun) {
                $count = $grouped->where('tahun_terbit', $tahun)->first();
                $counts[] = $count ? $count->total : 0;
            }
            $datasets[] = [
                'label' => $jenis,
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
}
