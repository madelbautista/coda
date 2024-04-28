<?php
include('tracking_db.php');
session_start();

if (!isset($_SESSION['prof_name']) || !isset($_SESSION['faculty_id'])) {
  header('Location: /coda/landing/Register/SignIn/signin.php');
  exit();
}

$user_id = $_SESSION['faculty_id'];
$query = "SELECT names FROM faculties WHERE faculty_id = $user_id";
$result = mysqli_query($conn, $query);

if ($result) {
  $user_row = mysqli_fetch_assoc($result);
  $user_name = $user_row['names'];
} else {
  $user_name = "User";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/prof.css" />
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <script src="js/jquery-3.4.1.min.js"></script>
  <title>CSD Faculty</title>
  
  <script>
	$(document).ready(function(){
		$(".profile .icon_wrap").click(function(){
		  $(this).parent().toggleClass("active");
		  $(".notifications").removeClass("active");
		});

		$(".notifications .icon_wrap").click(function(){
		  $(this).parent().toggleClass("active");
		   $(".profile").removeClass("active");
		});

		$(".show_all .link").click(function(){
		  $(".notifications").removeClass("active");
		  $(".popup").show();
		});

		$(".close").click(function(){
		  $(".popup").hide();
		});
	});
  </script>

</head>
<body>

<nav>  
  <div class="wrapper">
    <nav class="navbar">
      <div class="navbar_left">
        <div class="nav__logo">
          <a href="#"><img src="imahe/FAST.png" alt="logo" /></a>
        </div>
      </div>
      <div class="navbar_center_text">
        <a href="profpage.php">Home</a>
        <a href="add_sched.php">Add Schedule</a>
        <a href="view_schedule.php">View Schedule</a>
      </div>

      <div class="navbar_right">
        <div class="notifications">

          
        </div>
         <div class="profile">
          <div class="icon_wrap">
            <img src="imahe/profile/icon.png" alt="profile_pic">
          </div>

          <div class="profile_dd">
            <ul class="profile_ul">
              <li class="profile_li">
                <a class="profile" href="#"><span class="picon"><i class="fas fa-user-alt"></i></span><?php echo $user_name; ?></a>
              </li>
              <li><a class="logout" href="logout.php"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</nav>

<header class="itloog__container header__container" id="homealone">
  <div class="header__content">
    <h1>Computer Studies<br><h1 class="dp">Department</h1></h1>
  </div>
</header>

<header class="itloog__container header__search" id="homealone">
  <div class="header__content">
  </div>
  <div class="header__image">
    <img src="imahe/torch.png" alt="header" />
  </div>
</header>

</html>