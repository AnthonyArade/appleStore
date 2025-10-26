<?php
namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;

    public function definition(): array
    {

        // Liste des couleurs disponible
        $allColors = [
            'Black'        => 'bg-gray-900',
            'Blue'         => 'bg-blue-500',
            'Silver'       => 'bg-gray-300',
            'Purple'       => 'bg-purple-500',
            'Gray'         => 'bg-gray-500',
            'White'        => 'bg-white',
            'Red'          => 'bg-red-500',
            'Green'        => 'bg-green-400',
            'Pink'         => 'bg-pink-400',
            'Beige'        => 'bg-yellow-100',
            'Brown'        => 'bg-amber-800',
            'Yellow'       => 'bg-yellow-400',
            'Amber'        => 'bg-amber-400',
            'Gold'         => 'bg-yellow-500',
            'Lime'         => 'bg-lime-400',
            'Blue Light'   => 'bg-blue-300',
            'Blue Dark'    => 'bg-blue-600',
            'Gray Light'   => 'bg-gray-100',
            'Gray Dark'    => 'bg-gray-800',
            'Green Light'  => 'bg-green-300',
            'Purple Light' => 'bg-purple-400',
            'Amber Dark'   => 'bg-amber-700',
        ];

        // Selectionne 1 a 4 couleurs au sein de la variable $allColors
        $selectedKeys = $this->faker->randomElements(array_keys($allColors), $this->faker->numberBetween(1, 4));
        $colors       = array_intersect_key($allColors, array_flip($selectedKeys));
        return [
            'name'        => $this->faker->words(3, true),

            // generation d'image
            'image'       => $this->faker->imageUrl(640, 480, 'technics', true),

            // generation d'une description de 2 paragraphe
            'description' => $this->faker->paragraphs(2, true),

            // generation du boolean avec 25% qu'il soit nouveau
            'new'         => $this->faker->boolean(25),

            // Generation du float avec 2 chiffre apres la virgule
            'price'       => $this->faker->randomFloat(2, 1, 2000),

            'color'       => $colors,
        ];
    }
}
