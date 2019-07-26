<?php
$to = "attackerbeater@gmail.com";
$subject = "My subject";
$txt = "Hello world! it works!";
$headers = "From: junsayjohn4@gmail.com" . "\r\n" . "CC: junsayjohn32@gmail.com";

var_dump(mail($to,$subject,$txt,$headers));
?>
