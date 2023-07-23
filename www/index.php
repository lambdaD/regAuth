<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="assets/css/main.css">
  <title>Авторизация и регистрация</title>
</head>
<body>
  <form action="vendor/signin.php" method="post">
    <label for="">Логин</label>
    <input name="login" type="text" placeholder="Введите свой логин">
    <label for="">Пароль</label>
    <input name="password" type="password" placeholder="Введите свой пароль">
    <button type="submit">Войти</button>
    <p>
      <span>У вас нет аккаунта? <a href="reg.php">Зарегистрируйтесь.</a></span>
    </p>
    <?php
    if ($_SESSION[message]) {
      echo('<p class="msg">'.$_SESSION[message].'</p>');
    }
    unset($_SESSION[message])
    ?>
  </form>
  
</body>
</html>