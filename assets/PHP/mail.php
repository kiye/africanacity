<?php
header( 'Location:https://www.africanacitybeautyladiessaloon/nails.html' ) ;
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$msg_subject = $_POST['msg_subject'];
$message = $_POST['message'];

$mailheader = "From:".$name."<".$email.">\r\n";

$recipient = "info@africanacitybeautyladiessaloon.com";

mail($recipient, $phone_number, $message, $mailheader) or die("Error!");

echo'
';


?>
