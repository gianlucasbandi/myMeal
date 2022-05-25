<?php
if (!isset($_SESSION['user_email'])) {
    header("location: ..");
  }
    session_start();
    session_destroy();
    header("location: ../index.php");
    exit();
?>