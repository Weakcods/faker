<?php
require 'vendor/autoload.php';

use Faker\Factory;

$faker = Factory::create();

// Generate fake book records
$books = [];
for ($i = 0; $i < 15; $i++) {
    $books[] = [
        'title' => $faker->sentence(3),
        'author' => $faker->name,
        'publisher' => $faker->company,
        'isbn' => $faker->isbn13,
        'published_year' => $faker->year,
    ];
}


?>
