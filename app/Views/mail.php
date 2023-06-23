<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


$receiver = "receiver_email _address_here";

$subject = "Email Test via PHP using Localhost";

$body = "Hi, there this is a test email send from Localhost.";

$sender = "From:sender email address_here";

//php function to send mail

if(mail($receiver, $subject, $body, $sender) ) {echo "Email sent successfully to $receiver";

} else {

echo "Sorry, failed while sending mail!";
}
?> 
</body>
</html>