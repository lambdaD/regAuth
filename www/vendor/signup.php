<?php
  session_start();
  require_once('connect.php');
  $firstName = $_POST['firstName'];
  $secondName = $_POST['secondName'];
  $login = $_POST['login'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  if ($password === $confirmPassword){

  }
  else{
    $_SESSION[message] = 'Пароли не совпадают';
    header('Location: ../reg.php');
  }

?>