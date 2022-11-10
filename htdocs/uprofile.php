<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}
if(isset($_POST['update_name'])){
   $usern = $_POST['name_id'];
   mysqli_query($conn, "UPDATE `users` SET name = '$usern' WHERE id = '$user_id'") or die('query failed');
   $message[] = 'User name updated!';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stlyesheet" href="css/user_style.css"

</head>
<body>

   
<?php include 'header.php'; ?>


<!-- User dashboard section starts  -->

        

<section class="dashboard">

   <h1 class="title">User Profile</h1>
   
   <div class="box-container">

         <?php
      $name_query=mysqli_query($conn, "SELECT * FROM `users` where id='$user_id'") or die('query failed');
      if(mysqli_num_rows($name_query) > 0){
            while($fetch_users = mysqli_fetch_assoc($name_query)){
	    ?>
        <div class="box">
        <form action="" method="post">
        
        <p> Email : <span><?php echo $fetch_users['email']; ?></span> </p>
        <p>Name: <span><?php echo $fetch_users['name']; ?>
        <!--<input type="submit" name="update_name" value="update" class="option-btn"></span></p> -->
         
        </div>
        <?php
       }
      }else{
         echo '<p class="empty">no user data available</p>';
      }
      ?>
   </div>
   <br>
   <br>
   <br>

   <div class="box-container">

      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending' && user_id='$user_id'") or die('query failed');
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         <h3>RS<?php echo $total_pendings; ?>/-</h3>
         <p>Total pendings</p>
      </div>

      <div class="box">
         <?php
            $total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed' && user_id='$user_id'") or die('query failed');
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
         <h3>RS<?php echo $total_completed; ?>/-</h3>
         <p>Completed payments</p>
      </div>

      <div class="box">
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders` where user_id='$user_id'") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>Orders placed</p>
      </div>

      <div class="box">
         <?php 
            $select_messages = mysqli_query($conn, "SELECT * FROM `message` where user_id='$user_id'") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <p>Messages sent</p>
      </div>


   </div>

</section>
<section class="placed-orders">

   <h1 class="title">Orders History</h1>

   <div class="box-container">

      <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_orders = mysqli_fetch_assoc($order_query)){
      ?>
      <div class="box">
         <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <p> your orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> total price : <span>RS<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
         <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
         </div>
      <?php
       }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
   </div>

</section>

<?php include 'footer.php'; ?>

<!-- custom admin js file link  -->
<script src="js/script.js"></script>

</body>
</html>