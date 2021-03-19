<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Kennel Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
					<a class="nav-link active text-white px-3" aria-current="page" href="register.php">Sign up</a>
					<a class="nav-link active text-white px-3" aria-current="page" href="login.php">Log in</a>
                    <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                </div>
            </div>
        </div>
    </nav>
<!-- navigation bar ends -->




  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
	<select name="role" id="role" value="<?php $role ?>">
		<option value="">Choose:</option>
		<option value="buyer">Buyer</option>
		<option value="seller">Seller</option>
  </select>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
	  <div class="input-group">
  	  <label>Shop name</label>
  	  <input type="text" name="shop" value="<?php echo $shop; ?>">
  	</div>	
	<div class="input-group">
  	  <label>Registration number</label>
  	  <input type="number" name="reg" value="<?php echo $reg; ?>">
  	</div>
	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
	  <div class="input-group">
  	  <label>Phone number</label>
  	  <input type="number" name="phnumber" value="<?php echo $phnumber; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit"  id="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>



  <div class="footer">
        <div class="container-fluid mt-3 px-0">
            <div class="footer-basic">
                <footer>
                    <div class="social mt-3"><a class="mt-3" href="#"><i class="icon ion-social-facebook"></i></a></div>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="home.php">Home</a></li>
                        <li class="list-inline-item"><a href="register.php">Sign up</a></li>
                        <li class="list-inline-item"><a href="login.php">Login</a></li>
                    </ul>
                    <p class="copyright">YourKennelShop © 2021</p>
                </footer>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
		
</body>
</html>
</body>
</html>