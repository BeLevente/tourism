<?php
session_start();
if($_SESSION["user-type"]!=3)
{
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="margin-side">
    <h1>Administrator page</h1>
    <div class="container">
<div class="row">
    <a href="content.php?p=1" class="button-custom">Cities</a>
    <a href="content.php?p=5" class="button-custom">Spectacles</a>
    <a href="content.php?p=3" class="button-custom">Users</a>
    <a href="../index.php" class="button-custom">Back to the regular website</a>
    <?php
    if(!empty($_GET["p"]))
    {
        if($_GET["p"]==1)
        {
            echo "<div class=\"alert alert-danger\" role=\"alert\">An error has occured</div>";
        }
    }
    ?>
</div>
    </div>
</body>
</html>