<?php
namespace Database\Seeders;

use App\Category; // Ensure correct namespace for Category
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categories = [
            "Uncategorized", "Billing/Payments", "Technical question"
        ];

        foreach ($categories as $category) {
            Category::create([
                'name'  => $category,
                'color' => $faker->hexcolor
            ]);
        }
    }
}