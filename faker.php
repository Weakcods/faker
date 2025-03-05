<?php

require_once 'vendor/autoload.php';
$faker = Faker\Factory::create();
echo $faker->name . "\n";
echo $faker->address . "\n";
echo $faker->text . "\n";
echo $faker->email . "\n";
?>