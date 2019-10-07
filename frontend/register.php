<?php include('../DataBase/connection.php');?>

<?php
$fname=""; // first name
$lname=""; // last name
$em=""; // email
$em2=""; // email2
$password=""; // password
$password2=""; // password 2
$date =""; // sign up date
$error_array="";

if(isset($_POST['reg_button'])){

  //first name
  $fname=strip_tags($_POST['reg_fname']); //remove HTML tags
  $fname=str_replace(' ','',$fname); // remove spaces
  $fname=ucfirst(strtolower($fname)); // Upear Case first letter


  //last name
  $lname=strip_tags($_POST['reg_lname']); //remove HTML tags
  $lname=str_replace(' ','',$lname); // remove spaces
  $lname=ucfirst(strtolower($lname)); // Upear Case first letter

  //email
  $em=strip_tags($_POST['reg_email']); //remove HTML tags
  $em=str_replace(' ','',$em); // remove spaces
  $em=ucfirst(strtolower($em)); // Upear Case first letter

  //email 2
  $em2=strip_tags($_POST['reg_email2']); //remove HTML tags
  $em2=str_replace(' ','',$em2); // remove spaces
  $em2=ucfirst(strtolower($em2)); // Upear Case first letter

  //password
  $password=strip_tags($_POST['reg_password']); //remove HTML tags

  //password 2
  $password2=strip_tags($_POST['reg_password2']); //remove HTML tags

  $date= date("Y-m-d"); // Current date
  if($em==$em2){
    // check email invalid format
      if(filter_var($em , FILTER_VALIDATE_EMAIL)){

        $em = filter_var($em , FILTER_VALIDATE_EMAIL);
        // chack if email already exists
        $e_check = mysqli_query($con,"SELECT  email FROM users WHERE email='$em'");

        $num_rows =mysqli_num_rows($e_check);
        if($num_rows > 0){

        }
      }else{
         echo "Invalid Format";
      }
  }else{
    echo "Emails don't match";
  }

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register page</title>
  </head>
  <body>

      <form class="" action="register.php" method="post">
        <div class="form-group">
        <input type="text" name="reg_fname" placeholder="First Name" required>
        <br>
        <input type="text" name="reg_lname" placeholder="Last Name" required>
        <br>
        <input type="text" name="reg_email" placeholder="Email" required>
        <br>
        <input type="text" name="reg_email2" placeholder="Confirm Email" required>
        <br>
        <input type="password" name="reg_password" placeholder="Password" required>
        <br>
        <input type="password" name="reg_password2" placeholder="Confirm password" required>
        <br>
        <input type="submit" name="reg_button" value="Regsitre">
      </div>
      </form>
  </body>
</html>
