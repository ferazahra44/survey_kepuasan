<?php
// db.php is the file where your database connection is stored
include 'db.php';

// Fetch the response counts from the database
$query = "SELECT response, COUNT(*) AS count FROM survey_responses GROUP BY response";
$stmt = $pdo->query($query);
$response_counts = [
    'puas' => 0,
    'ragu-ragu' => 0,
    'tidak puas' => 0
];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if (isset($response_counts[$row['response']])) {
        $response_counts[$row['response']] = $row['count'];
    }
}

// Define the CSV file name
$file_name = "satisfaction_summary_" . date('Y-m-d_H-i-s') . ".csv";

// Set headers to prompt for download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $file_name . '"');

// Open the PHP output stream
$output = fopen('php://output', 'w');

// Add column headers to the CSV file
fputcsv($output, ['Response', 'Count']);

// Write the data to the CSV file
fputcsv($output, ['Puas (Very Happy)', $response_counts['puas']]);
fputcsv($output, ['Ragu-Ragu (Doubt)', $response_counts['ragu-ragu']]);
fputcsv($output, ['Tidak Puas (Not Satisfied)', $response_counts['tidak puas']]);

// Close the output stream
fclose($output);

// Exit to prevent any other output after CSV
exit();
?>
