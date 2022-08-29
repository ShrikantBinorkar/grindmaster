<?php 
// Include PHPMailer library files
require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer\PHPMailer\PHPMailer(true);

if(isset($_POST['full_name'])){
//echo 'called for feedback';

$fullname = ucwords($_POST['full_name']);
    $company_name= $_POST['company_name'];
    $email_id = $_POST['email_id'];
    $contact_no = $_POST['mobile_no'];
$mail_body = "";
$from_email = "donotreply@grindmaster.us";
$from_name = "Do Not Reply";
try {
//Server settings
//    $mail->isSMTP();                                            // Send using SMTP
//     $mail->Host       = 'mail.grindmaster.us';                      // Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//     $mail->Username   = 'donotreply@grindmaster.us';              // SMTP username
//     $mail->Password   = 'e^eSgmx1Y&1T';                          // SMTP password
//     $mail->Port       = 587;                                    // TCP port to connect to
//     $mail->SMTPDebug = 2;
// smtp-mail.outlook.com outlook.office365.com
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                      // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sb.work06@gmail.com';              // SMTP username
    $mail->Password   = 'ShrikantB@6991';                          // SMTP password
    $mail->Port       = 465;
    $mail->SMTPSecure = 'ssl';                                    // TCP port to connect to
    $mail->SMTPDebug = 2;

$mail->setFrom($from_email , $from_name );
    // $mail->addAddress('sales@grindmaster.us');
    $mail->addAddress('shrikantb@deveninfotech.in');
    //$mail->addAddress('shubhangi.ramekar@syscort.com');
$mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "New Enquiry";

$mail_body .= "Dear Admin,<br><br>You have New Enquiry with following details;<br><br>";
$mail_body .= "<b>Name :</b> $fullname<br><b>Contact Number :</b> $contact_no<br> <b>Email ID :</b> $email_id<br>";
    $mail_body .= "<b>Company Name :</b> $$company_name<br>";
    
    //$mail_body .= "<b>Feedback is :</b> $feedback_msg<br>";
    //echo $mail_body;
    $mail->Body    = $mail_body;
    $mail->send();
    echo '1';
    } catch (Exception $e) {
        echo '0'; //print_r($e);
    }
}


?>