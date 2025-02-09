<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

<div class="card p-5 shadow-lg" style="width: 450px;">
    <h2 class="text-center mb-4">Login</h2>

    <?php if (isset($_SESSION["error"])): ?>
        <div class="alert alert-danger">
            <?php 
                echo $_SESSION["error"]; 
                unset($_SESSION["error"]);
            ?>
        </div>
    <?php endif; ?>

    <form action="/login_process" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control form-control-lg" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control form-control-lg" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
