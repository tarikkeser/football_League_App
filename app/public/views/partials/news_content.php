<?php require(__DIR__ . "/../partials/header.php"); ?>
<div class="container mt-5">
    <h1 class="mb-4 text-center">Latest News</h1>
    
    <?php if ($isLoggedIn): ?>
    <div id="newsActions" class="mb-3 text-center">
        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addNewsModal">Add News</button>
        <button class="btn btn-danger" id="deleteNewsBtn">Delete News</button>
    </div>
    <?php endif; ?>
    
    <div id="newsList" class="row">
        <!-- News will be dynamically loaded here -->
    </div>
</div>

<!-- News Adding Modal -->
<div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="addNewsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewsModalLabel">Add News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addNewsForm">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Add News</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Custom JS & CSS -->
<link rel="stylesheet" href="assets/css/news.css">
<script src="assets/js/news.js"></script>

</body>
</html>