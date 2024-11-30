<?php

$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";


$response = file_get_contents($url);


if (!$response) {
    die('Error fetching data from the API');
}


$data = json_decode($response, true);


if (!isset($data['records']) || empty($data['records'])) {
    die('No data found');
}

$records = $data['records'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UOB Students by Nationality</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <style>
        table {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <header>
        <h1>University of Bahrain Students by Nationality</h1>
        <p>Data fetched and displayed using PHP and Pico CSS</p>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nationality</th>
                    <th>College</th>
                    <th>Program</th>
                    <th>Number of Students</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): 
                    $fields = $record['record']['fields']; 
                ?>
                    <tr>
                        <td><?= htmlspecialchars($fields['nationality']) ?></td>
                        <td><?= htmlspecialchars($fields['colleges']) ?></td>
                        <td><?= htmlspecialchars($fields['the_programs']) ?></td>
                        <td><?= htmlspecialchars($fields['number_of_students']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>