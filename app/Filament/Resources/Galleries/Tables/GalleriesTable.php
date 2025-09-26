<?php

namespace App\Filament\Resources\Galleries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class GalleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->size(80)
                    ->square()
                    ->label('Image'),
                
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('description')
                    ->limit(50)
                    ->searchable()
                    ->wrap(),
                
                TextColumn::make('category')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'destination' => 'success',
                        'activity' => 'warning',
                        'accommodation' => 'info',
                        'food' => 'danger',
                        'culture' => 'purple',
                        'nature' => 'green',
                        'adventure' => 'orange',
                        default => 'gray',
                    }),
                
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
                
                TextColumn::make('sort_order')
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
                
                SelectFilter::make('category')
                    ->options([
                        'destination' => 'Destination',
                        'activity' => 'Activity',
                        'accommodation' => 'Accommodation',
                        'food' => 'Food & Dining',
                        'culture' => 'Culture',
                        'nature' => 'Nature',
                        'adventure' => 'Adventure',
                        'other' => 'Other',
                    ]),
                
                SelectFilter::make('location')
                    ->options(fn () => \App\Models\Gallery::distinct('location')->whereNotNull('location')->pluck('location', 'location')->toArray()),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order', 'asc');
    }
}
