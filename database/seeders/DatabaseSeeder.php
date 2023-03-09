<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'customer',
        ]);

        $faker = Faker::create();


        foreach (range(1, 10) as $_) {
            DB::table('rests')->insert([
                'title' => $faker->lastName(),
                'code' => rand(1, 100000),
                'address' => $faker->streetAddress(),
            ]);
        }

        foreach (range(1, 33) as $_) {
            DB::table('menus')->insert([
                'title' => $faker->streetSuffix(),
                'rest_id' => rand(1, 10),
            ]);
        }

        foreach (range(1, 121) as $_) {
            DB::table('dishes')->insert([
                'title' => $faker->lastName(),
                'price' => rand(1, 33),
                'photo' => null,
                'menu_id' => rand(1, 30),
                'description' => $faker->realText(100, 5),
            ]);
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
