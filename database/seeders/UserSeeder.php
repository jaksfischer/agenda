<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        $faker = Faker::create();
        $reg = 1;

        while($reg <= 5) {
            DB::table('users')->insert([
                'id' => $reg,
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password'),
                'email_verified_at' => date('Y/m/d H:i:s'),
                'created_at' => date('Y/m/d H:i:s')
            ]);
            $reg = $reg+1;
        }
    }
}
