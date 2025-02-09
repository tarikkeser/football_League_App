<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>League Standings</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css"> <!-- Custom CSS -->
</head>
<body>

    <div class="container my-5">
        <header class="text-center mb-4">
            <h2 class="display-4">League Standings</h2>
        </header>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Logo</th>
                        <th>Team Name</th>
                        <th>Points</th>
                        <th>Goals Scored</th>
                        <th>Goals Conceded</th>
                    </tr>
                </thead>
                <tbody id="standings-body">
                    <!-- Teams will be loaded here dynamically -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/standings.js"></script>
</body>
</html>
