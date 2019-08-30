<?php
$errors = '';
$myemail = 'suvrangshu.turno@gmail.com';//<-----Put Your email address here.
if(empty($_POST['contact-name'])  ||
   empty($_POST['contact-email']) ||
   empty($_POST['contact-project']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['contact-name'];
$email_address = $_POST['contact-email'];
$message = $_POST['contact-project'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Contact form submission: $name";
$email_body = "You have received a new message. ".
" Here are the details:\n Name: $name \n ".
"Email: $email_address\n Message \n $message";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: contact-form-thank-you.html');
}
?>