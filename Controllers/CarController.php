<?php
require_once 'Models/Car.php';
require_once 'Data/DataBase.php';

class CarController
{
    public function saveToDatabase($brand, $model, $productionYear)
    {
        $args = [
            'brand' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'model' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'productionYear' => FILTER_SANITIZE_NUMBER_INT
        ];
        $dane = filter_input_array(INPUT_POST, $args);

        $brand = $dane["brand"];
        $model = $dane["model"];
        $productionYear = $dane["productionYear"];

        require_once "Controllers/UserController.php";
        $userController = new UserController();
        $userId = $userController->getUserById();

        if ($userId >= 0) {
            $sql = "INSERT INTO car (brand, model, productionYear, userId) VALUES ('$brand','$model','$productionYear','$userId')";
            include_once "Data/DataBase.php";
            $db = new Database("localhost", "root", "", "projekt");
            $db->insert($sql);
        }
    }

    public function getCars()
    {
        $mysqli = new mysqli("localhost", "root", "", "projekt");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        require_once "Controllers/UserController.php";
        $userController = new UserController();
        $userId = $userController->getUserById();

        $query = "SELECT id, brand, model, productionYear FROM car WHERE userId = '$userId'";

        $stmt = $mysqli->prepare($query);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table style='background-color:#b3b3b3;
                                color:white; 
                                justify-content: center;
                                align-items: center;
                                border-collapse: collapse;
                                width: 100%;' 
                                border='1'
                    <tr>
                        <th>Lp.</th>
                        <th>Id</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Production Year</th>
                    </tr>";

            $lp = 1;

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$lp}</td>
                        <td>{$row['id']}</td>
                        <td>{$row['brand']}</td>
                        <td>{$row['model']}</td>
                        <td>{$row['productionYear']}</td>
                      </tr>";

                $lp++;
            }

            echo "</table>";
        } else {
            echo '<script>alert("You do not have any cars");</script>';
        }

        $stmt->close();
        $mysqli->close();
    }

    public function updateCar($id, $brand, $model, $productionYear)
    {
        require_once "Controllers/UserController.php";
        $userController = new UserController();
        $userId = $userController->getUserById();
        $sql = "UPDATE Car SET id='$id', brand = '$brand', model = '$model', productionYear = '$productionYear' WHERE id = $id and userId='$userId'";
        $db = new Database("localhost", "root", "", "projekt");
        $db->update($sql);
        echo '<script>window.location.href = "indexUpdate.php";</script>';
    }

    public function deleteCar($idCar)
    {
        require_once "Controllers/UserController.php";
        $userController = new UserController();
        $userId = $userController->getUserById();
        $sql = "DELETE FROM Car WHERE id = '$idCar'and userId='$userId'";
        include_once "Data/DataBase.php";
        $db = new Database("localhost", "root", "", "projekt");
        $db->delete($sql);
        echo '<script>window.location.href = "indexDelete.php";</script>';
    }

}
?>