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
<a href=""><?php echo $fullname;?></a>
<?php
          echo "\n";
  }
}
  else {
    echo "Empty search string";
  }
}

?>
