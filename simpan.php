<?php
session_start();
include 'db.php';

// Insert the response into the database
if (isset($_GET['ket'])) {
    $response = $_GET['ket'];

    // Prepare and execute the INSERT query for the response
    $stmt = $pdo->prepare("INSERT INTO survey_responses (response) VALUES (:response)");
    $stmt->bindParam(':response', $response);
    $stmt->execute();

    // Store the user's response in the session
    $_SESSION['response'] = $response;

    // Redirect to the suggestion form (step 2)
    header("Location: simpan.php?step=2");
    exit;
}

// Insert the suggestion into the database (if submitted)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['saran'])) {
    $suggestion = $_POST['saran'];

    // Prepare and execute the INSERT query for the suggestion
    $stmt = $pdo->prepare("INSERT INTO survey_suggestions (suggestion) VALUES (:suggestion)");
    $stmt->bindParam(':suggestion', $suggestion);
    $stmt->execute();

    // Store the suggestion in the session
    $_SESSION['suggestion'] = $suggestion;

    // Redirect to the thank you page after submission
    header("Location: thank_you.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey Kepuasan PST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="jumbotron jumbotron-fluid bg-dark text-white">
        <div class="container">
            <h5 class="italic font-arial uppercase" style="font-size: 20px;">BADAN PUSAT STATISTIK</h5>
            <h5 class="italic font-arial uppercase" style="font-size: 20px;">DAERAH ISTIMEWA YOGYAKARTA</h5>
            <p class="lead">
                <h2 class="text-center">
                    Pelayanan Statistik Terpadu (PST) <br> Survey Kepuasan Pengunjung
                </h2>
            </p>
        </div>
    </div>

    <!--- Survey Response Section (GET method part) -->
    <?php if (!isset($_GET['step']) || $_GET['step'] == '1'): ?>
        <div class="container">
            <div class="alert alert-primary" role="alert">
                Perhatian, klik ikon untuk memberikan penilaian!
            </div>

            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col d-flex justify-content-center">
                        <a href="simpan.php?ket=puas">
                            <img src="img/very-happy.png" class="img-fluid" style="width: 200px">
                        </a>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <a href="simpan.php?ket=ragu-ragu">
                            <img src="img/doubt.png" class="img-fluid" style="width: 200px">
                        </a>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <a href="simpan.php?ket=tidak puas">
                            <img src="img/angry2.png" class="img-fluid" style="width: 200px">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!--- Suggestion Form (POST method part) -->
    <?php if (isset($_GET['step']) && $_GET['step'] == '2'): ?>
        <div class="container mt-4">
            <h4 class="text-center">Kritik dan Saran</h4>
            <form action="simpan.php" method="post">
                <div class="mb-3">
                    <textarea class="form-control" id="saran" name="saran" rows="4" placeholder="Tulis saran Anda di sini..."></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Kirim Saran</button>
                </div>
            </form>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
