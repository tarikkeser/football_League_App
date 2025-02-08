<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest News</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

</head>
<body>

<div class="container-fluid mt-5 px-5">
    <h1 class="text-start mb-4">Latest News</h1>
    <?php foreach ($news as $article): ?>
        <div class="row mb-4">
            <div class="col-lg-8">
                <div class="card shadow-sm news-card">
                    <div class="row g-0 w-100">
                        <!-- Resim alanı -->
                        <div class="col-auto" style="max-width: 300px;">
                            <?php 
                                $image = !empty($article['image']) ? htmlspecialchars($article['image']) : "https://via.placeholder.com/400x250?text=No+Image";
                            ?>
                            <img src="<?php echo $image; ?>" class="news-image" alt="News Image">
                        </div>
                        <!-- Metin alanı -->
                        <div class="col news-content">
                            <h5 class="card-title"><?php echo htmlspecialchars($article['title']); ?></h5>
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>
