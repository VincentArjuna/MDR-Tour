<?php

namespace App\Filament\Resources\Packages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class PackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image')
                    ->square()
                    ->size(60),
                
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('destination')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),
                
                TextColumn::make('duration_days')
                    ->suffix(' days')
                    ->sortable(),
                
                TextColumn::make('max_participants')
                    ->sortable(),
                
                TextColumn::make('is_active')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => $state ? 'Active' : 'Inactive')
                    ->color(fn (string $state): string => $state ? 'success' : 'danger'),
                
                TextColumn::make('available_from')
                    ->date()
                    ->sortable(),
                
                TextColumn::make('available_until')
                    ->date()
                    ->sortable(),
                
                TextColumn::make('bookings_count')
                    ->counts('bookings')
                    ->label('Bookings'),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Active Status'),
                
                SelectFilter::make('destination')
                    ->options(fn () => \App\Models\Package::distinct('destination')->pluck('destination', 'destination')->toArray()),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
