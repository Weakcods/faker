<?php
require 'vendor/autoload.php';

use Faker\Factory;

// Create Faker instance with Philippine locale
$faker = Factory::create('en_PH');

// Arrays to store generated data
$offices = [];
$employees = [];
$transactions = [];

echo "\033[1;36m=== Generating Fake Data ===\033[0m\n\n";

// Generate 50 Offices
echo "Generating Offices...\n";
for ($i = 0; $i < 50; $i++) {
    $officeId = $i + 1;
    $offices[] = [
        'id' => $officeId,
        'name' => $faker->company(),
        'contactnum' => $faker->phoneNumber(),
        'email' => $faker->companyEmail(),
        'address' => $faker->streetAddress(),
        'city' => $faker->city(),
        'country' => 'Philippines',
        'postal' => $faker->postcode()
    ];
    echo "\r\033[K" . "Progress: " . ($i + 1) . "/50";
}
echo "\n\033[32mOffices generated successfully!\033[0m\n\n";

// Generate 200 Employees
echo "Generating Employees...\n";
for ($i = 0; $i < 200; $i++) {
    $employeeId = $i + 1;
    $employees[] = [
        'id' => $employeeId,
        'lastname' => $faker->lastName(),
        'firstname' => $faker->firstName(),
        'office_id' => $faker->randomElement(array_column($offices, 'id')),
        'address' => $faker->address()
    ];
    echo "\r\033[K" . "Progress: " . ($i + 1) . "/200";
}
echo "\n\033[32mEmployees generated successfully!\033[0m\n\n";

// Generate 500 Transactions
echo "Generating Transactions...\n";
$actions = ['IN', 'OUT', 'PENDING', 'COMPLETED', 'ARCHIVED'];
for ($i = 0; $i < 500; $i++) {
    $transactions[] = [
        'employee_id' => $faker->randomElement(array_column($employees, 'id')),
        'office_id' => $faker->randomElement(array_column($offices, 'id')),
        'datelog' => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'),
        'action' => $faker->randomElement($actions),
        'remarks' => $faker->realText(50), // Changed from text() to realText()
        'documentcode' => 'DOC-' . $faker->unique()->numberBetween(1000, 9999)
    ];
    echo "\r\033[K" . "Progress: " . ($i + 1) . "/500";
}
echo "\n\033[32mTransactions generated successfully!\033[0m\n\n";

// Display sample data
echo "\033[1;33m=== Sample Generated Data ===\033[0m\n\n";

echo "\033[1mSample Office:\033[0m\n";
print_r($offices[0]);
echo "\n";

echo "\033[1mSample Employee:\033[0m\n";
print_r($employees[0]);
echo "\n";

echo "\033[1mSample Transaction:\033[0m\n";
print_r($transactions[0]);
echo "\n";

echo "\033[1;32m=== Generation Complete ===\033[0m\n";
echo "Generated:\n";
echo "- " . count($offices) . " Offices\n";
echo "- " . count($employees) . " Employees\n";
echo "- " . count($transactions) . " Transactions\n";
?>