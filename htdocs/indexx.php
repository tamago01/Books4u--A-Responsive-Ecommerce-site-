<?php 
// Include configuration file 
session_start();
include_once 'configg.php'; 
include 'config.php';
include 'setting.php';

$user_id = $_SESSION['user_id'];

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
if(isset($_post['submit']))
{   
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed'); 

    
}
 
// Include database connection file 
include_once 'dbConnect.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pre-Pay</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   

               <section class="contact">
                <form action="<?php echo PAYPAL_URL; ?>" method="post" id="paypal_form">
                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
                    <a href="checkout.php"><input type="button" name="back" value="Go back" class="btn">
                    <img src="pplogo.png" alt="PayPal" class="box">
					
                    <!-- Important For PayPal Checkout -->
                    <h1><label>Products</label></h1>
                    <input type="text" value="<?php echo $fetch_cart['name']; ?> (<?php echo '$'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)" class="box" readonly>
                    <h1><label>Product Name: </label></h1>
                    <input type="text"  value ="<?php echo $fetch_cart['name']; ?>"name="item_name" id="item" readonly class="box"><br><br>
                    <h1><label>Price:</label></h1>
                    <input type="number" value="<?php echo $grand_total;?>" name="amount" id="amount" readonly class="box">
                    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
					
                    <!-- Specify a Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">
                    <!-- Specify URLs -->
                    <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
					<br><br>
                    <!-- Display the payment button. -->
                    <input type="submit" name="submit" border="0" value="Pay" class="btn">
                    
                </form>
                </section>

                   <?php
      }
   }
   ?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#paypal_form").submit(function(){
            setData(jQuery("#amount").val(), jQuery("#item").val());
        });
        function setData(amount, item) {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            
          };
          xhttp.open("GET", "insertData.php?amount="+amount+"&item="+item, true);
          xhttp.send();
        }
    });
</script>
</body>
</html>