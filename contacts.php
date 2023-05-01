<?php
// function to filter user inputs
function filterName($field)
{
    $field = filter_var(trim($field),FILTER_SANITIZE_STRING);
    // Validate user name
    if(filter_var($field,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/"[a-zA-Z\s]+"/")))){
        return $field;
    }else{
        return FALSE;
    }
}
function filterEmail($field){
    // Validate the email address
    $field = filter_var(trim($field),FILTER_SANITIZE_EMAIL);
    if(filter_var($field,FILTER_VALIDATE_EMAIL)){
        return $field;
    }else{
        return FALSE;
    }
}
function filterString($field){
    // Sanitize String
    $field = filter_var(trim($field),FILTER_SANITIZE_STRING);
    if(!empty($field)){
        return $field;
    }else{
        return FALSE;
    }
}

// Define variables and initialize with empty values
$nameErr = $emailErr = $messageErr = "";
$name = $email = $subject = $message = "";
// processing from data when form is submitted
if($_SERVER["REQUEST_METHOD"]=="POST"){
if(empty($_POST["name"])){
    $nameErr = "Please enter your name.";
}else{
    $name = filterName($_POST["name"]);
    if($name == FALSE){
        $nameErr = "Please enter a valid name.";
    }
}
// validate email address
if(empty($_POST["email"])){
    $emailErr = 'Please enter your email address';
}else{
    $email = filterEmail($_POST["email"]);
    if($email == FALSE){
        $emailErr = 'Please enter a valid email address';
    }
}

// validate message
if(empty($_POST["subject"])){
    $subject = "";
}else{
   $subject = filterString($_POST["subject"]);
}

// validate user comment
if(empty($_POST["message"])){
    $messageErr = 'Please enter your comment';
}else{
    $message = filterString($_POST["message"]);
    if($message == FALSE){
        $messageErr = 'Please enter a valid comment';
    }
}

// check input errors before sending email
if(empty($nameErr) && empty($emailErr) && empty($messageErr)){
    $to = 'webmaster@example.com';
    // create email headers
    $headers = "From:".$email."\r\n".
    'Reply-To:'.$email."\r\n".
    'X-Mailer: PHP/'.phpversion();
    // sending email
    if(mail($to,$subject,$message,$headers)){
        echo'<p class="success"> Your message has been sent successfully!</p>';
    }else{
        echo'<p class="error"> Unable to send email. Please try again!</p>';
    }
}else{
  echo $nameErr." ".$emailErr." ".$messageErr;
}
}
?>