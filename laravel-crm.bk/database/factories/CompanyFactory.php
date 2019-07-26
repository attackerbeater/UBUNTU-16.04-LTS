<?php

use App\Companies;
use App\User;
use Faker\Generator as Faker;

$factory->define(Companies::class, function (Faker $faker) {

    return [
        'name'       => $faker->company,
        'email'      => $faker->email,
        'website'    => 'https://'.$faker->domainName,
        'address'    => $faker->address,
        'creator_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
