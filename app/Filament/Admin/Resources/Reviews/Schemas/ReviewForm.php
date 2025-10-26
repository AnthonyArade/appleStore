<?php
namespace App\Filament\Admin\Resources\Reviews\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Mokhosh\FilamentRating\Components\Rating;
use Mokhosh\FilamentRating\RatingTheme;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        $userName = Auth::user()?->name;
        return $schema
            ->components([
                Select::make('product_id')
                    ->label('Produit')
                    ->relationship('Product', 'name')
                    ->required(),
                TextInput::make('author_name')
                    ->label('Auteur')
                    ->default($userName)
                    ->required(),
                Rating::make('rating')
                    ->label('Note')
                    ->color('success')
                    ->required(),
                Textarea::make('comment')
                    ->columnSpanFull(),
            ]);
    }
}
