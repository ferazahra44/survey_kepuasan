<?php
session_start();
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

// Fetch the suggestions from the database along with the created timestamp
$suggestions_query = "SELECT suggestion, created_at FROM survey_suggestions ORDER BY created_at DESC";
$suggestions_stmt = $pdo->query($suggestions_query);
$suggestions = $suggestions_stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the user's current response and suggestion from the session (if available)
$user_response = isset($_SESSION['response']) ? $_SESSION['response'] : 'No response recorded';
$user_suggestion = isset($_SESSION['suggestion']) ? $_SESSION['suggestion'] : 'No suggestion provided';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey Summary - Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <!-- Use container-fluid to make the layout full-width -->
    <div class="container-fluid mt-5">
        <h2 class="text-center">Terima Kasih atas Partisipasi Anda!</h2>
        <p class="text-center">Kami telah menerima penilaian Anda</p>

        <hr>

        <h3 class="text-center">Survey Summary</h3>

        <div class="row">
            <!-- Satisfaction Summary Section -->
            <div class="col-12 col-md-6">
                <h5 class="text-center">Satisfaction Summary</h5>
                <canvas id="satisfactionChart"></canvas>
            </div>

            <!-- Suggestions Section -->
            <div class="col-12 col-md-6">
                <h5 class="text-center">Suggestions from Users</h5>
                <div>
                    <?php
                    // Display all the suggestions submitted by other users with their timestamps
                    if (!empty($suggestions)) {
                        foreach ($suggestions as $suggestion) {
                            // Format the timestamp (e.g., 'Y-m-d H:i:s')
                            $formattedTimestamp = date('Y-m-d H:i:s', strtotime($suggestion['created_at']));
                            echo "<p><strong>Suggestion:</strong> " . htmlspecialchars($suggestion['suggestion']) . "<br><small>Submitted on: $formattedTimestamp</small></p>";
                        }
                    } else {
                        echo "<p>No suggestions have been provided yet.</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="text-center mt-4">
                <form action="export_csv.php" method="post">
                    <button type="submit" class="btn btn-success">Export Satisfaction Summary to CSV</button>
                </form>
                <a href="index.php" class="btn btn-primary mt-2">Kembali ke Survey</a>
            </div>
    </div>
    

    <script>
        // Data for the pie chart
        const data = {
            labels: ['Puas (Very Happy)', 'Ragu-Ragu (Doubt)', 'Tidak Puas (Not Satisfied)'],
            datasets: [{
                data: [
                    <?php echo $response_counts['puas']; ?>,
                    <?php echo $response_counts['ragu-ragu']; ?>,
                    <?php echo $response_counts['tidak puas']; ?>
                ],
                backgroundColor: ['#36A2EB', '#FFCD56', '#FF5733'],
                hoverOffset: 4
            }]
        };

        // Configuration for the pie chart
        const config = {
            type: 'pie',
            data: data,
        };

        // Render the pie chart
        const satisfactionChart = new Chart(
            document.getElementById('satisfactionChart'),
            config
        );
    </script>

</body>
</html>
