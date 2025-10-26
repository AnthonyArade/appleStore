<?php
namespace App\Filament\Admin\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->label('Images')
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Toggle::make('new')
                    ->required()
                    ->label('Nouveau'),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('€')
                    ->label('Prix'),
                MultiSelect::make('color')
                    ->label('Couleurs')
                    ->options(self::getColorOptions())
                    ->required()
                    ->columnSpanFull()
                    ->afterStateHydrated(function ($component, $state) {
                        // $state from DB: {"Gold":"bg-yellow-500","Amber Dark":"bg-amber-700"}
                        if (is_array($state)) {
                            // Use the CSS classes (values) for MultiSelect, not the color names (keys)
                            $component->state(array_values($state));
                        }
                    })
                ,
            ]);
    }

    private static function getColorOptions(): array
    {
        return [
            'bg-gray-900'   => 'Black',
            'bg-blue-500'   => 'Blue',
            'bg-gray-300'   => 'Silver',
            'bg-purple-500' => 'Purple',
            'bg-gray-500'   => 'Gray',
            'bg-white'      => 'White',
            'bg-red-500'    => 'Red',
            'bg-green-400'  => 'Green',
            'bg-pink-400'   => 'Pink',
            'bg-yellow-100' => 'Beige',
            'bg-amber-800'  => 'Brown',
            'bg-yellow-400' => 'Yellow',
            'bg-amber-400'  => 'Amber',
            'bg-yellow-500' => 'Gold',
            'bg-lime-400'   => 'Lime',
            'bg-blue-300'   => 'Blue Light',
            'bg-blue-600'   => 'Blue Dark',
            'bg-gray-100'   => 'Gray Light',
            'bg-gray-800'   => 'Gray Dark',
            'bg-green-300'  => 'Green Light',
            'bg-purple-400' => 'Purple Light',
            'bg-amber-700'  => 'Amber Dark',
        ];
    }
}
