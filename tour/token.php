<?php
require_once "db_config.php";
$token=$_GET["p"];

$sql ="update user SET activated=1, token=null,expiration_date=null where token='$token' and expiration_date>now()";
$result=$conn->prepare($sql);
$result->execute();
if($result->rowCount()>0){
header("location:index.php?p=3");
}
else{
    header("location:index.php?p=4");
}
?>