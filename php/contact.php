<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$comments = $_POST['comments'];

$mailheader = "From:".$name."<".$email.">\r\n";

$recipient = "contact@skillshowcase.ml";

mail($recipient, $subject, $comments, $mailheader) 
or die("Error!");

echo "Thank You!";

?>