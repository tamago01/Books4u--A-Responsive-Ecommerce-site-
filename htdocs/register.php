<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = 'user';
   $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^"; 
   $patterns= "/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/";

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' ") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }
   elseif(!preg_match($patterns,$name))
{
    $message[]='Only alphabets for name';
}
   
   elseif(!preg_match ($pattern, $email)){
          $message[]='Invalid email format';
          }

   else{
      if($pass != $cpass){
         $message[] = 'Invalid email or password.';
      }
      
          
          else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">


</head>
<body>



<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<form name="xyz" action="" method="post">
 <h2><span><a href="index.php" class="btnz">Books4U</span></a></h2>
 </form>

<div class="form-container">


   <form name="myForm" action="" method="POST" >
      <h3>Register now</h3>
      <input id="name" type="text" name="name" placeholder="enter your name" required class="box">
      <input  id="email" name="email" placeholder="enter your email" required class="box">
      <input type="password" name="password" placeholder="enter your password" required class="box">
      <input type="password" name="cpassword" placeholder="confirm your password" required class="box">

    <input type="submit" name="submit" value="Register now" class="btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>
<script type="text/javascript">
function validateForm(){
var name= document.getElementById("name").value;
var email= document.getElementById("email").value;
var pattName= name.search(/^[a-zA-Z ]{2,30}$/); 
var pattEmail= email.search(/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/);
if(pattName<0){
alert('Name should contain alphabets only');
document.getElementById("name").focus();
return false;
}
if(pattEmail<0){
alert('Please enter valid email!');
document.getElementById("email").focus()
return false;
}
}
</script>
</body>
</html>