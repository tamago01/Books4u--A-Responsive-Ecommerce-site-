<?php 
session_start();
include'config.php';
include 'setting.php';
include_once 'configg.php'; 
include_once 'dbConnect.php';
$user_id=$_SESSION['user_id']
$pid = $_SESSION['product_id']; 
 
if(isset($_GET['PayerID'])){ 
    echo "<h1>Your Payment has been successfull</h1>";
    $insert = $db->query("UPDATE product SET status='completed' where id='".$pid."'");
}
else{
    echo "<h1>Your Payment has been failed</h1>";
}
session_destroy();
?>
<a href="index.php">Back to Home</a>