<?php
require_once "../db_config.php";
session_start();
if($_SESSION["user-type"]!=3)
{
    header("location:../index.php");
}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <a href="index.php" class="button-custom ">return to home page</a>    
    <?php
    $sql="";
    echo "<table class=\"table-design\">";
        if($_GET["p"]==1)
        {   
            echo "<h1 class=\"text-center\">Tables</h1>";
            if(!empty($_GET["v"]) && !empty($_GET["value"])){
            if($_GET["v"]=="delete")
            {
                $value=$_GET["value"];
                $sql="delete from city where city_id='$value'";
                $result=$conn->prepare($sql);
                try{
                    $result->execute();
                    header("location:content.php?p=1");
                }
                catch(Exception $e)
                {
                    header("location:index.php?p=1");
                }
          
                
            }
            if(!empty($_GET["v"]))
        {
        if($_GET["v"]=="insert")
        {
            
            $id=$_GET["id"];
            $name=$_GET["name"];
            $sql="insert into city values('$id','$name')";
            $result=$conn->prepare($sql);
            try{
                $result->execute();
                header("location:content.php?p=1");
            }
            catch(Exception $e)
            {
                header("location:index.php?p=1");
            }
           
        }
        if($_GET["v"]=="edit" && !empty($_GET["name"]))
        {
            
            $id=$_GET["id"];
            $name=$_GET["name"];
            $sql="update city set name='$name' where city_id='$id'";
            $result=$conn->prepare($sql);
            try{
                $result->execute();
                header("location:content.php?p=1");
            }
            catch(Exception $e)
            {
                header("location:index.php?p=1");
            }
           
        }
    }
           
        }
            $sql="select * from city";
            echo "<tr><td></td><td>id</td>
            <td>name</td></tr>";
        }
        else if($_GET["p"]==3)
        {
            echo "<h1 class=\"text-center\">Users</h1>";
            if(!empty($_GET["v"]))
            {
                if($_GET["v"]=="delete" && !empty($_GET["value"]))
                {
                    $value=$_GET["value"];
                    $sql="delete from user where user_name='$value'";
                    $result=$conn->prepare($sql);
                    try{
                        $result->execute();
                        header("location:content.php?p=3");
                    }
                    catch(Exception $e)
                    {
                        header("location:index.php?p=1");
                    }   
                }
               
            }
            if(!empty($_GET["v"])){
            if($_GET["v"]=="edit" && !empty($_GET["value"]) && !empty($_GET["password"]))
            {
                $value=$_GET["value"];
                $password=password_hash($_GET["password"],PASSWORD_BCRYPT);
             
                   $sql="update user set password='$password' ";
                   if(!empty($_GET["type"]))
                   {
                       $type=$_GET["type"];
                       $sql.=",user_type='$type' ";
                   }
                   if(!empty($_GET["city"]))
                   {
                       $city=$_GET["city"];
                       $sql.=",city_id='$city' ";
                   }
                   $sql.="where user_name='$value'";
                   $result=$conn->prepare($sql);
                   try{
                       $result->execute();
                       header("location:content.php?p=3");
                   }
                   catch(Exception $e)
                    {
                    header("location:index.php?p=1");
                    }   
            }
            if($_GET["v"]=="insert" &&  !empty($_GET["password"]) && !empty($_GET["email"]) && !empty($_GET["city"]))
            {
                $bool=filter_var($_GET["email"],FILTER_VALIDATE_EMAIL);
                if(!($bool))
                {
                    header("location:content.php?p=3");
                }
                else{
                $value=$_GET["email"];
                $password=password_hash($_GET["password"],PASSWORD_BCRYPT);
                $city=$_GET["city"];
             
                
                   if(!empty($_GET["type"]))
                   {
                       $type=$_GET["type"];
                       $sql="insert into user(user_name,password,user_type,activated,city_id) values 
                       ('$value','$password','$type',1,'$city')";
                   }
                   else{
                    $sql="insert into user(user_name,email,first_name,last_name,password,user_type,activated) values 
                    ('$value','$password',1,1,'$city')";

                   }
                 
                   $result=$conn->prepare($sql);
                   try{
                       $result->execute();
                       header("location:content.php?p=3");
                   }
                   catch(Exception $e)
                    {
                    header("location:index.php?p=1");
                    }   
            }}
        }
            
            $sql="select * from user where user_type!=3";
            echo "<tr><td></td><td>user name</td><td>password</td><td>user type</td> <td>activated</td><td>city id</td></tr>";
        }
        else if($_GET["p"]==5)
        {
            echo "<h1 class=\"text-center\">Spectacles</h1>";
            if(isset($_GET["value"]))
            {
                $value=$_GET["value"];
                $sql="update spectacle set ";
                $sql.=" where id='$value'";
                $result=$conn->prepare($sql);
                try{
                $result->execute();
                header("location:content.php?p=5");
                }
                catch(Exception $e){
                    header("location:index.php?p=1");
                }
            }
            if(!empty($_GET["v"]) && !empty($_GET["value"])){
            if($_GET["v"]=="delete")
            {
                $value=$_GET["value"];
                $sql="delete from spectacle where id='$value'";
                $result=$conn->prepare($sql);
                try{
                $result->execute();
                header("location:content.php?p=5");
                }
                catch(Exception $e)
                {
                    header("location:index.php?p=1");
                }
            }
        }
                if(!empty($_GET["name"]))
                {
                    
                    $ind = $_GET["id"];
                    $name=$_GET["name"];
                    $sql="insert into spectacle (id, name) values ('$ind', '$name')";
                    $result=$conn->prepare($sql);
                    try{
                    $result->execute();
                    header("location:content.php?p=5");
                    }
                    catch(Exception $e)
                    {
                        header("location:index.php?p=1");
                    }
                }
                
            $sql="select * from spectacle";
            echo "<tr><td></td><td>id</td>
            <td>name</td><td>description</td><td>X</td><td>Y</td><td>city</td><td>popularity</td><td>creator</td><td>picture</td></tr>";
        }
        else{
            header("location:index.php");
        }
        echo "<form method=\"get\" action=\"content.php\">";
        
        $result=$conn->prepare($sql);
        try{
        $result->execute();
        }
        catch(Exception $e)
        {
            header("location:index.php?p=1");
        }
        $result->setFetchMode(PDO::FETCH_NUM);
        while($row=$result->fetch())
        {
            echo "<tr>";
            echo "<td><input type=\"radio\" name=\"value\" value=\"$row[0]\">";
            echo "</td>";
            foreach($row as $rows)
            {
                if($rows =='')
                {
                    $rows = 'NULL';
                }
                if(strlen($rows)>255)
                {
                    echo '<td> <img src="data:image/jpeg;base64,'. base64_encode($rows) .'" /></td>';
                }
                else{
                    echo "<td>$rows</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
        if($_GET["p"]==1)
        {
            echo "<div class=\"row\">";
           
            echo "<input type=\"hidden\" name=\"p\" value=\"1\">";
            echo "<input type=\"submit\" name=\"v\" value=\"edit\" class=\"button-size col-4\">";
            echo "<input type=\"submit\" name=\"v\" value=\"delete\" class=\"button-size col-4\">";
            echo "<input type=\"submit\" name=\"v\" value=\"insert\" class=\"button-size col-4\">";
          
            if(!empty($_GET["v"]) ){
                if($_GET["v"]=="edit")
                {
                    echo "<form method=\"get\" action=\"content.php\">";
                    echo "<input type=\"number\" id=\"value\" name=\"id\" placeholder=\"id of city\" class=\"button-size col-6 needs-validation\">";
                    echo "<input type=\"text\" id=\"name\" name=\"name\" placeholder=\"name of city\" class=\"button-size col-6 needs-validation\">";
                    echo "<input type=\"hidden\" name=\"v\" value=\"edit\">";
                    echo "<input type=\"submit\" name=\"i\" class=\"button-size col-4\">";
                    echo "</form>";
                }
            }

            if(!empty($_GET["v"]) ){
                if($_GET["v"]=="insert")
                {
                    echo "<form method=\"get\" action=\"content.php\">";
                    echo "<input type=\"number\" id=\"value\" name=\"id\" placeholder=\"id of city\" class=\"button-size col-6 needs-validation\">";
                    echo "<input type=\"text\" id=\"name\" name=\"name\" placeholder=\"name of city\" class=\"button-size col-6 needs-validation\">";
                    echo "<input type=\"hidden\" name=\"v\" value=\"insert\">";
                    echo "<input type=\"submit\" name=\"i\" class=\"button-size col-4\">";
                    echo "</form>";
                }}
        }
        if($_GET["p"]==2)
        {
            echo "<div class=\"row\">";
            echo "<input type=\"date\" name=\"date\" class=\"button-size col-6\">";
            echo "<input type=\"hidden\" name=\"p\" value=\"2\">";
            echo "<input type=\"submit\" name=\"by-date\" class=\"button-size col-6\">";
            echo "<input type=\"submit\" name=\"json\" class=\"button-size col-12\" value=\"getJson\" >";
            echo "</div>";
            
            
        }
        if($_GET["p"]==3)
        {
            echo "<div class=\"row\">";
           
            echo "<input type=\"hidden\" name=\"p\" value=\"3\">";
            echo "<input type=\"submit\" name=\"v\" value=\"edit\" class=\"button-size col-4\">";
            echo "<input type=\"submit\" name=\"v\" value=\"delete\" class=\"button-size col-4\">";
            echo "<input type=\"submit\" name=\"v\" value=\"insert\" class=\"button-size col-4\">";
            if(!empty($_GET["v"]))
            {
                if($_GET["v"]=="insert")
                {
                    echo "<input type=\"hidden\" name=\"p\" value=\"3\">";
                    echo "<input type=\"hidden\" name=\"v\" value=\"insert\">";
                    echo "<input type=\"text\" name=\"email\" placeholder=\"email\" class=\"button-size col-3  needs-validation\">";
                    echo "<input type=\"password\" name=\"password\" placeholder=\"password\" class=\"button-size col-3  needs-validation\">";
                    echo "<input type=\"number\" name=\"type\" placeholder=\"type of user\" class=\"button-size col-3  needs-validation\">";
                    echo "<input type=\"number\" name=\"city\" placeholder=\"id of city\" class=\"button-size col-3  needs-validation\">";
                    
                    echo "<input type=\"submit\" name=\"i\" class=\"button-size col-12\">";
                    
                }
                if($_GET["v"]=="edit")
                {
                    echo "<input type=\"hidden\" name=\"p\" value=\"3\">";
                    echo "<input type=\"hidden\" name=\"v\" value=\"edit\">";
                    echo "<input type=\"password\" name=\"password\" placeholder=\"password\" class=\"button-size col-4  needs-validation\">";
                    echo "<input type=\"number\" name=\"type\" placeholder=\"type of user\" class=\"button-size col-4  needs-validation\">";
                    echo "<input type=\"number\" name=\"city\" placeholder=\"id of city\" class=\"button-size col-4  needs-validation\">";
                    echo "<input type=\"submit\" name=\"i\" class=\"button-size col-12\">";
                }
            }


        }
        if($_GET["p"]==5)
        {
            echo "<div class=\"row\">";
           
            echo "<input type=\"hidden\" name=\"p\" value=\"5\">";
            echo "<input type=\"submit\" name=\"v\" value=\"edit\" class=\"button-size col-4\">";
            echo "<input type=\"submit\" name=\"v\" value=\"delete\" class=\"button-size col-4\">";
            echo "<input type=\"submit\" name=\"v\" value=\"insert\" class=\"button-size col-4\">";



            if(!empty($_GET["v"]) ){
                if($_GET["v"]=="edit")
                {
                    echo "<form method=\"get\" action=\"content.php\">";
                    echo "<input type=\"date\" id=\"date\" name=\"date\" class=\"form-control needs-validation\">";
                    echo "<input type=\"submit\" name=\"i\" class=\"button-size col-4\">";
                    echo "</form>";
                }
            }

            if(!empty($_GET["v"]) ){
                if($_GET["v"]=="insert")
                {
                    echo "<form method=\"get\" action=\"content.php\">";
                    echo "<input type=\"hidden\" name=\"p\" value=\"5\">";
                    echo "<input type=\"number\" id=\"id\" name=\"id\" placeholder=\"id\" class=\"form-control needs-validation\">";
                    echo "<input type=\"text\" id=\"name\" name=\"name\" placeholder=\"name\" class=\"form-control needs-validation\">";
                    
                    echo "<input type=\"submit\" name=\"i\" class=\"button-size col-4\">";
                    echo "</form>";
                }



            echo "</div>";
            echo "</form>";
        }
            
        }
        echo "</form>";
    ?>
</body>
</html>