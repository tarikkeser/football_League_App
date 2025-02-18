<?php require(__DIR__ . "/../partials/header.php"); ?>

<!-- Admin check -->
<?php if ($isAdmin): ?>
    <div class="container my-4">
        <h4 class="text-center mb-4">Manage Team Stats</h4>

        <!-- Butonlar -->
        <div class="d-flex justify-content-around mb-4">
            <button class="btn btn-success" id="showAddFormBtn">Add Team</button>
            <button class="btn btn-primary" id="showUpdateFormBtn">Update Team</button>
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
                    <div class="mb-3">
                        <label for="add_points" class="form-label">Points</label>
                        <input type="number" id="add_points" class="form-control rounded-pill" required>
                    </div>
                    <div class="mb-3">
                        <label for="add_goals_scored" class="form-label">Goals Scored</label>
                        <input type="number" id="add_goals_scored" class="form-control rounded-pill" required>
                    </div>
                    <div class="mb-3">
                        <label for="add_goals_conceded" class="form-label">Goals Conceded</label>
                        <input type="number" id="add_goals_conceded" class="form-control rounded-pill" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100 rounded-pill">Add Team</button>
                </form>
            </div>

            <!-- Update Form -->
            <div id="updateForm" class="form-box mb-4" style="display: none;">
                <h5 class="text-center">Update Team</h5>
                <form id="updateTeamForm" class="border p-4 bg-light shadow-sm rounded">
                    <input type="hidden" id="team_id">
                    <div class="mb-3">
                        <label for="team_name" class="form-label">Team Name</label>
                        <input type="text" id="team_name" class="form-control rounded-pill" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="points" class="form-label">Points</label>
                        <input type="number" id="points" class="form-control rounded-pill">
                    </div>
                    <div class="mb-3">
                        <label for="goals_scored" class="form-label">Goals Scored</label>
                        <input type="number" id="goals_scored" class="form-control rounded-pill">
                    </div>
                    <div class="mb-3">
                        <label for="goals_conceded" class="form-label">Goals Conceded</label>
                        <input type="number" id="goals_conceded" class="form-control rounded-pill">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-pill">Update</button>
                </form>
            </div>

            <!-- Delete Form -->
            <div id="deleteForm" class="form-box mb-4" style="display: none;">
                <h5 class="text-center">Delete Team</h5>
                <form id="deleteTeamForm" class="border p-4 bg-light shadow-sm rounded">
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


<!-- League Standings -->
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- League Standings JS -->
<script src="/assets/js/standings.js"></script>

<script>
    const isAdmin = <?php echo $isAdmin ? 'true' : 'false'; ?>;
</script>


<!-- FORM HANDLING -->
<script>
    document.getElementById('showAddFormBtn').addEventListener('click', function() {
        toggleForm('addForm');
    });

    document.getElementById('showUpdateFormBtn').addEventListener('click', function() {
        toggleForm('updateForm');
    });

    document.getElementById('showDeleteFormBtn').addEventListener('click', function() {
        toggleForm('deleteForm');
    });

    function toggleForm(formId) {
        // forms
        const addForm = document.getElementById('addForm');
        const updateForm = document.getElementById('updateForm');
        const deleteForm = document.getElementById('deleteForm');

        // hide all forms
        addForm.style.display = 'none';
        updateForm.style.display = 'none';
        deleteForm.style.display = 'none';

        // Show only selected form
        const formToShow = document.getElementById(formId);
        formToShow.style.display = 'block';
    }
</script>

</body>

</html>