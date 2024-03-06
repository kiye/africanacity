<?php

if(isset($_POST['email'])) {

$email_to = "info@africanacitybeautyladiessaloon.com";

$email_subject = "New Message";

//Errors to show if there is a problem in form fields.

function died($error) {

    echo "We are sorry that we can procceed your request due to error(s)";

    echo "Below is the error(s) list <br /><br />";

    echo $error."<br /><br />";

    echo "Please go back and fix these errors.<br /><br />";

    die();

}

// validation expected data exists

if(!isset($_POST['name']) ||

       !isset($_POST['phone']) ||

       !isset($_POST['email']) ||

       !isset($_POST['message'])) {

    died('We are sorry to proceed your request due to error within form entries');   

}

$name = $_POST['name']; // required

$phone = $_POST['phone']; // required

$email = $_POST['email']; // required

$message = $_POST['message']; // required

$error_message = "";

$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

 if(!preg_match($email_exp,$email)) {

$error_message .= 'You entered an invalid email<br />';

 }

$string_exp = "/^[A-Za-z .'-]+$/";

 if(!preg_match($string_exp,$name)) {

$error_message .= 'Invalid name<br />';

 }


$email_message = "Client Details.\n\n";

function clean_string($string) {

  $bad = array("content-type","bcc:","to:","cc:","href");

  return str_replace($bad,"",$string);

}

$email_message .= "NAME: ".clean_string($name)."\n";

$email_message .= "PHONE: ".clean_string($phone)."\n";

$email_message .= "EMAIL: ".clean_string($email)."\n";

$email_message .= "MESSAGE: ".clean_string($message)."\n";

// create email headers

$headers = 'From: '.$email."\r\n".

'Reply-To: '.$email."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

?>

<!-- include your own success html here -->
<div id="thank_you" style="text-align: center; font-size:24px">
    <p>Thank you for contacting us. We will be in touch with you very soon.</p>
    <a href="../../index.html"> <button class="btn common-btn two form-widget--btn f-3 txt-capi bold-n w100 btn solid btn-black bold-n animated s01">Home</button></a>
</div>



<?php

}

?>