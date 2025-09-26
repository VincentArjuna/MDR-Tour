<?php

namespace App\Filament\Resources\Customers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CustomersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('phone')
                    ->searchable(),
                
                TextColumn::make('city')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('country')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('testimonies_count')
                    ->counts('testimonies')
                    ->label('Reviews'),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('country')
                    ->options(fn () => \App\Models\Customer::distinct('country')->whereNotNull('country')->pluck('country', 'country')->toArray()),
                
                SelectFilter::make('city')
                    ->options(fn () => \App\Models\Customer::distinct('city')->whereNotNull('city')->pluck('city', 'city')->toArray()),
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
