<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                
                                TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                            ]),
                        
                        Grid::make(2)
                            ->schema([
                                TextInput::make('phone')
                                    ->tel()
                                    ->maxLength(255),
                                
                                TextInput::make('whatsapp_number')
                                    ->tel()
                                    ->maxLength(255),
                            ]),
                        
                        Grid::make(3)
                            ->schema([
                                DatePicker::make('date_of_birth'),
                                
                                Select::make('gender')
                                    ->options([
                                        'male' => 'Male',
                                        'female' => 'Female',
                                        'other' => 'Other',
                                    ])
                                    ->placeholder('Select gender'),
                                
                                TextInput::make('country')
                                    ->maxLength(255),
                            ]),
                    ]),

                Section::make('Address Information')
                    ->schema([
                        Textarea::make('address')
                            ->rows(2)
                            ->columnSpanFull(),
                        
                        TextInput::make('city')
                            ->maxLength(255),
                    ]),

                Section::make('Emergency Contact (Optional)')
                    ->schema([
                        Repeater::make('emergency_contact')
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        TextInput::make('name')
                                            ->maxLength(255),
                                        
                                        TextInput::make('phone')
                                            ->tel()
                                            ->maxLength(255),
                                        
                                        TextInput::make('relationship')
                                            ->maxLength(255),
                                    ]),
                            ])
                            ->columnSpanFull()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Emergency Contact')
                            ->defaultItems(0)
                            ->addActionLabel('Add Emergency Contact'),
                    ]),

                Section::make('Additional Information')
                    ->schema([
                        Textarea::make('special_requirements')
                            ->rows(3)
                            ->placeholder('Any special dietary requirements, medical conditions, etc.'),
                        
                        Textarea::make('notes')
                            ->rows(3)
                            ->placeholder('Internal notes about this customer'),
                    ]),
            ]);
    }
}
