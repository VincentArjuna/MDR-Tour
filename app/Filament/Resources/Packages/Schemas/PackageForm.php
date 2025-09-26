<?php

namespace App\Filament\Resources\Packages\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),
                                
                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),
                            ]),
                        
                        MarkdownEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                        
                        MarkdownEditor::make('itinerary')
                            ->columnSpanFull(),
                    ]),

                Section::make('Pricing & Availability')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('price')
                                    ->required()
                                    ->numeric()
                                    ->prefix('$'),
                                
                                TextInput::make('duration_days')
                                    ->required()
                                    ->numeric()
                                    ->suffix('days'),
                                
                                TextInput::make('max_participants')
                                    ->required()
                                    ->numeric(),
                            ]),
                        
                        Grid::make(2)
                            ->schema([
                                DatePicker::make('available_from')
                                    ->required(),
                                
                                DatePicker::make('available_until')
                                    ->required(),
                            ]),
                        
                        TextInput::make('destination')
                            ->required()
                            ->maxLength(255),
                    ]),

                Section::make('Package Details')
                    ->schema([
                        TagsInput::make('inclusions')
                            ->placeholder('Add inclusions...')
                            ->columnSpanFull(),
                        
                        TagsInput::make('exclusions')
                            ->placeholder('Add exclusions...')
                            ->columnSpanFull(),
                    ]),

                Section::make('Media')
                    ->schema([
                        FileUpload::make('featured_image')
                            ->image()
                            ->directory('packages')
                            ->maxSize(2048),
                        
                        FileUpload::make('gallery')
                            ->image()
                            ->multiple()
                            ->directory('packages/gallery')
                            ->maxSize(2048)
                            ->maxFiles(10),
                    ]),

                Section::make('Status')
                    ->schema([
                        Toggle::make('is_active')
                            ->default(true),
                    ]),
            ]);
    }
}
