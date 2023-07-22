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
    $path = 'uploads/'.time().$_FILES['avatar']['name'];

    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../'.$path)) {
      die('Ошибка при загрузке изображения');
      // $_SESSION[message] = 'Ошибка при загрузке изображения';
      // header('Location: ../reg.php');
    }

    $password = md5($password);

    mysqli_query($connect, "INSERT INTO `users`(`first_name`, `second_name`, `email`, `login`, `password`, `avatar`) VALUES ('$firstName','$secondName','$email','$login','$password', '$path')");

    $_SESSION[message] = 'Регистрация прошла успешно.';
    header('Location: ../index.php');
    
  }
  else{
    $_SESSION[message] = 'Пароли не совпадают';
    header('Location: ../reg.php');
  }

  

?>