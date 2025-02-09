<?php
require_once(__DIR__ . "/../models/UserModel.php");

class LoginController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);

            $user = $this->userModel->getUserByUsername($username);

            if (!$user || !password_verify($password, $user["password"])) {
                $_SESSION["error"] = "Invalid username or password.";
                header("Location: /login");
                exit;
            }

            // Successfully login.
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role"];

            header("Location: /");
            exit;
        }
    }

    public function logout() {
        session_destroy();
        header("Location: /");
        exit;
    }
}
