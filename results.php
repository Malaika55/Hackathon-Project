<?php
// Get data from URL parameters
$pest = $_GET['pest'];
$remedy = $_GET['remedy'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Diagnosis Results</h1>
        <p class="text-center">Here is the information for the pest/disease you selected:</p>

        <div class="card">
            <div class="card-body">
                <h3>Pest/Disease: <?php echo htmlspecialchars($pest); ?></h3>
                <p><strong>Remedy:</strong> <?php echo htmlspecialchars($remedy); ?></p>
            </div>
        </div>

        <a href="index.html" class="btn btn-primary mt-3">Go Back</a>
    </div>
</body>
</html>