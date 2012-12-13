<?php

// Send email to the webmaster
$subject = "The Subject for Admin/Webmaster here (f.e: New Registration Notification)";
$message = "Data of the new user:\r\n".
		   "Name : $_POST[name]\r\n".
		   "Email : $_POST[email]\r\n".
		   "Location : $_POST[location]\r\n".
$from = "you@site.cpm";

mail("your@mail.com",$subject,$message,$from);

//Send Email to the User who register
function SendUserConfirmationEmail()
{
    $mailer = new PHPMailer();
    $mailer->CharSet = 'utf-8';
    $mailer->AddAddress($_POST['email'],$_POST['name']);
    $mailer->Subject = "Your registration with YOURSITE.COM"; //example subject
    $mailer->From = "your@mail.com";
    $mailer->Body ="Hello $_POST[name], \r\n\r\n".
    "Thanks for your registration with YOURSITE.COM \r\n".
    "\r\n".
    "Regards,\r\n".
    "Webmaster\r\n";
	
    if(!$mailer->Send())
    {
        $this->HandleError("Failed sending registration confirmation email.");
        return false;
    }
    return true;
}

?>