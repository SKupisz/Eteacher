<?php
session_start();
if(isset($_SESSION['signed']))
{
  header("Location: ../index.php");
  exit();
}
if(!isset($_POST['username']) || !isset($_POST['password']))
{
  header("Location: ../signIn.php");
  exit();
}
$username = $_POST['username'];
$pass = $_POST['password'];
$username = htmlentities($username);
require_once "connect.php";
try {
  $connect = new mysqli($host,$db_user,$db_password,$db_name);
  if($connect->connect_errno != 0)
  {
    throw new Exception($polaczenie->connect_error);
  }
  else {
    $query = $connect->query("SELECT * FROM users WHERE username = '$username'");
    if(!$query)
    {
      throw new Exception($query->error);
    }
    if($query->num_rows == 0){
      $_SESSION['signInError'] = "Incorrect username or password";
      header("Location: ../signIn.php");
      exit();
    }
    else {
      $row = $query->fetch_assoc();
      if(password_verify($pass,$row['pass']))
      {
        $_SESSION['signed'] = $username;
        header("Location: ../userDesk.php");
        exit();
      }
      else {
        $_SESSION['signInError'] = "Incorrect username or password";
        header("Location: ../signIn.php");
        exit();
      }
    }
  }
} catch (Exception $e) {
  $_SESSION['signInError'] = "There is no connection. Try later";
  header("Location: ../signIn.php");
  exit();
}

?>
