<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Customer;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalBookings = Booking::count();
        $totalCustomers = Customer::count();
        $totalRevenue = Booking::sum('total_price');
        $pendingBookings = Booking::where('status', 'pending')->count();
        $thisMonthBookings = Booking::whereMonth('created_at', Carbon::now()->month)->count();
        $thisMonthRevenue = Booking::whereMonth('created_at', Carbon::now()->month)->sum('total_price');
        
        return [
            Stat::make('Total Bookings', $totalBookings)
                ->description('All time bookings')
                ->descriptionIcon('heroicon-o-calendar-days')
                ->color('primary'),
                
            Stat::make('Total Customers', $totalCustomers)
                ->description('Registered customers')
                ->descriptionIcon('heroicon-o-users')
                ->color('success'),
                
            Stat::make('Total Revenue', '$' . number_format($totalRevenue, 2))
                ->description('All time earnings')
                ->descriptionIcon('heroicon-o-banknotes')
                ->color('warning'),
                
            Stat::make('This Month Bookings', $thisMonthBookings)
                ->description('New bookings this month')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('info'),
                
            Stat::make('This Month Revenue', '$' . number_format($thisMonthRevenue, 2))
                ->description('Earnings this month')
                ->descriptionIcon('heroicon-o-chart-bar')
                ->color('warning'),
                
            Stat::make('Pending Bookings', $pendingBookings)
                ->description('Awaiting confirmation')
                ->descriptionIcon('heroicon-o-clock')
                ->color('danger'),
        ];
    }
}
