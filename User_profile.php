<?php
require 'vendor/autoload.php';

use Faker\Factory;

$faker = Factory::create();

// Generate fake user profiles
$users = [];
for ($i = 0; $i < 5; $i++) {
    $users[] = [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => '+63' . $faker->numerify('9##-###-####'),
        'address' => $faker->streetAddress . ', ' . $faker->city . ', ' . $faker->postcode . ', Philippines',
        'birthdate' => $faker->date('Y-m-d', '-18 years'),
    ];
}

// Display users in an HTML table
echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse; text-align: left;'>";
echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Birthdate</th></tr>";
foreach ($users as $user) {
    echo "<tr>";
    echo "<td>{$user['name']}</td>";
    echo "<td>{$user['email']}</td>";
    echo "<td>{$user['phone']}</td>";
    echo "<td>{$user['address']}</td>";
    echo "<td>{$user['birthdate']}</td>";
    echo "</tr>";
}
echo "</table>";
?>
