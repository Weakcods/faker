<?php
require 'vendor/autoload.php';

use Faker\Factory;
use Faker\Provider\Address;
use Faker\Provider\PhoneNumber;
use Faker\Provider\Company;

$faker = Factory::create('en_PH');
$faker->addProvider(new Address($faker));
$faker->addProvider(new PhoneNumber($faker));
$faker->addProvider(new Company($faker));

function generateFakeUser() {
    global $faker;
    
    return [
        'full_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => '+63' . $faker->numerify('9##-###-####'),
        'address' => $faker->streetAddress . ', ' . $faker->city . ', ' . $faker->postcode . ', Philippines',
        'birthdate' => $faker->date('Y-m-d', '-18 years'),
        'job_title' => $faker->jobTitle,
    ];
}

$users = [];
for ($i = 0; $i < 10; $i++) {
    $users[] = generateFakeUser();
}

echo json_encode($users, JSON_PRETTY_PRINT);
?>
