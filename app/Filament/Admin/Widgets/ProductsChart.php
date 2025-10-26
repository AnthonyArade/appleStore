<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class ProductsChart extends ChartWidget
{
    protected ?string $heading = 'Produits par category';

    protected function getData(): array
    {
        $categories = Category::withCount('products')->get();

        $labels = [];
        $data = [];

        foreach ($categories as $category) {
            $labels[] = $category->name;
            $data[] = $category->products_count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Nombre de produits',
                    'data' => $data,
                    'backgroundColor' => '#05df72',
                    'borderColor' => '#1e40af',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    // Optional: Add some configuration options
    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }
}