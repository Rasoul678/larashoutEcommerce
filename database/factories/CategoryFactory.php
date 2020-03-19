<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'          =>  $faker->firstNameFemale,
        'description'   =>  $faker->realText(100),
        'parent_id'     =>  1,
        'menu'          =>  1,
        'slug'          => $faker->name,
    ];
});
