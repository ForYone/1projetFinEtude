<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('SMTP', RSMTP);
ini_set('sendmail_from', SEND_MAIL_FROM);
$from = SEND_MAIL_FROM;
$to = TO;
$subject = SUJET;
$message = MESSAGE;
$headers = "From:" . $from;
mail($to, $subject, $message, $headers);
echo "<p class='msgCom' style ='color:green;text-align:center;'> Votre commande a bien été prise en compte</p>";





