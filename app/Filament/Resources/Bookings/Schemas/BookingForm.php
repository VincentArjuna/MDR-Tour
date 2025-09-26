<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Booking Information')
                    ->schema([
                        Hidden::make('booking_number'),
                        
                        Select::make('package_id')
                            ->relationship('package', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->columnSpanFull(),
                        
                        Grid::make(3)
                            ->schema([
                                DatePicker::make('travel_date')
                                    ->required(),
                                
                                TextInput::make('number_of_participants')
                                    ->required()
                                    ->numeric()
                                    ->minValue(1),
                                
                                Select::make('status')
                                    ->options([
                                        'pending' => 'Pending',
                                        'confirmed' => 'Confirmed',
                                        'cancelled' => 'Cancelled',
                                        'completed' => 'Completed',
                                    ])
                                    ->required()
                                    ->default('pending'),
                            ]),
                    ]),

                Section::make('Pricing')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('total_price')
                                    ->required()
                                    ->numeric()
                                    ->prefix('$'),
                                
                                TextInput::make('paid_amount')
                                    ->numeric()
                                    ->prefix('$')
                                    ->default(0),
                                
                                TextInput::make('remaining_amount')
                                    ->numeric()
                                    ->prefix('$')
                                    ->disabled(),
                            ]),
                        
                        Select::make('payment_status')
                            ->options([
                                'unpaid' => 'Unpaid',
                                'partial' => 'Partial',
                                'paid' => 'Paid',
                            ])
                            ->disabled(),
                    ]),

                Section::make('Participants')
                    ->schema([
                        MultiSelect::make('participants')
                            ->label('Select Participants')
                            ->relationship(
                                'participants', 
                                'name',
                                fn ($query) => $query->select('customers.id', 'customers.name', 'customers.email', 'customers.phone')
                            )
                            ->searchable()
                            ->preload()
                            ->columnSpanFull()
                            ->live()
                            ->afterStateUpdated(function (callable $set, $state) {
                                $count = is_array($state) ? count($state) : 0;
                                $set('number_of_participants', $count);
                            })
                            ->helperText('Select customers who will participate in this tour')
                            ->required()
                            ->minItems(1),
                        
                        TextInput::make('number_of_participants')
                            ->label('Total Participants')
                            ->numeric()
                            ->minValue(1)
                            ->readonly()
                            ->helperText('Automatically calculated based on selected participants'),
                    ]),

                Section::make('Additional Information')
                    ->schema([
                        Textarea::make('special_requests')
                            ->rows(3)
                            ->placeholder('Any special requests from the customer'),
                        
                        Textarea::make('whatsapp_message')
                            ->rows(3)
                            ->placeholder('WhatsApp message template for this booking'),
                        
                        Textarea::make('notes')
                            ->rows(3)
                            ->placeholder('Internal notes about this booking'),
                        
                        Textarea::make('cancellation_reason')
                            ->rows(3)
                            ->placeholder('Reason for cancellation (if applicable)')
                            ->visible(fn (callable $get) => $get('status') === 'cancelled'),
                    ]),
            ]);
    }
}
