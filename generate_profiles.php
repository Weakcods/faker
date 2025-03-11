<?php
require 'vendor/autoload.php';

use Faker\Factory;

// Create Faker instance with Philippine locale
$faker = Factory::create('en_PH');

// Define Philippine provinces (add more as needed)
$provinces = [
    'Metro Manila', 'Cebu', 'Davao', 'Rizal', 'Cavite', 'Laguna', 'Batangas',
    'Pampanga', 'Bulacan', 'Nueva Ecija', 'Iloilo', 'Negros Occidental',
    'Pangasinan', 'Isabela', 'Quezon'
];

// Define common Filipino job titles
$jobTitles = [
    'Teacher', 'Software Engineer', 'Call Center Agent', 'Nurse', 
    'Bank Teller', 'Accountant', 'Store Manager', 'Office Administrator',
    'Sales Representative', 'Customer Service Representative', 
    'Business Analyst', 'Marketing Manager', 'Chef',
    'Virtual Assistant', 'Web Developer', 'Medical Doctor',
    'Government Employee', 'Restaurant Manager', 'IT Professional'
];

// Generate 5 user profiles
$profiles = [];
for ($i = 0; $i < 5; $i++) {
    $profiles[] = [
        'name' => $faker->firstName() . ' ' . $faker->lastName(),
        'email' => $faker->email(),
        'phone' => '+63 9' . rand(10,99) . ' ' . rand(100,999) . ' ' . rand(1000,9999),
        'address' => $faker->streetAddress() . ', ' . 
                    $faker->city() . ', ' . 
                    $provinces[array_rand($provinces)] . ', Philippines ' . 
                    $faker->postcode(),
        'birthdate' => $faker->date('Y-m-d', '-18 years'),
        'job' => $faker->randomElement($jobTitles)  // Changed this line
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filipino User Profiles</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Filipino User Profiles</h1>
        
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Birthdate</th>
                        <th>Job Title</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($profiles as $profile): ?>
                    <tr>
                        <td><?= htmlspecialchars($profile['name']) ?></td>
                        <td><?= htmlspecialchars($profile['email']) ?></td>
                        <td><?= htmlspecialchars($profile['phone']) ?></td>
                        <td><?= htmlspecialchars($profile['address']) ?></td>
                        <td><?= htmlspecialchars($profile['birthdate']) ?></td>
                        <td><?= htmlspecialchars($profile['job']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="text-center mt-4">
            <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-primary">Generate New Profiles</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
