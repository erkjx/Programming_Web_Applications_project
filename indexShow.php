<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show your cars</title>
</head>

<body>
    <div>
        <a class="button-35" role="button" href="indexMenu.php">Home</a>
    </div>
</body>
<img src="img/show.jpg" alt="Animacja" id="background-video">

</html>

<?php
require_once 'Controllers/CarController.php';
$carController = new CarController();
$carController->getCars();
?>