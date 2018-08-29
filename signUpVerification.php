<?php
session_start();
if(isset($_SESSION['signed']))
{
  header("Location: ../index.php");
  exit();
}
if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['passwordRepeat']))
{
  header("Location: ../signUp.php");
  exit();
}
$user = $_POST['username'];
$pass = $_POST['password'];
$passr = $_POST['passwordRepeat'];
$user = htmlentities($user);
$can = 0;
if(strlen($pass) < 8 || strlen($pass) > 20 || $pass != $passr)
{
  $_SESSION['signUpPasswordError'] = "Password must contain from 8 to 20 signs";
  $can = 1;
}
$pass = password_hash($pass,PASSWORD_DEFAULT);
require_once "connect.php";
try {
  $connect = new mysqli($host,$db_user,$db_password,$db_name);
  if($connect->connect_errno != 0)
  {
    throw new Exception($connect->connect_error);
  }
  else {
    $query = $connect->query("SELECT * FROM users WHERE username = '$user'");
    if(!$query) throw new Exception($connect->error);
    if($query->num_rows > 0)
    {
      $_SESSION['signUpUsernameError'] = "This nickname has already been taken";
      $can = 1;
    }
    if($can == 1)
    {
      header("Location: ../signUp.php");
      exit();
    }
    else {
      $insert = $connect->query("INSERT INTO users VALUES(NULL,'$user','$pass')");
      if(!$insert) throw new Exception($connect->error);
      $_SESSION['signed'] = $user;
      header("Location: ../userDesk.php");
      exit();
    }
  }
} catch (Exception $e) {
  unset($_SESSION['signUpPasswordError']);
  unset($_SESSION['signUpUsernameError']);
  $_SESSION['signUpConnectError'] = "There is no connection. Try later";
  header("Location: ../signUp.php");
}

?>
