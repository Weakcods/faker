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

// Display books in an HTML table
echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse; text-align: left;'>";
echo "<tr><th>Title</th><th>Author</th><th>Publisher</th><th>ISBN</th><th>Published Year</th></tr>";
foreach ($books as $book) {
    echo "<tr>";
    echo "<td>{$book['title']}</td>";
    echo "<td>{$book['author']}</td>";
    echo "<td>{$book['publisher']}</td>";
    echo "<td>{$book['isbn']}</td>";
    echo "<td>{$book['published_year']}</td>";
    echo "</tr>";
}
echo "</table>";

?>
