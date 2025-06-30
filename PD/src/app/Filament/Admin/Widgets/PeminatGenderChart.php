<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Peminat; // Model Peminat menyimpan agregasi minat baca per usia dan jenis buku
use Filament\Widgets\ChartWidget;

/**
 * Widget untuk menampilkan jumlah total pembaca berdasarkan gender
 * dalam bentuk pie chart (dari model Peminat).
 *
 * Tidak langsung terhubung ke tabel 'pembaca', melainkan hasil rekap.
 */
class PeminatGenderChart extends ChartWidget
{
    // Judul widget
    protected static ?string $heading = 'Jumlah Pembaca Berdasarkan Gender';

    // Warna tema widget
    protected static string $color = 'info';

    /**
     * Mengambil data chart dari total pembaca laki-laki dan perempuan
     * yang direkap dari model Peminat (bukan data individual).
     */
    protected function getData(): array
    {
        // Hitung total laki-laki & perempuan dari seluruh data peminat
        $totalLaki = Peminat::sum('laki_laki');
        $totalPerempuan = Peminat::sum('perempuan');

        return [
            'datasets' => [
                [
                    'label' => 'Persentase Pembaca',
                    'data' => [$totalLaki, $totalPerempuan],
                    'backgroundColor' => ['#3B82F6', '#F472B6'], // warna biru & pink
                ],
            ],
            'labels' => [
                "Laki-laki ({$totalLaki})",
                "Perempuan ({$totalPerempuan})",
            ],
        ];
    }

    // Jenis chart yang ditampilkan
    protected function getType(): string
    {
        return 'pie'; // chart type: pie
    }
}
