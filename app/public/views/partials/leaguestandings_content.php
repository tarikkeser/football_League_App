<?php require(__DIR__ . "/../partials/header.php"); ?>
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


<!-- Sending to Js -->
<script>
    var isAdmin = <?php echo json_encode($isAdmin); ?>;
</script>

<!-- League Standings JS -->
<script src="/assets/js/standings.js"></script>

</body>
</html>
