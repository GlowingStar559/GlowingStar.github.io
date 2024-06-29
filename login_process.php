<?php 
require_once("config.php");

if(isset($_POST['loginbtns'])){

$login = $_POST['username'];
$password = $_POST['password'];
$query = "select * from users where username='$login'";

$res = mysqli_query($dbc,$query);

$numRows = mysqli_num_rows($res);
if($numRows  == 1){
        $row = mysqli_fetch_assoc($res);
        if(password_verify($password,$row['password'])){
           $_SESSION["login_sess"]="1"; 
             $_SESSION["login_username"]= $row['username'];
  header("location:dashboard.php");
        }
        else{ 
     header("location:login.php?loginerror=".$login);
        }
    }
    else{
  header("location:login.php?loginerror=".$login);
    }
}
?>