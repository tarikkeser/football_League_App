<?php require(__DIR__ . "/../partials/header.php"); ?>
<!-- Container for Fixtures -->
<div class="container mt-5">
    <h1 class="text-center mb-5">Upcoming Match Fixtures</h1>
    <div class="row" id="matches-container">
        <!-- Maç kartları burada dinamik olarak yüklenecek -->
    </div>
</div>

<!-- Global admin kontrolü: Eğer admin iseniz, JavaScript'e bu bilgiyi aktaralım -->
<script>
    const isAdmin = <?php echo ($isLoggedIn && $isAdmin ? 'true' : 'false'); ?>;
</script>

<!-- Modal: Skor Girişi -->
<div class="modal fade" id="scoreModal" tabindex="-1" aria-labelledby="scoreModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="scoreForm">
        <div class="modal-header">
          <h5 class="modal-title" id="scoreModalLabel">Enter Match Score</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="modalMatchId">
            <input type="hidden" id="modalAction" value="play">
            <div class="mb-3">
                <label for="homeScore" class="form-label">Home Team Score</label>
                <input type="number" class="form-control" id="homeScore" required min="0">
            </div>
            <div class="mb-3">
                <label for="awayScore" class="form-label">Away Team Score</label>
                <input type="number" class="form-control" id="awayScore" required min="0">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit Score</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS (örneğin modals için) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Ayrı JavaScript dosyamızı dahil ediyoruz -->
<script src="assets/js/fixtures.js"></script>

<style>
    .match-card {
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        background-color: #f8f9fa;
    }
    .match-header {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }
    .match-details {
        font-size: 1.2rem;
    }
    .score {
        font-size: 1.4rem;
        font-weight: bold;
    }
    .match-card button {
        margin-top: 10px;
    }
</style>
