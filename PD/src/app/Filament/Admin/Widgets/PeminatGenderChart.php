<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Peminat;
use Filament\Widgets\ChartWidget;

class PeminatGenderChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Pembaca Berdasarkan Gender';

    // Urutan setelah StatusPembacaChart
    protected static ?int $sort = 0;

    // Ukuran kecil agar tampil sejajar
    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $totalLaki = Peminat::sum('laki_laki');
        $totalPerempuan = Peminat::sum('perempuan');

        return [
            'datasets' => [
                [
                    'label' => 'Persentase Pembaca',
                    'data' => [$totalLaki, $totalPerempuan],
                    'backgroundColor' => ['#3B82F6', '#F472B6'],
                ],
            ],
            'labels' => [
                "Laki-laki ({$totalLaki})",
                "Perempuan ({$totalPerempuan})",
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
