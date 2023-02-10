<?php
require_once "db_config.php";
if(isset($_GET["p"]) )
{
    if ($_GET["p"]==5)
    {
        $token=$_GET["token"];
        $pword1=$_GET["password"];
        $pword2=$_GET["password2"];
        if($pword1==$pword2)
        {
            $password=password_hash($pword1,PASSWORD_DEFAULT);
            $sql="update user set token=null,expiration_date=null,password='$password',activated=1 where token='$token'  and expiration_date>now()";
            
            $result=$conn->prepare($sql);
            $result->execute();
            
            if($result->rowCount()>0){
                header("Location:index.php?p=3");
            }
            else{
                header("Location:password.php?token=".$token."&p=9");
            }
        }
        else{
            header("Location:password.php?token=".$token."&p=7");
        }
        
    }
}
      ?>