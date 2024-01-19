<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Menu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="icon" type="image/x-icon" href="img/favicon.png" />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/styleindexMenu.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>

    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
        <a href="indexMenu.php" class="navbar-brand d-flex align-items-center">
            <h1 class="m-0"><img class="img-fluid me-3" alt="">GaragEK</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto bg-light pe-4 py-3 py-lg-0">
                <form action="?action=logout" method="post">
                    <button class="nav-item nav-link active">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 style="color: white;" class="display-6 mb-5">What you want to do ?</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                            <div class="team-social">
                                <h4 style="text-align: center; color: white;">Add your car by completing a short
                                    form</h4>
                                <form action="indexAdd.php">
                                    <button class="button-65">ADD</button>
                                </form>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5>Add car</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                            <div class="team-social">
                                <h4 style="text-align: center; color: white;">See all your cars</h4>
                                <form action="indexShow.php">
                                    <button class="button-65">SHOW</button>
                                </form>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5>Show car</h5>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/team-3.jpg" alt="">
                            <div class="team-social">
                                <h4 style="text-align: center; color: white;">Update the information on one of your
                                    cars</h4>
                                <form action="indexUpdate.php">
                                    <button class="button-65">UPDATE</button>
                                </form>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5>Update car</h5>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/team-4.jpg" alt="">
                            <div class="team-social">
                                <h4 style="text-align: center; color: white;">Remove your car from your garage</h4>
                                <form action="indexDelete.php">
                                    <button class="button-65">DELETE</button>
                                </form>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5>Delete car</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <img src="img/animation_menu.gif" alt="Animacja" id="background-video">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>

    <script src="js/mainMenu.js"></script>
</body>
<?php
	require_once 'Controllers/AuthController.php';

	$authController = new AuthController();

	$action = isset($_GET['action']) ? $_GET['action'] : '';

	if ($action === 'logout' && $_SERVER['REQUEST_METHOD'] === 'POST') {
		$authController->logout();
	}
	?>
</html>