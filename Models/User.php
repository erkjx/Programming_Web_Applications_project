<?php
class User {
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    

    public function __construct($name, $surname, $email, $password) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    public function saveToDatabase($db) {
        $query = "INSERT INTO user (name, surname, email, password) VALUES (
            '{$this->name}',
            '{$this->surname}',
            '{$this->email}',
            '{$this->password}'
        )";
        $db->insert($query);
    }
}
?>