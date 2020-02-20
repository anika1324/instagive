<!doctype html>
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" type="text/css" href="header.css">
<body>
<style>

#profile_details{
  overflow: hidden;
}
#details {
  margin: 20px;
  float: left;
}
#picture {
  float: left;
}
#posts {
  float: left;
  border-top: 1px solid #c6a7f2;

}
</style>

<div class="header">

<a href="feed.php" class="logo"><img src= "https://qph.fs.quoracdn.net/main-qimg-06544605342d910b700b9cc055fe860c" width= 70px height= 60px></img>InstaGive</a>
<div class="header-right">
<a href= uploads.html> <img src ="uploads.png" width=50px height= 50px></img></a>
<a class="active" href="followers.php"> <img src = "heart.png" width = 40px height = 40px></img></a>
<a href="discoverpeople.php"><img src = "compass.png" width= 50px height= 50px></img></a>
<a href="profile.php"><img src = "profile.png" width= 50px height = 50px></img></a>
<a href = "search.php"><img src = "search.png" width=50px height= 50px></img></a>
</div>

</div>
<?php


function resultToArray($result) {

$rows = array();

while($row = $result->fetch_assoc()) {

$rows[] = $row;

}

return $rows;

}

session_start();

$username = $_SESSION['username'];





$con=mysqli_connect('localhost','root','') or die(mysqli_error());

mysqli_select_db($con, 'instagive') or die('Cannot select DB');





$result = mysqli_query($con, "SELECT image_name, image_description, date_time FROM posts WHERE username ='".$username."'");

$numrows=mysqli_num_rows($result);

$rows = resultToArray($result);



$profile_picture= mysqli_query($con, "SELECT profile_img FROM profile_picture WHERE username ='".$username."'");

$numprofilepicture=mysqli_num_rows($profile_picture);

$profilepicturerows = resultToArray($profile_picture);
?>
<div id="profile_details">
<div id="picture">

<?php

if(empty($profilepicturerows)) {
?>
    <img id="profile_pic" src="profile_picture/gray_man.png" width="100px" height="100px">
<?php

}

else {
?>
  <br>
  <img id="profile_pic" src="profile_picture/<?php echo $profilepicturerows[0]['profile_img'] ?>" width="100px" height="100px">

<?php
}
$fullname_result = mysqli_query($con, "SELECT fullname FROM user_details WHERE username ='".$username."'");

$fullname = resultToArray($fullname_result);

?>
</div>
<div id="details">
<h2><em> <?php echo $username ?> </em></h2>
<p> <?php echo $numrows ?> posts &nbsp;
TODO Following &nbsp;
TODO Followers <br>
<strong> <?php echo $fullname[0]['fullname'] ?> </strong>
</div>
</div>

<div id="posts">
<?php
for($x=0; $x<$numrows; $x++) {
?>

<br>

<img src="uploads/<?php echo $rows[$x]['image_name'] ?>" width="450px" height="500px">

<div>

<p name = "description" id="description">

<?php echo $rows[$x]['image_description'] ?>

</p>

<br>

</div>

<?php

}

?>
</div>
</body>
