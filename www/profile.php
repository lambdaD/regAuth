<?php
  session_start();
  require_once('vendor/connect.php');
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
          <div id="backprofileimage">
            <div id="leftbackground_buttons"></div>
            <div id="background_buttons">
              <div id="inner_background_buttons">
                <div class="btn_back_container">
                  <button class="transparent-button">
                    <img src="assets/icons/icon-pencil.png" alt="">
                    <span>Сменить фон</span>
                  </button>
                </div>
                <div id="underbuttonback">
                  <div class="underbtn_back_container">
                    <button  class="transparent-button" >
                      <img src="assets/icons/icon-pencil.png" alt="">
                      <span>Загрузить</span>
                    </button>
                  </div>
                  <div class="underbtn_back_container">
                    <button class="transparent-button">
                      <img src="assets/icons/icon-pencil.png" alt="">
                      <span>Обрезать</span>
                    </button>
                  </div>
                  <div class="underbtn_back_container">
                    <button class="transparent-button">
                      <img src="assets/icons/icon-pencil.png" alt="">
                      <span>Удалить</span>
                    </button>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div id="infoprofile2">
            
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
                <div id="nameinfo_func"></div>
                <div id="karmainfo">
                  <div id="karma_container">
                    
                    <div id="karma_image">
                      <div id="image"><img src="assets/icons/icon-usd.png" alt="" /></div>
                    </div>
<?php
  $user_id = $_SESSION["user"]["id"];
  $infoUser = mysqli_query($connect, "SELECT * FROM `profileinfo` WHERE `user_id` = '$user_id'");
  $infoUserFetch = mysqli_fetch_assoc($infoUser);
  $_SESSION['infouser']  = array(
    "user_id" => $infoUserFetch['user_id'],
    "karma" => $infoUserFetch['karma']
  );

?>
                    <div id="karma_count"><p><?=$_SESSION['infouser']['karma']?></p></div>
                  </div>
                </div>
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