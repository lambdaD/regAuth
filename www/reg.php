<?php
  session_start();
  if ($_SESSION[user]) {
    header("Location: profile.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="assets/css/main.css">
  <title>Авторизация и регистрация</title>
</head>
<body>
  <form action="vendor/signup.php" method="post" enctype='multipart/form-data'>
    <label for="firstName">Имя</label>
    <input name="firstName" type="text" placeholder="Введите своё имя">
    <label for="secondName">Фамилия</label>
    <input name="secondName" type="text" placeholder="Введите свою фамилию">
    <label for="login">Логин</label>
    <input name="login" type="text" placeholder="Введите свой логин">
    <label for="email">Email</label>
    <input name="email" type="email" placeholder="Введите свой Email">
    <label for="password">Пароль</label>
    <input name="password" type="password" placeholder="Введите свой пароль">
    <label for="confirmPassword">Повторите пароль</label>
    <input name="confirmPassword" type="password" placeholder="Повторите пароль">
    <label for="avatar">Изображение профиля</label>
    <input name="avatar" type="file">
    <button type="submit">Зарегистрироваться</button>
    <p>
      <span>Уже есть аккаунт? <a href="index.php">Войдите.</a></span>
    </p>
    
<?
  if($_SESSION[message]){
    echo('<p class="msg">'.$_SESSION[message].'</p>');
  }
        unset($_SESSION[message]);
      
?>
    
  </form>

</body>
</html>