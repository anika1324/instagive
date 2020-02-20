<html>
<head>
	<title>Insta-give </title>
	<style>
	body {
  background-image: linear-gradient(to right, purple,lightskyblue);
	}
	h1 {
		color: mediumslateblue
	}
#firstscreen {
	margin: 0px auto;
	width:600px;
	height:500px;
	padding:30px;
}
	</style>
</head>
<body>
	<div id= "firstscreen">
	<h1>Welcome to Insta-give!</h1>
	<form action = "" method = "POST">
		username<br>
	<input type = "text" name ="username"><br>
	password<br>
	<input type = "text" name= "password"><br>
	<input type = "submit" name = "submit" value ="login">
	<input type = "submit" name= "Logout" value = "logout"><br>
	<a href= "signup.html" name = "signup"> create an account</a>

		<img src = "https://www.humecoal.com.au/wp-content/uploads/2016/02/community-support.jpg" width= "200px" height= "200px"></img>

</form>

</body>

</html>
</div>

<?php
if(isset($_POST["submit"])){
	if(!empty($_POST["username"]) && !empty($_POST["password"])){
		$username=$_POST["username"];
		$password=$_POST["password"];
		$con=mysqli_connect('localhost','root','') or die(mysqli_error());
		mysqli_select_db($con,'instagive') or die('Cannot select db');
		$query= mysqli_query($con,"SELECT * FROM user_details WHERE username='".$username."' AND password='".$password."'");
	$numrows = mysqli_num_rows($query);
	if($numrows !=0){
		echo "Login succesful";
		session_start();
		$_SESSION['username'] = $username;
		header("Location: member.php");

	}
	else{
		echo "Invalid user's credentials";
	}
	}
	else {
		echo "All fields are required";
	}
}

?>
