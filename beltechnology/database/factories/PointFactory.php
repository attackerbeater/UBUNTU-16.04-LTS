<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Point::class, function (Faker $faker) {
    return [
        'value' => $faker->numberBetween(0, 16),
        'ticket_id' => function (array $point) {
            return DB::table('tickets')
                ->inRandomOrder()
                ->first()
                ->id;
        },
        'owner_id' => function (array $point) {
            return DB::table('users')
                ->inRandomOrder()
                ->first()
                ->id;
        },
    ];
});
