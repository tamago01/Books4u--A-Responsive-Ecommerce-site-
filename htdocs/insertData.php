<?php 
session_start();

// Include database connection file 
include_once 'dbConnect.php';

$amount = $_GET['amount'];
$item = $_GET['item'];
$status = "pending";

$insert = $db->query("INSERT INTO product(product_name, price, status) VALUES('".$item."','".$amount."','".$status."')");
$last_id = $db->insert_id;

$_SESSION['product_id'] = $last_id;
