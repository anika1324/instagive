<?php
if(isset($_POST["submit"]))
{
  if(!empty($_POST['username'])&& !empty($_POST['Confirm_password'])&& !empty($_POST['password'])&& !empty($_POST['email']) && !empty($_POST['fullname']))
  {
    $confirm_password= $_POST['Confirm_password'];
    $password= $_POST['password'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $fullname=$_POST['fullname'];
    if($confirm_password != $password) {
      echo "invalid user";
    }
    else {
      $con=mysqli_connect('localhost','root','') or die(mysqli_error());
      mysqli_select_db($con,'instagive') or die('Cannot select db');

      $sql = "INSERT INTO user_details(username, password, email, fullname) VALUES ('$username','$password','$email','$fullname')";
      if (mysqli_query($con, $sql)){
        echo "yayayayayay user has been ADDEDddd";
      }
      else {
        echo "Errrorrrrr adding userr";
      }
  }
}
else {
  echo "Not all required fields are filled.";
}
}
else {
  echo "Post n ot submitted";
}

?>
