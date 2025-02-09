<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fikstür</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/assets/css/style.css">
</head>

<body>

    <div class="container my-5">
        <h2 class="text-center">Fixture</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Home Team</th>
                    <th>Away Team</th>
                    <th>Stadium</th>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <th>Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>

            <tbody id="fixtures-body" data-is-admin="<?php echo isset($_SESSION['role']) && $_SESSION['role'] === 'admin' ? 'true' : 'false'; ?>">
                <!-- JavaScript ile dinamik olarak doldurulacak -->
            </tbody>
        </table>

        <!-- Güncelleme Formu (Başlangıçta Gizli) -->
        <div id="update-form-container" class="d-none">
            <div class="card p-4 shadow">
                <h4 class="text-center">Update Match</h4>
                <form id="update-match-form">
                    <input type="hidden" id="match-id">

                    <div class="mb-3">
                        <label for="home-score" class="form-label">Home Team Score</label>
                        <input type="number" id="home-score" class="form-control" min="0">
                    </div>

                    <div class="mb-3">
                        <label for="away-score" class="form-label">Away Team Score</label>
                        <input type="number" id="away-score" class="form-control" min="0">
                    </div>
                    <!-- Maç Tamamlandı Mı? -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" id="match-completed" class="form-check-input">
                        <label class="form-check-label" for="match-completed">Match Completed</label>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Update</button>
                    <button type="button" class="btn btn-secondary w-100 mt-2" id="close-form-btn">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    <script src="http://localhost/assets/js/fixtures.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>