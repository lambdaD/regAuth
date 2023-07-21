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
      $_SESSION[message] = 'Ошибка при загрузке изображения';
      header('Location: ../reg.php');
    }
    
  }
  else{
    $_SESSION[message] = 'Пароли не совпадают';
    header('Location: ../reg.php');
  }

  

?>