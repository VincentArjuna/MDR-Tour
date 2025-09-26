<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentBookings extends TableWidget
{
    protected static ?string $heading = 'Recent Bookings';
    
    protected static ?int $sort = 4;
    
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Booking::query()->with('package')->latest()->limit(5))
            ->columns([
                TextColumn::make('booking_number')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('package.name')
                    ->label('Package')
                    ->searchable(),
                    
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'success',
                        'cancelled' => 'danger',
                        'completed' => 'info',
                    }),
                    
                TextColumn::make('travel_date')
                    ->date()
                    ->sortable(),
                    
                TextColumn::make('total_price')
                    ->money('USD')
                    ->sortable(),
                    
                TextColumn::make('created_at')
                    ->label('Booked')
                    ->since()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
