<?php
require_once "db_config.php";
require_once "action.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="text-center">
    <main class="container mt-2 form-signin">
    <h1 class="h3 mt-5 mb-5 fw-normal  margin-vertical">Forgot Password</h1>
<div class="form-floating p-2">
<?php 
if(isset($_GET["token"])){
    echo "<form action=\"passcheck.php\" class=\"margin-side\" method=\"get\">";  
    echo "<label for=\"floatingInput\">Password</label>";
    echo "<input type=\"password\" name=\"password\" class=\"form-control mt-2\" id=\"floatingInput\" placeholder=\"pword\" required>";
    echo "<input type=\"password\" name=\"password2\" class=\"form-control mt-2\" id=\"floatingInput\" placeholder=\"verify pword\" required>";
    echo "<input type=\"hidden\" name=\"p\" value=\"5\">";
    echo "<input type=\"hidden\" name=\"token\" value=".$_GET['token'].">";
    echo "<button type=\"submit\"  class=\"btn btn-primary mt-2\" >Reset password</button>";
    if(isset($_GET["p"]))
{
    
    echo "<div class=\"alert alert-danger\" role=\"alert\">";
    if($_GET["p"]==7)
    {
        echo "Passwords don't match up";
    }
    if($_GET["p"]==9)
    {
        echo "Token expired";
    }
    echo "</div>";
}
    
}
else{
if(!isset($_GET["p"]) )
{
echo "<form action=\"password.php\" class=\"margin-side\" method=\"get\">";  
echo "<label for=\"floatingInput\">Email address</label>";
echo "<input type=\"email\" name=\"email\" class=\"form-control mt-2\" id=\"floatingInput\" placeholder=\"name@example.com\" required>";
echo "<input type=\"hidden\" name=\"p\" value=\"4\">";
echo "<button type=\"submit\"  class=\"btn btn-primary mt-2\" >Reset password</button>";
if(isset($_GET["c"]))
{
    echo "<div class=\"alert alert-danger\" role=\"alert\">Email not found</div>";
}
}
else{
 if($_GET["p"]==4){
    $email=$_GET["email"];
   $sql="select * from user where email='$email'";
  $result=$conn->prepare($sql);
    $result->execute();

   if($result->rowCount()==0){
       header("Location:password.php?c=1");
   }
   else{
       $token=getData();
       $user=substr($email,0,strpos($email,"@"));
       $sql="update user set token='$token',expiration_date= now()+INTERVAL 1 DAY,activated=0 where email='$email'";
       $result=$conn->prepare($sql);
       $result->execute();
       requestEmail($user,$email,$token,2);
       header("location:index.php?p=2");
   }
}
}
}

?>
</div>
</main>
</body>
</html>