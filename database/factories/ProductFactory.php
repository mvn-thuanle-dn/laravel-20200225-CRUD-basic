<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Product;
use App\Category;
use Illuminate\Support\Collection;

$factory->define(Product::class, function (Faker $faker) {
    $category_id = Category::all()->pluck('id');
        return [
            'name' => $faker->name(),
            'quantity' => $faker->numberBetween($min = 10, $max = 90),
            'description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
            'category_id' => $faker->randomElement($category_id),
        ];
});
