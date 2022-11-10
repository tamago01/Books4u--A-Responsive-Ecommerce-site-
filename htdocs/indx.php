<?php
    include 'setting.php';
    include 'config.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    if(isset($_POST['order_btn'])){
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $item_name=$cart_item['name'];
         $item_quantity=$cart_item['quantity'];
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
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
    <title>Confirm Payment via eSewa</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="card" style="width: 5.5px">
        
        <div class="card-body">
    <form action=<?php echo $epay_url?> method="POST">
    <input value="100" name="tAmt" type="hidden">
    <input value="200" name="amt" type="hidden">
    <input value="5" name="txAmt" type="hidden">
    <input value="2" name="psc" type="hidden">
    <input value="3" name="pdc" type="hidden">
    <input value=<?php echo $merchant_code?> name="scd" type="hidden">
    <input value=<?php echo $pid?> name="pid" type="hidden">
    <input value=<?php echo $successurl?> type="hidden" name="su">
    <input value=<?php echo $failureurl?> type="hidden" name="fu">
    
    </form>
        </div>
    </div>
<section class="display-order">
    <img src="eSewa_img.jpg" alt="eSewa" class="box">
    <br>
   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }
   ?>

   
   <div class="box-container">

      <div class="box">
         <?php
         ?>
         <p>Total Cost: RS<?php echo $grand_total; ?></p>
      </div>
              <div class="box">
         <p><a href="home.php">Shop more</a></p>
      </div>
      <form action="" method="POST">
      <duv class="box">
      <a href="shop.php"><input type="submit" name="order_btn" value="I have paid"></a>
      </div>
      
<img src="esewaqrr.jpg" alt="eSewa" class="box">
        

</section>




<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>