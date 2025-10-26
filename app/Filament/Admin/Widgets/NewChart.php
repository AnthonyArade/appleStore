<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Product;
use Filament\Widgets\ChartWidget;

class NewChart extends ChartWidget
{
    protected ?string $heading = 'Taux de distribution des nouveaux produits';

    protected function getData(): array
    {
        // Enumeration des produits nouveau et bon
        $newProductsCount = Product::where('new', true)->count();
        $oldProductsCount = Product::where('new', false)->count();

        //mise en place des données avec les couleur de fond/border et des labels
        return [
            'datasets' => [
                [
                    'data' => [$newProductsCount, $oldProductsCount],
                    'backgroundColor' => ['#fd9a00', '#6b7280'], // Green for new, gray for old
                    'hoverBackgroundColor' => ['#bb6e00', '#4b5563'],
                    'borderWidth' => 2,
                    'borderColor' => '#ffffff',
                ],
            ],
            'labels' => ['Nouveau produits', 'Ancien Produits'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    // Nous indique le pourcentage des nouveaux produtis
    public function getDescription(): ?string
    {
        $totalProducts = Product::count();
        $newProductsCount = Product::where('new', true)->count();
        $percentage = $totalProducts > 0 ? round(($newProductsCount / $totalProducts) * 100, 1) : 0;
        
        return "{$percentage}% Des produits sont Nouveau";
    }
}