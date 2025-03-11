<?php
require 'vendor/autoload.php';

use Faker\Factory;

$faker = Factory::create();

// Generate 15 fake book records
$books = [];
for ($i = 0; $i < 15; $i++) {
    $books[] = [
        'title' => $faker->sentence(3),
        'author' => $faker->name,
        'genre' => $faker->word,
        'publication_year' => $faker->numberBetween(1900, 2024),
        'isbn' => $faker->numerify('#############'),
        'summary' => $faker->paragraph(1)
    ];
}

// Display books in a formatted table
echo "<table border='1' cellspacing='0' cellpadding='8' style='border-collapse: collapse; width: 100%; text-align: left;'>";
echo "<tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Publication Year</th>
        <th>ISBN</th>
        <th>Summary</th>
      </tr>";

}
echo "</table>";

?>
