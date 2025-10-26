<?php
namespace App\Filament\Admin\Resources\Reviews\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Mokhosh\FilamentRating\Columns\RatingColumn;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name')
                    ->label('Produit')
                    ->sortable(),
                TextColumn::make('author_name')
                    ->label('Auteur')
                    ->searchable(),
                RatingColumn::make('rating')
                    ->label('Note')
                    ->color('success')
                    ->sortable(),
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
                SelectFilter::make('rating')
                    ->label('Filtrer par note')
                    ->options([
                        5 => '★★★★★ (5)',
                        4 => '★★★★☆ (4)',
                        3 => '★★★☆☆ (3)',
                        2 => '★★☆☆☆ (2)',
                        1 => '★☆☆☆☆ (1)',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
                    ->label('Supprimer')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Suppresion de l\'avis')
                    ->modalDescription('Êtes vous sure de vouloir supprimer cette action ne peut pas etre annulé.')
                    ->modalSubmitActionLabel('Oui')
                    ->successNotificationTitle('Avis supprimé avec succées'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
