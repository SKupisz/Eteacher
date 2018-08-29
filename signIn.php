<?php
session_start();
if(isset($_SESSION['signed']))
{
  header("Location: userDesk.php");
  exit();
}
?>
<html>
<head>
  <title>Eteacher - sign in</title>
  <meta charset="utf-8"/>
<meta name="viewport" content="width=device-content, inital-size=1.0"/>
<link rel="stylesheet" type="text/css" href = "source/main.css"/>
<link rel="stylesheet" type="text/css" href = "source/signInStyle.css"/>
</head>
<body onload = "onLoadWebSite();">
  <section id = "part-one-wrapper">
    <section id = "header">
      <label id = "header-teacher-wrapper">Sign-in</label>
    </section>
</section>
<section id = "triangle"></section>
<main id = "content">
  <section id = "singining">
    <form method="post" action="source/signInVerification.php" id = "sign-in-form">
      <section id = "inputs-wrapper">
        <?php if(isset($_SESSION['signInError']))
        {
          echo $_SESSION['signInError']."<br>";
          unset($_SESSION['signInError']);
        }?>
      Username » <input type="text" name = "username" id = "usernameInput"/><br>
      Password » <input type="password" name = "password" id = "passwordInput"/><br>

    </section>
      <input type="submit" value = "Sign in" id = "formSubmit"/>
    </form>
  </section>
</main>
</body>
<script src = "source/jquery-3-2-1.js"></script>
<script src = "source/main.js"></script>
</html>
