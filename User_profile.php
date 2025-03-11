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


?>