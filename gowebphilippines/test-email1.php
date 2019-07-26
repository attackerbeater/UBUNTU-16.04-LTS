<?php
    // ini_set( 'display_errors', 1 );
    // error_reporting( E_ALL );
    // $from = "test@hostinger-tutorials.com";
    // $to = "john.junsay@acidgreen.com.au";
    // $subject = "Checking PHP mail";
    // $message = "PHP mail works just fine";
    // $headers = "From:" . $from;
    // var_dump(mail($to,$subject,$message, $headers));
    // echo "The email message was sent.";
?>

<?php


// phpinfo();
// die();
// // the message
// $msg = "First line of text\nSecond line of text";

// // use wordwrap() if lines are longer than 70 characters
// $msg = wordwrap($msg,70);

// // send email
// var_dump(mail("junsayjohn02@gmail.com","My subject",$msg));


?>

<?php
// $to      = 'john.junsay@acidgreen.com.au';
// $subject = 'the subject';
// $message = 'hello';
// $headers = 'From: junsayjohn01@gmail.com' . "\r\n" .
//     'Reply-To: junsayjohn02@gmail.com' . "\r\n" .
//     'X-Mailer: PHP/' . phpversion();

// mail($to, $subject, $message, $headers);
?> 

<?php 
   var_dump(mail('john.junsay@acidgreen.com.au', 'test', 'you done that'));
   // echo 'ok'; // I use this to check that script is end the execution 
?>

<?PHP
// $sender = 'junsayjohn01@gmail.com';
// $recipient = 'john.junsay@acidgreen.com.au';

// $subject = "php mail test xxxxxxxxxxx";
// $message = "php test message xxxxxxxxxxx";
// $headers = 'From:' . $sender;

// if (mail($recipient, $subject, $message, $headers))
// {
//     echo "Message accepted";
// }
// else
// {
//     echo "Error: Message not accepted";
// }
?>
<?php 

// ini_set( 'SMTP', 'smtp.gmail.com' ); // must be set to your own local ISP
// ini_set( 'smtp_port', '25' ); // assumes no authentication (passwords) required 
// ini_set( 'sendmail_from', 'junsayjohn01@gmail.com' ); // can be any e-mail address, but must be set

// $to = 'recipient@example.com'; // the address that will receive the e-mail
// $subject = 'This is the subject of the e-mail';
// $body = "This is the message body of the e-mail";

// $headers = 'MIME-Version: 1.0' . PHP_EOL; // PHP_EOL automatically inserts \r or \n or \r\n as appropriate
// $headers .= 'Content-type: text/plain; charset=iso-8859-1' . PHP_EOL; // for HTML e-mail, use text/html
// $headers .= 'From: junsayjohn01@gmail.com'; // This instruction overrides sendmail_from above. IMPORTANT: do not include PHP_EOL here

// var_dump(mail( $to, $subject, $body, $headers )); // sends the e-


