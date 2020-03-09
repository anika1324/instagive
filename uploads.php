<?php
$target_dir = "uploads/";
$date=date_create();
$target_file = $target_dir . date_timestamp_get($date) . basename($_FILES["fileToUpload"]["name"]);
//TODO append the timestamp to the file name
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) {
$uploadOk = 1;
} else {
echo "File is not an image.";
$uploadOk = 0;
}
}
// Check if file already exists
if (file_exists($target_file)) {
echo "Sorry, file already exists.";
$uploadOk = 0;
}
// Check file size - limits 500KB
if ($_FILES["fileToUpload"]["size"] > 50000000000) {
echo "Sorry, your file is too large.";
$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  $description = $_POST['description'];
  session_start();
  $date = date("m/d/Y h:i A");
  $final = strtotime($date);
  $time_posted = date("Y-m-d H:i:s" , $final);
  $username = $_SESSION['username'];
  echo $username;
  $image_name=basename($target_file);
  $con=mysqli_connect('localhost', 'root' , '') or die(mysqli_error());
  mysqli_select_db($con, 'instagive') or die('Cannot select DB');

  $sql = "INSERT INTO posts(username, image_name, image_description, date_time) VALUES ('$username', '$image_name', '$description', '$time_posted')";
  if (mysqli_query($con, $sql)){

?>
<img src="uploads/<?php echo $image_name ?>" width="450px" height="500px">
<div>
<textarea readonly name = "description" id="description">
<?php echo $_POST['description'] ?>
</textarea><br>
</div>
<?php
}else {
  echo "ERROR: " . $sql . "<br>" . mysqli_error($con);
}

} else {
echo "Sorry, there was an error uploading your file.";
}
}
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
#firstscreen {
	margin: 0px auto;
	width:600px;
	height:500px;
	padding:30px;
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
<a href = "search.html"><img src = "search.png" width=50px height= 50px></img></a>

</div>

</body>
