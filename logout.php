<?php
session_start();
unset($_SESSION['signed']);
header("Location: ../index.php");
exit();
?>
