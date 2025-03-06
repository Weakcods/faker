<?php
require 'vendor/autoload.php';

use Faker\Factory;

// Create Faker instance with Philippine locale
$faker = Factory::create('en_PH');

// Database connection
$host = 'localhost';
$dbname = 'faker';
$user = 'root';
$pass = '76532@';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Clear existing data
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 0");
    $pdo->exec("TRUNCATE TABLE transactions");
    $pdo->exec("TRUNCATE TABLE employees");
    $pdo->exec("TRUNCATE TABLE offices");
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 1");

    // Generate 50 Offices
    $officeIds = [];
    for ($i = 0; $i < 50; $i++) {
        $sql = "INSERT INTO offices (name, contactnum, email, address, city, country, postal) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $faker->company(),
            $faker->phoneNumber(),
            $faker->companyEmail(),
            $faker->streetAddress(),
            $faker->city(),
            'Philippines',
            $faker->postcode()
        ]);
        $officeIds[] = $pdo->lastInsertId();
    }

    // Generate 200 Employees
    $employeeIds = [];
    for ($i = 0; $i < 200; $i++) {
        $sql = "INSERT INTO employees (lastname, firstname, office_id, address) 
                VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $faker->lastName(),
            $faker->firstName(),
            $faker->randomElement($officeIds),
            $faker->address()
        ]);
        $employeeIds[] = $pdo->lastInsertId();
    }

    // Generate 500 Transactions
    $actions = ['IN', 'OUT', 'PENDING', 'COMPLETED', 'ARCHIVED'];
    for ($i = 0; $i < 500; $i++) {
        $sql = "INSERT INTO transactions (employee_id, office_id, datelog, action, remarks, documentcode) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $faker->randomElement($employeeIds),
            $faker->randomElement($officeIds),
            $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'),
            $faker->randomElement($actions),
            $faker->sentence(),
            'DOC-' . $faker->unique()->numberBetween(1000, 9999)
        ]);
    }

    echo "Data generation completed successfully!\n";
    echo "Generated:\n";
    echo "- 50 Offices\n";
    echo "- 200 Employees\n";
    echo "- 500 Transactions\n";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

?>