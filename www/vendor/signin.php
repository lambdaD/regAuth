<?php

  session_start();
  require_once('connect.php');

  $login = $_POST['login'];
  $password = md5($_POST['password']);

  $checkUser = mysqli_query($connect, "SELECT * FROM `users` WHERE `login`= '$login' AND `password`= '$password'");

  
  if (mysqli_num_rows($checkUser) > 0) {
    $user = mysqli_fetch_assoc($checkUser);

    $_SESSION['user']  = array(
      "id" => $user['id'],
      "first_name" => $user['first_name'],
      "second_name" => $user['second_name'],
      "email" => $user['email'],
      "login" => $user['login'],
      "avatar" => $user['avatar']
  );

    header('Location: ../profile.php');
  }
  else {
    $_SESSION[message] = 'Неверный логин или пароль.';
    header('Location: ../index.php');
  }
  
?>

