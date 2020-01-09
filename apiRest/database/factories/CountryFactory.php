<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Faker\Provider\Base;
use Faker\Provider\Internet;
use Faker\Provider\en_US\Person;

$factory->define(App\Models\CountryModel::class, function (Faker $faker) {
    return [
        'name' =>$faker->country,
        'iso' => $faker->citySuffix,
    ];
});
