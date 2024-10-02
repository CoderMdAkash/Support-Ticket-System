<?php
namespace Database\Seeders;

use App\Status; // Ensure correct namespace for Status
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $statuses = [
            'Open', 'Closed'
        ];

        foreach ($statuses as $status) {
            Status::create([
                'name'  => $status,
                'color' => $faker->hexcolor
            ]);
        }
    }
}