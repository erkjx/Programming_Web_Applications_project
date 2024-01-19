<?php
class UserController {
    private $database;
    
    public function getUserById() {
        $sessionId = $_COOKIE["PHPSESSID"];
        $sql = "SELECT userId FROM logged_in_users WHERE sessionId = '$sessionId'";
        include_once "Data/DataBase.php";
        $db = new Database("localhost", "root", "", "projekt");
        $pola = ['userId'];
        $userId = $db->select($sql, $pola);
        $userId = (int) preg_replace('/[^0-9]/', '', $userId);
        return $userId;
    }

}
?>
