<html>
<head>
<title>Search</title>
<link rel="stylesheet" type="text/css" href="header.css">
<style>

</style>
<body>

  <?php
  session_start();
  ?>

<div class="header">
 <a href="feed.php" class="logo"><img src= "https://qph.fs.quoracdn.net/main-qimg-06544605342d910b700b9cc055fe860c" width= 70px height= 60px></img>InstaGive</a>
 <div class="header-right">
 <a href= uploads.php> <img src ="uploads.png" width=50px height= 50px></img></a>
 <a class="active" href="followers.php"> <img src = "heart.png" width = 40px height = 40px></img></a>
 <a href="discoverpeople.php"><img src = "compass.png" width= 50px height= 50px></img></a>
 <a href="profile.php?user=<?php echo $_SESSION['username'] ?>"><img src = "profile.png" width= 50px height = 50px></img></a>
 <a href = "search_form.php"><img src = "search.png" width=50px height= 50px></img></a>

 </div>

<form method="post" action="search.php" id="searchform">
 <input type = "text" name = "search_text">
 <input type = "submit" name= "submit" value = "search">
</form>
 </body>
 </html>
