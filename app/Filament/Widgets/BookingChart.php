<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class BookingChart extends ChartWidget
{
    protected ?string $heading = 'Bookings Over Time';
    
    protected static ?int $sort = 2;
    
    protected int | string | array $columnSpan = 'half';

    protected function getData(): array
    {
        $data = [];
        $labels = [];
        
        // Get last 12 months of data
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $labels[] = $date->format('M Y');
            $data[] = Booking::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Bookings',
                    'data' => $data,
                    'borderColor' => '#10B981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
