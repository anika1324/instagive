<?php

session_start();

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





 .header-right {
 float: right;
 }
 </style>
 <body>

 <div class="header">
<a href="feed.php" class="logo"><img src= "https://qph.fs.quoracdn.net/main-qimg-06544605342d910b700b9cc055fe860c" width= 70px height= 60px></img>InstaGive</a>
<div class="header-right">
<a href= uploads.php> <img src ="uploads.png" width=50px height= 50px></img></a>
<a class="active" href="followers.php"> <img src = "heart.png" width = 40px height = 40px></img></a>
<a href="discoverpeople.php"><img src = "compass.png" width= 50px height= 50px></img></a>
<a href="profile.php?user=<?php echo $_SESSION['username'] ?>"><img src = "profile.png" width= 50px height = 50px></img></a>
<a href = "search_form.php"><img src = "search.png" width=50px height= 50px></img></a>
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
$con=mysqli_connect('localhost','root','') or die(mysqli_error());
mysqli_select_db($con,'instagive') or die('Cannot select db');

$username = $_SESSION['username'];
$following= mysqli_query($con, "SELECT username FROM followers WHERE follower='".$username."'");
$numrows=mysqli_num_rows($following);
if ($numrows != 0) {
$rows = resultToArray($following);
for($x=0; $x<$numrows; $x++) {
    $rows_final[] = $rows[$x]['username'];
}
$rowsStr = implode("', '", $rows_final);
    $result = mysqli_query($con, "SELECT username, image_name, image_description, date_time FROM posts WHERE username IN ('$rowsStr') ORDER BY date_time DESC");
    $numrows=mysqli_num_rows($result);
    $rows = resultToArray($result);


    for($x=0; $x<$numrows; $x++) {
      ?>
<br>
<img src="uploads/<?php echo $rows[$x]['image_name'] ?>" width="450px" height="500px">
<div>
<h3><?php echo $rows[$x]['username'] ?> </h3>
<p name = "description" id="description">
<?php echo $rows[$x]['image_description']; ?>
<p date= "date"> <?php echo $rows[$x]['date_time']; ?>
<?php
}
}
else {
    echo "You are not following anyone yet..";
}
 ?>
