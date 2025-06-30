<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Buku; // Model Buku, berisi data judul, jenis, tahun terbit, dll.
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

/**
 * Widget statistik untuk menampilkan tren penerbitan buku
 * berdasarkan jenis buku dan tahun terbit dalam bentuk line chart.
 *
 * Relasi tidak digunakan langsung karena ini agregasi data dari satu model.
 */
class BukuStatistics extends ChartWidget
{
    // Judul yang muncul di widget
    protected static ?string $heading = 'Tren Penerbitan Buku per Jenis dan Tahun';

    // Tinggi maksimal widget chart
    protected static ?string $maxHeight = '300px';

    /**
     * Mengambil dan menyiapkan data chart.
     * Data diambil dari model Buku, dikelompokkan berdasarkan jenis_buku dan tahun_terbit.
     */
    protected function getData(): array
    {
        // Ambil data agregasi jumlah buku tiap jenis & tahun
        $data = Buku::select('tahun_terbit', 'jenis_buku', DB::raw('count(*) as total'))
            ->groupBy('tahun_terbit', 'jenis_buku')
            ->orderBy('tahun_terbit')
            ->get()
            ->groupBy('jenis_buku');

        // Ambil daftar semua tahun unik
        $labels = Buku::select('tahun_terbit')
            ->distinct()
            ->orderBy('tahun_terbit')
            ->pluck('tahun_terbit')
            ->toArray();

        // Warna untuk setiap jenis buku
        $colors = ['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#14B8A6'];

        $datasets = [];
        $i = 0;

        // Buat dataset per jenis buku
        foreach ($data as $jenis => $grouped) {
            $counts = [];

            // Cocokkan jumlah berdasarkan tahun
            foreach ($labels as $tahun) {
                $count = $grouped->where('tahun_terbit', $tahun)->first();
                $counts[] = $count ? $count->total : 0;
            }

            $datasets[] = [
                'label' => $jenis, // label legend
                'data' => $counts,
                'borderColor' => $colors[$i % count($colors)],
                'backgroundColor' => $colors[$i % count($colors)],
                'fill' => false,
                'tension' => 0.4, // kelengkungan garis
            ];
            $i++;
        }

        return [
            'datasets' => $datasets,
            'labels' => $labels, // sumbu X (tahun)
        ];
    }

    // Menentukan jenis chart
    protected function getType(): string
    {
        return 'line'; // chart type: line
    }
}
