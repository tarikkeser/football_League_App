<?php
// who logged in ?
$isLoggedIn = isset($_SESSION["username"]);
$username = $isLoggedIn ? htmlspecialchars($_SESSION["username"]) : null;
// is it admin ?
$isAdmin = isset($_SESSION["role"]) && $_SESSION["role"] === "admin";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football League</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css?v=1">
</head>
<body>

<?php require(__DIR__ . "/navbar.php"); ?> <!-- Navbar -->
