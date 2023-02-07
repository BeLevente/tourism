<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/placeholder.css">

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="login.php" method="post">
  
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label>
      <div class="invalid-feedback">
        invalid email
</div>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
      <div class="invalid-feedback">
        invalid password
</div>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="log" value="remember-me"> Remember me
      </label>
    </div>
    <a href="password.php" >Forgot password?</a>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
    <?php
    if(isset($_GET["p"]))
    {
    echo "<div class=\"alert alert-danger\" role=\"alert\">";
    if($_GET["p"]==2)
    {
      echo "Email does not yet have an active account";

    }
    else if($_GET["p"]==3){
      echo "Password was not correct";
    }
    echo "</div>";
    }
    ?>
    <p class="mt-5 mb-3 text-muted">&copy; 2022-2023</p>
  </form>
</main>

<script src="js/form-validation.js"></script>
    
  </body>
</html>
