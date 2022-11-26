<?php
if(isset($_POST['n']) && isset($_POST['e']) && isset($_POST['m']) ){
    $name = $_POST['n'];
    $email = $_POST['e'];
    $message = nl2br($_POST['m']);
    $to = "bode@olabodefolorunso.info";
    $from = $email;
    $subject = 'Contact Form Message';
    $message = '<b>Name:</b> '.$name.'  <br><b>Email:</b> '.$email.' <p>'.$message.'</p>';
    $headers = "From: $from\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    if( mail ($to, $subject, $message, $headers) ){
        echo "success";
    } else {
        echo "The Server failed to send your message. Please try again later.";
    }
}

?>