<?php require(__DIR__ . "/../partials/header.php"); ?>

    <div class="container my-4">
        <!-- Team Selection -->
        <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <h4 class="text-center mb-3">Select Team</h4>
                <select id="teamSelect" class="form-select rounded-pill">
                    <option value="">Select a team</option>
                </select>
            </div>
        </div>

        <?php if ($isAdmin): ?>
        <!-- Admin Controls -->
        <div class="container my-4">
            <div class="d-flex justify-content-around mb-4">
                <button class="btn btn-success rounded-pill" id="showAddFormBtn">Add Player</button>
                <button class="btn btn-primary rounded-pill" id="showUpdateFormBtn">Update Player</button>
                <button class="btn btn-danger rounded-pill" id="showDeleteFormBtn">Delete Player</button>
            </div>

            <!-- Form container -->
            <div class="form-container">
                <!-- Add Form -->
                <div id="addForm" class="form-box mb-4" style="display: none;">
                    <h5 class="text-center">Add Player</h5>
                    <form id="addPlayerForm" class="border p-4 bg-light shadow-sm rounded">
                        <div class="mb-3">
                            <label for="add_player_name" class="form-label">Player Name</label>
                            <input type="text" id="add_player_name" class="form-control rounded-pill" required>
                        </div>
                        <div class="mb-3">
                            <label for="add_position" class="form-label">Position</label>
                            <select id="add_position" class="form-select rounded-pill" required>
                                <option value="goalkeeper">Goalkeeper</option>
                                <option value="defender">Defender</option>
                                <option value="midfielder">Midfielder</option>
                                <option value="forward">Forward</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="add_nationality" class="form-label">Nationality</label>
                            <input type="text" id="add_nationality" class="form-control rounded-pill">
                        </div>
                        <div class="mb-3">
                            <label for="add_foot" class="form-label">Preferred Foot</label>
                            <select id="add_foot" class="form-select rounded-pill" required>
                                <option value="right">Right</option>
                                <option value="left">Left</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100 rounded-pill">Add Player</button>
                    </form>
                </div>

                <!-- Update Form -->
                <div id="updateForm" class="form-box mb-4" style="display: none;">
                    <h5 class="text-center">Update Player</h5>
                    <form id="updatePlayerForm" class="border p-4 bg-light shadow-sm rounded">
                        <input type="hidden" id="player_id">
                        <div class="mb-3">
                            <label for="player_name" class="form-label">Player Name</label>
                            <input type="text" id="player_name" class="form-control rounded-pill" required>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select id="position" class="form-select rounded-pill" required>
                                <option value="goalkeeper">Goalkeeper</option>
                                <option value="defender">Defender</option>
                                <option value="midfielder">Midfielder</option>
                                <option value="forward">Forward</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nationality" class="form-label">Nationality</label>
                            <input type="text" id="nationality" class="form-control rounded-pill">
                        </div>
                        <div class="mb-3">
                            <label for="foot" class="form-label">Preferred Foot</label>
                            <select id="foot" class="form-select rounded-pill" required>
                                <option value="right">Right</option>
                                <option value="left">Left</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill">Update Player</button>
                    </form>
                </div>

                <!-- Delete Form -->
                <div id="deleteForm" class="form-box mb-4" style="display: none;">
                    <h5 class="text-center">Delete Player</h5>
                    <form id="deletePlayerForm" class="border p-4 bg-light shadow-sm rounded">
                        <div class="mb-3">
                            <label for="delete_player_name" class="form-label">Player Name</label>
                            <input type="text" id="delete_player_name" class="form-control rounded-pill" readonly>
                        </div>
                        <button type="submit" class="btn btn-danger w-100 rounded-pill">Delete Player</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Players List -->
        <div class="container my-5">
            <header class="text-center mb-4">
                <h2 class="display-4">Team Players</h2>
            </header>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Nationality</th>
                            <th>Preferred Foot</th>
                        </tr>
                    </thead>
                    <tbody id="players-body">
                        <!-- Players will be loaded here dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Players JS -->
    <script src="/assets/js/players.js"></script>

    <script>
        const isAdmin = <?php echo $isAdmin ? 'true' : 'false'; ?>;
    </script>

    <!-- Form Handling -->
    <script>
        function toggleForm(formId) {
            const forms = ['addForm', 'updateForm', 'deleteForm'];
            forms.forEach(form => {
                document.getElementById(form).style.display = 'none';
            });
            if (formId) {
                document.getElementById(formId).style.display = 'block';
            }
        }

        if (isAdmin) {
            document.getElementById('showAddFormBtn').addEventListener('click', () => toggleForm('addForm'));
            document.getElementById('showUpdateFormBtn').addEventListener('click', () => toggleForm('updateForm'));
            document.getElementById('showDeleteFormBtn').addEventListener('click', () => toggleForm('deleteForm'));
        }
    </script>
</body>
</html>