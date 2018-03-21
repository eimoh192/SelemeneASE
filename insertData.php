<?php
$name = $_POST["name"];
$email = $_POST["email"];
$age = $_POST["age"];

$con = mysqli_connect("localhost","root","");
if(!$con){
  die ('Could not connect:'.mysql_error());
}

mysqli_select_db($con, "selemene");
$query = "INSERT INTO details(name,email,age) VALUES('$name','$email','$age')";

if(!mysqli_query($con,$query)){
trigger_error(mysqli_error($conn));
}
else{
echo "Data Inserted";
}

//###############################SEND EMAIL TO ELDERLY STARTS HERE ##################################################
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
  //  $mail->SMTPDebug = 1;                                 // Enable verbose debug output. (dont need to put this if don't want nonsense showing)
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'selemene.ssp6@gmail.com';                 // SMTP username
    $mail->Password = 'Selemene2018';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('selemene.ssp6@gmail.com', 'Sunrise Senior');
    $mail->addAddress($email);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
  //  $mail->addCC('cc@example.com');
  //  $mail->addBCC('bcc@example.com');

    //Attachments
  //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    //$mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Confirmation from Sunrise Senior';
    $mail->Body    = 'You are receiving this email because you just signed up for event "xxxx"
    at Sunrise Senior.
    Thank you for registering for an event at Sunrise Senior! Your registeration is confirmed.
    For any enquires, email to selemene.ssp6@gmail.com or call 6222 6111. Have a nice day :)';
//     $mail->AltBody = 'If you did not sign up for the above mentioned event, please let us know.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>
