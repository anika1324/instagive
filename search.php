<?php
if(isset($_POST["submit"])){
	if(!empty($_POST["search_text"])) {
    $search_text = $_POST["search_text"];
    $con=mysqli_connect('localhost','root','') or die(mysqli_error());
		mysqli_select_db($con,'instagive') or die('Cannot select db');
		$result= mysqli_query($con,"SELECT * FROM user_details WHERE username LIKE '%".$search_text."%' OR fullname LIKE '%".$search_text."%'");
    $numrows = mysqli_num_rows($result);
  while($row=mysqli_fetch_array($result)){
          $username=$row['username'];
          $fullname=$row['fullname'];
?>
<form method="post">
        <a href="profile.php?user=<?php echo $username ?>"><?php echo $fullname; ?></a>
        <input type="submit" name="button1" class="button" value="Follow" />
        <input type="hidden" name="username" value="<?php echo $username ?>">
      </form>
<?php
          echo "\n";
  }
}
  else {
    echo "Empty search string";
  }
}
if (isset($_POST['follow'])) {
  echo "I am following";
  echo $_POST['username'];
	$con=mysqli_connect('localhost','root','') or die(mysqli_error());
	mysqli_select_db($con,'instagive') or die('Cannot select db');
	session_start();
	$username = $_POST['username'];
  $follower= $_SESSION['username'];
  $sql = "INSERT INTO followers(username, follower) VALUES ('$username', '$follower')";
	if (mysqli_query($con, $sql)){
		echo "yayayayayay user has been ADDEDddd";
	}
	else {
		echo "Errrorrrrr adding userr";
	}
}
?>
