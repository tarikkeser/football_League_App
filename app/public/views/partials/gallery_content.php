<?php require(__DIR__ . "/../partials/header.php"); ?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Image Gallery</h1>

    <?php if ($isLoggedIn): ?>
        <!-- buttons  -->
        <div id="galleryActions" class="mb-3 text-center">
            <?php if ($isLoggedIn): ?>
                <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addImageModal">Add Image</button>
                <button class="btn btn-danger" id="deleteImageBtn">Delete Selected</button>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div id="galleryList" class="row">
        <!-- Images will be dynamically loaded here -->
    </div>
</div>

<!-- Add Image Modal -->
<div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addImageModalLabel">Add New Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addImageForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="image" class="form-label">Choose Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-success">Add Image</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS & jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    const isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;
</script>

<!-- Custom JS -->
<script src="assets/js/gallery.js"></script>

</body>
</html>
