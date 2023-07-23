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
  <form>
  <img src="<?= $_SESSION['user']['avatar'];?>" alt="1"/>
  <h2><?= $_SESSION['user']['first_name'].' '.$_SESSION['user']['second_name'];?></h2>
  <a href="#"><?= $_SESSION['user']['email'];?></a>
  <a href="vendor/logout.php" class="logout">Выход</a>
  </form>
  
</body>
</html>