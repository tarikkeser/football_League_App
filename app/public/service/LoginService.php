<?php
require_once(__DIR__ . "/../models/UserModel.php");

class LoginService
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login($username, $password)
    {
        $user = $this->userModel->getUserByUsername($username);

        if (!$user || !password_verify($password, $user["password"])) {
            // throw an exception and catch it with try-catch in LoginController.
            throw new Exception("Invalid username or password.");
        }
        // return the user.
        return $user;
    }
}
