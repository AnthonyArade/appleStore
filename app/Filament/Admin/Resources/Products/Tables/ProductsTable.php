<?php
namespace App\Filament\Admin\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Slider;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')
                    ->sortable()
                    ->label('category'),
                TextColumn::make('name')
                    ->searchable()
                    ->label('nom'),
                ImageColumn::make('image')
                    ->label('Image'),
                IconColumn::make('new')
                    ->boolean()
                    ->label('Nouveau'),
                TextColumn::make('price')
                    ->money('EUR', locale: 'fr_FR')
                    ->sortable()
                    ->label('Prix'),
                TextColumn::make('stock')
                    ->numeric()
                    ->sortable()
                    ->label('Stock'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //Filtre sur les tranche de prix
                // SelectFilter::make('price_range')
                //     ->label('Filtrer par tranche de prix')
                //     ->options([
                //         'cheap'     => 'Moins de 50€',
                //         'medium'    => '50€ - 200€',
                //         'expensive' => 'Plus de 200€',
                //     ])
                //     ->query(function ($query, array $state) {
                //         if (empty($state['value'])) {
                //             return;
                //         }

                //         $value = $state['value'];

                //         match ($value) {
                //             'cheap'     => $query->where('price', '<', 50),
                //             'medium'    => $query->whereBetween('price', [50, 200]),
                //             'expensive' => $query->where('price', '>', 200),
                //             default     => null,
                //         };
                //     }),
                //Filtre sur les tranche de prix via des slider
                Filter::make('price_range')
                    ->label('Filtrer par prix (€)')
                    ->form([
                        Slider::make('min_price')
                            ->label(function ($get) {
                                $value = $get('min_price') ?? 0;
                                return 'Prix minimum: ' . number_format($value) . '€';
                            })
                            ->minValue(0)
                            ->maxValue(2000)
                            ->step(100)
                            ->default(0)
                            ->live(),
                        Slider::make('max_price')
                            ->label(function ($get) {
                                $value = $get('max_price') ?? 2000;
                                return 'Prix maximum: ' . number_format($value) . '€';
                            })
                            ->minValue(0)
                            ->maxValue(2000)
                            ->step(100)
                            ->default(2000)
                            ->live(),
                    ])
                    ->query(function ($query, array $state) {
                        $minPrice = $state['min_price'] ?? 0;
                        $maxPrice = $state['max_price'] ?? 2000;

                        // Only apply filter if values are different from full range
                        if ($minPrice === 0 && $maxPrice === 2000) {
                            return;
                        }

                        // Ensure min price doesn't exceed max price
                        if ($minPrice > $maxPrice) {
                            $minPrice = $maxPrice;
                        }

                        return $query->whereBetween('price', [$minPrice, $maxPrice]);
                    })
                    ->indicateUsing(function (array $state): ?string {
                        $minPrice = $state['min_price'] ?? 0;
                        $maxPrice = $state['max_price'] ?? 2000;

                        // Only show indicator if filter is actually applied
                        if ($minPrice === 0 && $maxPrice === 2000) {
                            return null;
                        }

                        if ($minPrice > 0 && $maxPrice < 2000) {
                            return 'Prix entre ' . number_format($minPrice) . '€ et ' . number_format($maxPrice) . '€';
                        } elseif ($minPrice > 0) {
                            return 'Prix à partir de ' . number_format($minPrice) . '€';
                        } elseif ($maxPrice < 2000) {
                            return 'Prix jusqu\'à ' . number_format($maxPrice) . '€';
                        }

                        return null;
                    }),
                //filtre en fonction du stock
                SelectFilter::make('stock_available')
                    ->label('Filtrer en fonction du stock')
                    ->options([
                        0             => 'Epuisée',
                        'revitailler' => 'A revitailler',
                        'sufissant'   => 'Reste 5 à 10 produits',
                        'good'        => 'Reste plus de 10 produits',
                    ])
                    ->query(function ($query, array $state) {
                        if (empty($state['value'])) {
                            return;
                        }

                        $stock = $state['value'];

                        match ($stock) {
                            0             => $query->where('stock', '==', 0),
                            'revitailler' => $query->whereBetween('stock', [1, 5]),
                            'sufissant'   => $query->whereBetween('stock', [5, 10]),
                            'good'        => $query->where('stock', '>', 10),
                            default       => null,
                        };
                    }),
            ])
            ->recordActions([
                ViewAction::make()->label('Voir'),
                EditAction::make()->label('Modifier'),
                DeleteAction::make()
                    ->label('Supprimer')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Suppresion du produit')
                    ->modalDescription('Êtes vous sure de vouloir supprimer cette action ne peut pas etre annulé.')
                    ->modalSubmitActionLabel('Oui')
                    ->successNotificationTitle('Produit supprimé avec succées'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->label('Suppresion des elements selectionnées'),
                ])->label('Actions'),
            ]);
    }
}
