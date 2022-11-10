<?php 
// Include configuration file 
include_once 'configg.php';

// Connect with the database 
$db = new mysqli('sql100.epizy.com', 'epiz_32346383', 'kz1fbxjy', 'epiz_32346383_paypal_con') or die('Failed to connect to db'); 
 
// Display error if failed to connect 
if ($db->connect_errno) { 
    printf("Connect failed: %s\n", $db->connect_error); 
    exit(); 
}?>