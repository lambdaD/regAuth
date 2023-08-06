<?php
session_start();
require_once('connect.php');

$content = $_POST['content'];
$user_id = $_SESSION['user']['id'];
mysqli_query($connect, "INSERT INTO `posts`(`user_id`, `content`, `created_at`) VALUES ('$user_id', '$content', NOW())");
echo($content.'   '.$user_id );
//header("Location: ../profile.php");
?>