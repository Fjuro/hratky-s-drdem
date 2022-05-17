<?php
include('database.php');

if(!$_SESSION['username'])
{
  header("Location: login.php");
}
?>