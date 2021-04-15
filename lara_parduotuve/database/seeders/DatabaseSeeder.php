<?php

namespace Database\Seeders;
use Hash;
 use DB;
 use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

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
            'name' => 'Rugile',
            'email' => 'rugile@gmail.com',
            'password' => Hash::make('123'),
        ]);
        $faker = Faker::create('lt_LT');
        $fakerCar = (new \Faker\Factory())::create();
        $fakerCar->addProvider(new \Faker\Provider\Fakecar($fakerCar));
        $makers = 10;
        $cars = 30;
        foreach(range(1, $makers) as $_) {
            DB::table('makers')->insert([
                'name' => $faker->firstName(),
                
            ]);
        }
        foreach(range(1, $cars) as $_) {
            DB::table('cars')->insert([
                'name' => $fakerCar->vehicleType(),
                'plate' => $fakerCar->vehicleRegistration('[A-Z]{2}-[0-9]{5}'),
                'about' => $faker->realText(400, 4),
                'maker_id' => rand(1, $makers),
            ]);
        }
    }
}
