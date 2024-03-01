<?php
header( 'Location: https://www.bashiras-cakes.com/thankyouorder.html' ) ;
$bookingname = $_POST['bookingname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$message = $_POST['message'];

$mailheader = "From:".$bookingname."<".$email.">\r\n";

$recipient = "info@bashiras-cakes.com";

mail($recipient, $phone, $message, $mailheader) or die("Error!");

echo'
';


?>
