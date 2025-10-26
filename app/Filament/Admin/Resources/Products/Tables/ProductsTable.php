<?php
namespace App\Filament\Admin\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
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
                //
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
                    ->modalDescription('Êtes vous sure de vouloir supprimer cette actione ne peut pas etre annulé.')
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
