<?php
    require 'vendor/autoload.php';

    use Faker\Factory;
    use Faker\Provider\en_PH\Person;
    use Faker\Provider\en_PH\Address;
    use Faker\Provider\en_PH\PhoneNumber;
    use Faker\Provider\Company;

    $faker = Factory::create('en_PH');
    $faker->addProvider(new Person($faker));
    $faker->addProvider(new Address($faker));
    $faker->addProvider(new PhoneNumber($faker));
    $faker->addProvider(new Company($faker));


    function generateFakeUser() {
        global $faker;
        
        return [
            'full_name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone_number' => '+63' . $faker->numerify('9##-###-####'),
            'address' => $faker->streetAddress . ', ' . $faker->city . ', ' . $faker->state . ', ' . $faker->postcode . ', Philippines',
            'birthdate' => $faker->date('Y-m-d', '-18 years'),
            'job_title' => $faker->jobTitle,
        ];
    }

    $users = [];
    for ($i = 0; $i < 5; $i++) {
        $users[] = generateFakeUser();
    }
?>