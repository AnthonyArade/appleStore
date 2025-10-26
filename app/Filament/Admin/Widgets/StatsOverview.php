<?php
namespace App\Filament\Admin\Widgets;

use App\Models\category;
use App\Models\Product;
use App\Models\Review;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        // Liste des category et leur nombre de produit
        // $categories        = category::withCount('products')->get();
        // $categoryBreakdown = $categories
        //     ->map(fn($cat) => "{$cat->name}: {$cat->products_count}")
        //     ->values()
        //     ->chunk(6) // Forme des groupe de 6 separe les element d'un groupe par • puis separe les groupe par un retour a la ligne
        //     ->map(fn($chunk) => $chunk->implode(' • '))
        //     ->implode("\n");

        $avis          = Review::latest()->take(5)->get();
        $avisBreakdown = $avis
            ->map(function ($av) {
                $stars = str_repeat('★', (int) $av->rating); // fonction for avec commme limite le int de rating repetant le nombre d'etoile necessaire
                return "Produit : {$av->product->name} - Auteur : {$av->author_name} \n{$stars}";
            })
            ->values()
            ->implode("\n");

        return [
            // Total products
            Stat::make('Total Produits', Product::count())
                ->description('Nombre total de produits')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('success'),

            // Nouveautés
            Stat::make('Nouveautés', Product::where('new', true)->count())
                ->description('Produits en nouveauté')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('warning'),

            // Catégories
            Stat::make('Catégories', Category::count())
                ->description('Nombre de catégories')
                ->descriptionIcon('heroicon-m-folder')
                ->color('primary'),

            // // One element showing all categories
            // Stat::make('Produits par catégorie', $categoryBreakdown)
            //     ->description('Nombre de produits par categorie')
            //     ->descriptionIcon('heroicon-m-tag')
            //     ->color('info')
            //     ->extraAttributes(['style' => 'white-space: pre-line;']) // keeps line break
            //     ->columnSpan(4),

            Stat::make('Reviews', $avisBreakdown)
                ->description('Dernier avis')
                ->descriptionIcon('heroicon-m-star')
                ->extraAttributes(['style' => 'white-space: pre-line;'])
                ->columnSpan(2)
                ->color('warning'),
        ];
    }
}
