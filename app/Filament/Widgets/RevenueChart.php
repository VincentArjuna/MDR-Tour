<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class RevenueChart extends ChartWidget
{
    protected ?string $heading = 'Monthly Revenue';
    
    protected static ?int $sort = 3;
    
    protected int | string | array $columnSpan = 'half';

    protected function getData(): array
    {
        $data = [];
        $labels = [];
        
        // Get last 12 months of revenue data
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $labels[] = $date->format('M Y');
            $data[] = Booking::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->sum('total_price');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Revenue ($)',
                    'data' => $data,
                    'borderColor' => '#F59E0B',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.1)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
