<?php
class AuthController
{
    protected $user;

    function register($name, $surname, $email, $pass)
    {
        $args = [
            'name' => FILTER_SANITIZE_STRING,
            'surname' => FILTER_SANITIZE_STRING,
            'email' => FILTER_VALIDATE_EMAIL,
            'pass' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ];

        $dane = filter_input_array(INPUT_POST, $args);

        $errors = "";
        foreach ($dane as $key => $value) {
            if ($value === false || $value === null) {
                $errors .= "$key, ";
            }
        }

        if ($errors === "") {
            echo '<script>alert("Register successful");window.location.href = "indexLogin.php";</script>';
            include_once "Models/User.php";
            $this->user = new User($dane['name'], $dane['surname'], $dane['email'], $dane['pass']);
            include_once "Data/DataBase.php";
            $bd = new Database("localhost", "root", "", "projekt");
            $this->user->saveToDatabase($bd);
        } else {
            echo '<script>alert("Incorrect data");</script>';
            $this->user = NULL;
        }

        return $this->user;
    }
    function login($email, $pass, $db)
    {
        $args = [
            'email' => FILTER_VALIDATE_EMAIL,
            'pass' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ];
        $dane = filter_input_array(INPUT_POST, $args);

        $email = $dane["email"];
        $pass = $dane["pass"];
        $userId = $db->selectUser($email, $pass, "user");
        if ($userId >= 0) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $sql = "DELETE FROM logged_in_users WHERE userId = '$userId'";
            $db->delete($sql);

            $date = date("Y-m-d H:i:s");
            $sessionId = session_id();
            $sql = "INSERT INTO logged_in_users (userId,lastUpdate,sessionId) VALUES ('$userId','$date','$sessionId')";
            $db->insert($sql);
            echo '<script>window.location.href = "indexMenu.php";</script>';
        }
        return $userId;
    }
    function logout()
    {
        require_once "Controllers/UserController.php";
        $userController = new UserController();
        $userId = $userController->getUserById();
        $sql = "DELETE FROM logged_in_users WHERE userId = '$userId'";
        include_once "Data/DataBase.php";
        $db = new Database("localhost", "root", "", "projekt");
        $db->delete($sql);
        echo '<script>window.location.href = "indexLogin.php";</script>';
    }
}
?>