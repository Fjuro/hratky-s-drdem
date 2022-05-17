<?php
session_start();

if(isset($_POST['logout_button']))
{
  session_destroy();
  unset($_SESSION['username']);
  header('Location: login.php');
}
?>