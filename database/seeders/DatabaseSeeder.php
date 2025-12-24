<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::factory()->admin()->create();
        User::factory()->user()->create();
        // Normal users
        User::factory()->count(2)->create();
        /* Master Data */
        Unit::factory()->count(5)->create();
        Brand::factory()->count(5)->create();
        Category::factory()->count(5)->create();
        /* Products */
        Product::factory()->count(30)->create();
    }
}
