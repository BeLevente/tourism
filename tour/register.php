<?php
require_once "db_config.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <meta name="robots" content="index,nofollow">
    <title>Register</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/placeholder.css">
    
    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      
      <h2>Sign-up</h2>
      <p class="lead">Registering...</p>
    </div>

    
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">About you</h4>
        <form class="needs-validation" action="registry.php" method="post" novalidate>
          <div class="row g-3">
            <div class="col-12">
            <label for="email" class="form-label">Email </label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Your email is required
              </div>
            </div>

            <div class="col-12">
              <label for="password" class="form-label">Password</label>
              <div class="input-group has-validation">
                
                <input type="password" class="form-control" id="password" name="pword" placeholder="password" required>
              <div class="invalid-feedback">
                  Your password is required.
                </div>
              </div>
            </div>
          </div>


          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Sign-up</button>
        </form>
      </div>
    </div>
  </main>
  <?php
  if(isset($_GET["p"]))
  {
    echo "<div class=\"alert alert-primary\">";
    if($_GET["p"]==3)
    {
        echo "The e-mail is invalid";
    }
    if($_GET["p"]==4)
    {
        echo "The server is invalid";
    }
    if($_GET["p"]==5)
    {
        echo "We've sent you an e-mail to activate your account";
    }
    if($_GET["p"]==6)
    {
        echo "Email is already in the database";
    }
    if($_GET["p"]==7)
    {
        echo "Email server is not working";
    }
    echo "</div>";
  }
  ?>

</div>


    <script src="js/bootstrap.bundle.min.js"></script>

      <script src="js/form-validation.js"></script>
  </body>
</html>
