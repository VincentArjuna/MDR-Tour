<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Image Information')
                    ->schema([
                        FileUpload::make('image_path')
                            ->required()
                            ->image()
                            ->directory('gallery')
                            ->maxSize(5120)
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->columnSpanFull(),
                        
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),
                                
                                TextInput::make('alt_text')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('Alt Text')
                                    ->helperText('Important for SEO and accessibility'),
                            ]),
                        
                        Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Categorization')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('category')
                                    ->options([
                                        'destination' => 'Destination',
                                        'activity' => 'Activity',
                                        'accommodation' => 'Accommodation',
                                        'food' => 'Food & Dining',
                                        'culture' => 'Culture',
                                        'nature' => 'Nature',
                                        'adventure' => 'Adventure',
                                        'other' => 'Other',
                                    ])
                                    ->searchable()
                                    ->placeholder('Select a category'),
                                
                                TextInput::make('location')
                                    ->maxLength(255)
                                    ->placeholder('e.g., Bali, Indonesia'),
                            ]),
                    ]),

                Section::make('Display Settings')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Toggle::make('is_featured')
                                    ->label('Featured Image')
                                    ->default(false),
                                
                                Toggle::make('is_published')
                                    ->label('Published')
                                    ->default(true),
                                
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('Lower numbers appear first'),
                            ]),
                    ]),
            ]);
    }
}
