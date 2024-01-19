<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add your car</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/x-icon" href="img/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <div>
        <a class="button-35" role="button" href="indexMenu.php">Home</a>
    </div>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="img/favicon.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="?action=add" method="post">
                    <span class="login100-form-title">
                        Enter your car details
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="brand" required placeholder="Brand">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="model" required placeholder="Model">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="number" name="productionYear" min="1886" max="2024" required placeholder="Production Year">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="add">
                            Add
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <img src="img/add.jpg" alt="Animacja" id="background-video">
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <?php
    require_once 'Data/DataBase.php';
    require_once 'Controllers/CarController.php';

    $db = new Database("localhost", "root", "", "projekt");
    $carController = new CarController();

    $action = isset($_GET['action']) ? $_GET['action'] : '';

    if ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $carController->saveToDatabase($_POST['brand'], $_POST['model'], $_POST['productionYear']);
    }
    ?>
</body>

</html>