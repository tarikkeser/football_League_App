<?php require(__DIR__ . "/../partials/header.php"); ?>
<!-- League Standings -->
<div class="container my-5">
    <header class="text-center mb-4">
        <h2 class="display-4">League Standings</h2>
    </header>
    <!-- Admin check -->
    <?php if ($isAdmin): ?>
        <div class="container my-4">
            <h4 class="text-center mb-4">Manage Team Stats</h4>
            <!-- Buttons -->
            <div class="d-flex justify-content-around mb-4">
                <button class="btn btn-success" id="showAddFormBtn">Add Team</button>
                <button class="btn btn-danger" id="showDeleteFormBtn">Delete Team</button>
            </div>

            <!-- Form container -->
            <div class="form-container">
                <!-- Add Form -->
                <div id="addForm" class="form-box mb-4" style="display: none;">
                    <h5 class="text-center">Add Team</h5>
                    <form id="addTeamForm" class="border p-4 bg-light shadow-sm rounded">
                        <div class="mb-3">
                            <label for="add_team_name" class="form-label">Team Name</label>
                            <input type="text" id="add_team_name" class="form-control rounded-pill" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100 rounded-pill">Add Team</button>
                    </form>
                </div>
                <!-- Delete Form -->
                <div id="deleteForm" class="form-box mb-4" style="display: none;">
                    <h5 class="text-center">Delete Team</h5>
                    <form id="deleteTeamForm" class="border p-4 bg-light shadow-sm rounded">
                        <input type="hidden" id="team_id">
                        <div class="mb-3">
                            <label for="delete_team_name" class="form-label">Team Name</label>
                            <input type="text" id="delete_team_name" class="form-control rounded-pill" readonly>
                        </div>
                        <button type="submit" class="btn btn-danger w-100 rounded-pill">Delete Team</button>
                    </form>
                </div>

            </div>

        </div>
    <?php endif; ?>
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
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var isAdmin = <?php echo json_encode($isAdmin); ?>;
</script>
<!-- League Standings JS -->
<script src="/assets/js/standings.js"></script>

</body>

</html>