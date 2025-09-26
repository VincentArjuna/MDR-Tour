<?php

namespace App\Filament\Resources\Testimonies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class TestimoniesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->circular()
                    ->size(50),
                
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('customer.name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                
                TextColumn::make('package.name')
                    ->label('Package')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('content')
                    ->limit(50)
                    ->searchable()
                    ->wrap(),
                
                TextColumn::make('rating')
                    ->formatStateUsing(fn ($state) => str_repeat('⭐', $state))
                    ->sortable(),
                
                TextColumn::make('location')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('is_featured')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => $state ? 'Featured' : 'Not Featured')
                    ->color(fn (string $state): string => $state ? 'warning' : 'gray')
                    ->label('Featured'),
                
                TextColumn::make('is_published')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => $state ? 'Published' : 'Draft')
                    ->color(fn (string $state): string => $state ? 'success' : 'danger')
                    ->label('Status'),
                
                TextColumn::make('travel_date')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_published')
                    ->label('Published'),
                
                TernaryFilter::make('is_featured')
                    ->label('Featured'),
                
                SelectFilter::make('rating')
                    ->options([
                        1 => '1 Star',
                        2 => '2 Stars',
                        3 => '3 Stars',
                        4 => '4 Stars',
                        5 => '5 Stars',
                    ]),
                
                SelectFilter::make('package_id')
                    ->relationship('package', 'name')
                    ->searchable()
                    ->preload(),
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
