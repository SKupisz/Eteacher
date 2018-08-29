<?php
session_start();
if(!isset($_SESSION['signed']))
{
  header("Location: index.php");
  exit();
}
else {

}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>E-teacher - user desktop</title>
    <link rel = "stylesheet" type="text/css" href = "source/userDesk.css"/>
  </head>
  <body onload = "onLoadUserDesk();">
    <?php require_once "source/bar.php"; ?>
    <section id = "left-triangle">
    </section>
    <section id = "right-triangle">
    </section>
    <section id = "content">
      <div id = "signed-in-div">
        Succesfully signed in
      </div>
      
    </section>
  </body>
  <script src = "source/jquery-3-2-1.js"></script>
  <script src = "source/main.js"></script>
</html>
