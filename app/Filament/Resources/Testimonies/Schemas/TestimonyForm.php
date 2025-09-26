<?php

namespace App\Filament\Resources\Testimonies\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Testimony Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('customer_id')
                                    ->relationship('customer', 'name')
                                    ->searchable()
                                    ->preload(),
                                
                                Select::make('package_id')
                                    ->relationship('package', 'name')
                                    ->searchable()
                                    ->preload(),
                            ]),
                        
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('Customer Name (Override)'),
                                
                                TextInput::make('location')
                                    ->maxLength(255)
                                    ->placeholder('e.g., Jakarta, Indonesia'),
                            ]),
                        
                        Grid::make(2)
                            ->schema([
                                Select::make('rating')
                                    ->required()
                                    ->options([
                                        1 => '1 Star',
                                        2 => '2 Stars',
                                        3 => '3 Stars',
                                        4 => '4 Stars',
                                        5 => '5 Stars',
                                    ])
                                    ->default(5),
                                
                                DatePicker::make('travel_date')
                                    ->label('Travel Date'),
                            ]),
                    ]),

                Section::make('Content')
                    ->schema([
                        Textarea::make('content')
                            ->required()
                            ->rows(5)
                            ->placeholder('Write the customer testimony here...'),
                        
                        FileUpload::make('image')
                            ->image()
                            ->directory('testimonies')
                            ->maxSize(2048)
                            ->label('Customer Photo'),
                    ]),

                Section::make('Display Settings')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Toggle::make('is_featured')
                                    ->label('Featured Testimony')
                                    ->default(false),
                                
                                Toggle::make('is_published')
                                    ->label('Published')
                                    ->default(true),
                            ]),
                    ]),
            ]);
    }
}
