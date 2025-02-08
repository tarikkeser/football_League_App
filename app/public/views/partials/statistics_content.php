<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Statistics</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Player Statistics</h1>


        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Goals</th>
                    <th>Assists</th>
                    <th>Team</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($statistics as $stat): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($stat['name']); ?></td>
                        <td><?php echo ucfirst(htmlspecialchars($stat['position'])); ?></td>
                        <td><?php echo htmlspecialchars($stat['goals']); ?></td>
                        <td><?php echo htmlspecialchars($stat['assists']); ?></td>
                        <td><?php echo htmlspecialchars($stat['team_name']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>
</html>
