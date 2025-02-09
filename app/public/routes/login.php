<?php
require_once(__DIR__ . '/../controllers/LoginController.php');

Route::add('/login', function () {
    require(__DIR__ . '/../views/pages/login.php');
});

Route::add('/login_process', function () {
    $controller = new LoginController();
    $controller->login();
}, 'post');

Route::add('/logout', function () {
    $controller = new LoginController();
    $controller->logout();
});
?>
