<?php
require_once(__DIR__ . "/../../service/LoginService.php");


class LoginController
{
    private $loginService;

    public function __construct()
    {
        $this->loginService = new LoginService;
    }
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);

            try{
                $user = $this->loginService->login($username, $password);
            
            // add information to the session.
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role"];

            header("Location: /");
            exit;
            }
            catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                header("Location: /login");
                exit;
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
        exit;
    }
}
