<?php
header( 'Location: https://www.bashiras-cakes.com/thank-you.html' ) ;
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

$mailheader = "From:".$name."<".$email.">\r\n";

$recipient = "info@africanacitybeautyladiessaloon.com";

mail($recipient, $phone, $message, $mailheader) or die("Error!");

echo'
';


?>
