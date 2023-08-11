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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=($_SESSION["user"]["first_name"].' '.$_SESSION["user"]["second_name"])?></title>
  <link rel="stylesheet" href="assets/css/profilestyle.css">
</head>
<body>
<div class="container">
  <div class="header">
    <div class="left_side_header"></div>
    <div class="mid_header"></div>
    <div class="right_side_header">
      <form id="ext_form" action="vendor/logout.php">
        <button class="ext_btn">Выйти</button>
      </form>
    </div>
  </div>
  <div class="underheader"></div>

  <div class="content">
    <div class="vertical"></div>

    <div class="vertical" id="middle">
      <div class="block_1" id="up">
        <div class="block_2" id="infoprofile1">
          <div id="backprofileimage"></div>
          <div id="infoprofile2">
            <div id="nameinfo"></div>
          </div>

          <div id="infoprofile3">
            <div id="avainfo">
              <div id="avainfo2"></div>
              <div id="avatar">
                <div id="avatarimage">
                  <img class="avatar" src="<?= $_SESSION['user']['avatar'];?>" />
                </div>
              </div>
            </div>

            <div id="nameinfo">
              <div id="upnameinfo"></div>
              <div id="downnameinfo">
                <div id="userinfo">
                  <div id="username">
                    <div class="text_profile">
                      <span><?= $_SESSION['user']['first_name'].' '.$_SESSION['user']['second_name'];?></span>
                    </div>
                  </div>
                  <div id="nickname">
                    <div class="text_profile"><span><?= $_SESSION['user']['login']?></span></div>
                  </div>
                  <div id="email">
                    <div class="text_profile">
                      <span><a href="#"><?= $_SESSION['user']['email'];?></a></span>
                    </div>
                  </div>
                </div>
                <div id="nameifo_func"></div>
                <div></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="block_1" id="lowerdouble">
        <div id="mynotes" class="block_2">
          <div id="post_container">
            <form method="POST" action="vendor/create_post.php" id="createpost_container">
              <div id="textarea_container">
                <textarea class="ta1" name="content" id="content" placeholder="Что нового?"></textarea>
              </div>
              <div id="button_container">
                <button class="btn1" type="submit">Создать запись</button>
              </div>
            </form>

<?php
  require_once('vendor/connect.php');
  $user_id = $_SESSION["user"]["id"];
  $post = mysqli_query($connect, "SELECT * FROM `posts` WHERE `user_id` = '$user_id' ORDER BY `created_at` DESC");

?>

            <div id="posts_header">
              <div class="header_name"><span>Мои записи</span></div>
            </div>
            <div id="posts">
<?php
  while($fetchPost = mysqli_fetch_assoc($post)){?>
              <div id="post">
                <div id="post_content">
                  <span><?=$fetchPost['content'];?></span>
                </div>
                <div id="post_date">
                  <span><?=$fetchPost['created_at'];?></span>
                </div>
              </div>
<?php }
?>
            </div>
          </div>
        </div>
        <div class="block_2"></div>
      </div>
    </div>

    <div class="vertical"></div>
  </div>
</div>

</body>
</html>