<?php
    
    require_once "db_config.php";
    require_once "action.php";
    $s="y24oyRYW4252kRGa462y24B";
    if($s!=SECRET){
        header("location:register.php?p=4");
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        header("location:register.php?p=3");
    }
    $user=$_POST["email"];
    $sql="select * from user where user_name='$user'";
    $result=$conn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0)
    {header("location:register.php?p=6");}
    $password=PASSWORD_HASH($_POST["pword"],PASSWORD_BCRYPT);
    
    $token=getData();
    

    $sql="insert into `user`(user_name,password,user_type,activated,token,expiration_date)  values('$user','$password',1,0,'$token',now()+INTERVAL 1 DAY)";
    $result=$conn->prepare($sql);
    $result->execute();
    if(requestEmail($user,$token,1))
    header("location:register.php?p=5");
    else{
        
    }
?>
