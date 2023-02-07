<?php
session_start();
require_once "db_config.php";
$user=$_POST["email"];
if(!isset($_POST["email"]) or !isset($_POST["password"])){
    header("location:sign.php?p=1");

}
else{

    $sql="select password,user_type,city_id from user where user_name='$user' and activated=1";
    $result=$conn->prepare($sql);
    $result->execute();
    $result->setFetchMode(PDO::FETCH_NUM);
    $row=$result->fetch();
    if($row>0)
    {
      
        $password=$_POST["password"];
        
        if(password_verify($password,$row[0]))
        {
            if(isset($_POST["log"])){
                    setcookie("passC",$row[0],time()+ 60*60*24);
                    setcookie("typeC",$row[1],time()+ 60*60*24);
                    setcookie("cityC",$row[2],time()+ 60*60*24);
                    setcookie("userC",$user,time()+ 60*60*24);

            }
            $_SESSION["user-name"]=$user;
            $_SESSION["password"]=$row[0];
            $_SESSION["user-type"]=$row[1];
            $_SESSION["city"]=$row[2];
            header("location:index.php");
        }
        else{
            header("location:sign.php?p=3");
        }
    }
    else{
        header("location:sign.php?p=2");
    }
}
?>