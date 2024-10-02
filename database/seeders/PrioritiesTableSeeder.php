<?php
namespace Database\Seeders;

use App\Priority; // Ensure the correct namespace for Priority
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $priorities = [
            'Low', 'Medium', 'High'
        ];

        foreach ($priorities as $priority) {
            Priority::create([
                'name'  => $priority,
                'color' => $faker->hexcolor
            ]);
        }
    }
}

