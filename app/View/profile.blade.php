<?php 
session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Kennel Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="css/profile.css">
</head>
<body>

<!-- navigation bar starts -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.php">
                <img class="img-fluid sitelogo" src="images/logo.png" alt="" width="200" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-white px-3" aria-current="page" href="home.php">Home</a>
					<div class="btn-group">
  						<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
   							<?php echo "Welcome ". $_SESSION['username'] ?>
  						</button>
  						<ul class="dropdown-menu">
    						<li><a class="dropdown-item" href="#">Profile</a></li>
    						<li><hr class="dropdown-divider"></li>
    						<li><a class="dropdown-item" href="logout.php">Log out</a></li>
  						</ul>
					</div>
                    <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                </div>
            </div>
        </div>
    </nav>
<!-- navigation bar ends -->


<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="images/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-800"><?php echo $_SESSION['username']; ?></h6>
                                <p><?php echo $_SESSION['role']; ?></p> 
                                    <!-- <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i> -->
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><?php echo $_SESSION['email']; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">98979989898</h6>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- <div class="footer">
        <div class="container-fluid mt-3 px-0">
            <div class="footer-basic">
                <footer id="">
                    <div class="social mt-3"><a class="mt-3" href="#"><i class="icon ion-social-facebook"></i></a></div>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="home.php">Home</a></li>
                    </ul>
                    <p class="copyright">YourKennelShop © 2021</p>
                </footer>
            </div>
        </div>
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
		
</body>
</html>