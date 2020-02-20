<?php
echo "discover people."
 ?>
 <!doctype html>
 <html>
 <head>
 <title>Welcome</title>
 <style>
 .header {
 overflow: hidden;
 background-color: #f1f1f1;
 padding: 20px 10px;
 }


 .header a {
 float: left;
 color: black;
 text-align: center;
 padding: 9px;
 text-decoration: none;
 font-size: 18px;
 line-height: 25px;
 border-radius: 4px;
 }


 .header a.logo {
 font-size: 25px;
 font-weight: bold;
 }


 .header a:hover {
 background-color: #ddd;
 color: black;
 }


 .header a.active {
 background-color: dodgerblue;
 color: white;
 }


 .header-right {
 float: right;
 }
 </style>
 <body>

 <div class="header">
<a href="feed.php" class="logo"><img src= "https://qph.fs.quoracdn.net/main-qimg-06544605342d910b700b9cc055fe860c" width= 70px height= 60px></img>InstaGive</a>
<div class="header-right">
<a href= uploads.html> <img src ="uploads.png" width=50px height= 50px></img></a>
<a class="active" href="followers.php"> <img src = "heart.png" width = 40px height = 40px></img></a>
<a href="discoverpeople.php"><img src = "compass.png" width= 50px height= 50px></img></a>
<a href="profile.php"><img src = "profile.png" width= 50px height = 50px></img></a>
<a href = "search.php"><img src = "search.png" width=50px height= 50px></img></a>

</div>

</body>
