<?php
require 'vendor/autoload.php';

use Faker\Factory;

// Create Faker instance
$faker = Factory::create();

// Define specified book genres
$genres = [
    'Fiction', 'Mystery', 'Science Fiction', 'Fantasy',
    'Romance', 'Thriller', 'Historical', 'Horror'
];

// Generate 15 books
$books = [];
for ($i = 0; $i < 15; $i++) {
    $books[] = [
        'title' => ucwords($faker->words(mt_rand(2, 4), true)),
        'author' => $faker->name(),
        'genre' => $faker->randomElement($genres),
        'publication_year' => $faker->numberBetween(1950, 2024),
        'isbn' => $faker->numerify('978#########') . 'X',
        'summary' => $faker->sentences(2, true)
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Book Catalog Database</h1>
        
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Year</th>
                        <th>ISBN</th>
                        <th>Summary</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book): ?>
                    <tr>
                        <td class="fw-bold"><?= htmlspecialchars($book['title']) ?></td>
                        <td><?= htmlspecialchars($book['author']) ?></td>
                        <td><span class="badge bg-primary"><?= htmlspecialchars($book['genre']) ?></span></td>
                        <td><?= htmlspecialchars($book['publication_year']) ?></td>
                        <td><code><?= htmlspecialchars($book['isbn']) ?></code></td>
                        <td><small class="text-muted"><?= htmlspecialchars($book['summary']) ?></small></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="text-center mt-4">
            <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-primary">Generate New Books</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
