<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Faker\Provider\Base;
use Faker\Provider\Internet;
use Faker\Provider\en_US\Person;

$factory->define(App\Models\CustomerModel::class, function (Faker $faker) {
    return [
        'firstname' =>$faker->userName,
        'lastname'=> $faker->lastName,
        'email' => $faker-> email,
        'cc' => $faker->numberBetween($min = 1000000, $max = 9000000) ,
        'dob'=> $faker->date($format = 'Y-m-d', $max = '2002-12-31'),
        'country'=> $faker->country,
        'city'=> $faker->city,

    ];
});




