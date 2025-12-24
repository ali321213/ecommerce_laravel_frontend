<?php

namespace Database\Factories;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()->words(3, true);

        return [
            'category_id' => Category::query()->inRandomOrder()->first()?->id ?? Category::factory(),
            'brand_id' => Brand::query()->inRandomOrder()->first()?->id ?? Brand::factory(),
            'name' => $name,
            'slug' => Str::slug($name),
            'images' => [
                'products/product1.jpg',
                'products/product2.png',
            ],
            'description' => $this->faker->paragraph(4),
            'short_description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 100, 5000),
            'sku' => strtoupper(Str::random(10)),
            'is_active' => $this->faker->boolean(90), // mostly active
            'is_featured' => $this->faker->boolean(20),
            'in_stock' => $this->faker->numberBetween(0, 500),
            'on_sale' => $this->faker->boolean(30),
            'meta_title' => $name,
            'meta_description' => $this->faker->sentence(12),
            'meta_keywords' => implode(',', $this->faker->words(5)),
        ];
    }
}
