<?php
require_once(__DIR__ . "/BaseModel.php");

class UserModel extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
