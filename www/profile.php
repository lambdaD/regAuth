<?php
session_start();
if (!$_SESSION[user]) {
  header("Location: index.php");
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
  <form method="POST" action="vendor/create_post.php">
  <img src="<?= $_SESSION['user']['avatar'];?>" alt="1"/>
  <h2><?= $_SESSION['user']['first_name'].' '.$_SESSION['user']['second_name'];?></h2>
  <a href="#"><?= $_SESSION['user']['email'];?></a>
  <textarea name="content" rows="4" cols="50" placeholder="Введите вашу запись"></textarea>
  <button type="submit">Создать запись</button>
  <a href="vendor/logout.php" class="logout">Выход</a>
  </form>
  <div class="posts">
    <h3>Записи пользователя:</h3>

    <?php
    require_once('vendor/connect.php');
    $user_id = $_SESSION["user"]["id"];
    
    $post = mysqli_query($connect, "SELECT * FROM `posts` WHERE `user_id` = '$user_id' ORDER BY `created_at` DESC");
    while($fetchPost = mysqli_fetch_assoc($post)){
      
      echo "<p>" . $fetchPost['content'] . "</p>";
      echo "<p>Дата создания: " . $fetchPost['created_at'] . "</p>";
   }
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$user_id]);
    // $posts = $stmt->fetchAll();

    // // Выводим все записи пользователя
    // foreach ($posts as $post) {
    //   echo "<p>" . $post["content"] . "</p>";
    //   echo "<p>Дата создания: " . $post["created_at"] . "</p>";
    // }
    ?>

  </div>
</body>
</html>