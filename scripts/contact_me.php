<?php
   if(empty($_POST['name'])  		||
      empty($_POST['email']) 		||
      empty($_POST['phone']) 		||
      empty($_POST['message'])	||
      !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
      {
   	    echo "Niet alle velden zijn ingevuld!";
   	    return false;
      }

   $name = sanitizeString($_POST['name']);
   $email_address = sanitizeString($_POST['email']);
   $phone = sanitizeString($_POST['phone']);
   $message = sanitizeString($_POST['message']);

   $to = "info@dennisspaan.com";
   $email_subject = "Website Contact Form:  $name";
   $email_body = wordwrap("\n\nNaam: $name\n\nEmail: $email_address\n\nTelefoon: $phone\n\nBericht:\n\n$message");
   $headers = "From: noreply@dennisspaan.com\n";
   $headers .= "Reply-To: $email_address";
   mail($to,$email_subject,$email_body,$headers);
   return true;

   function sanitizeString($var)
   {
      global $connection;

      $var = strip_tags($var);
      $var = htmlentities($var);
      $var = stripslashes($var);
      return $var;
   }

?>
