<?php

//create connection
$connection = mysqli_connect('localhost', 'root', '');

//check connection
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}

$select_db = mysqli_select_db($connection, 'selemene');
if (!$select_db){
     die("Database Selection Failed" . mysqli_error($connection));
}



// Escape user inputs for security
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['icnum']) && isset($_POST['event']) ) {
	$firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$phone = mysqli_real_escape_string($connection, $_POST['phone']);
	$icnum = mysqli_real_escape_string($connection, $_POST['icnum']);
    $event = mysqli_real_escape_string($connection, $_POST['event']);

}

// send confirmation email


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
    $mail->Subject = 'Confirmation Email from Sunrise Senior';
    $mail->Body    = 'You are receiving this email because you just signed up for event: ' . '"' . $event .'"'.' at Sunrise Senior.
    Thank you for registering for an event at Sunrise Senior! Your registration is confirmed.
    For any enquires, please email selemene.ssp6@gmail.com or call 6222 6111. Have a nice day :)';
//     $mail->AltBody = 'If you did not sign up for the above mentioned event, please let us know.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

	// print_r($_POST);
	// $firstname = $_POST['firstname'];
	// $email = $_POST['email'];
	// $message = "Hello " . $firstname . "! You have successfully signed up for an event.";

	// $to = $email;
	// $headers = "Confirmation Email from Sunrise Senior";

	// if( mail($to, $subject, $message, $headers)){
	// 	echo "Confirmation email sent!";
	// }


// attempt insert query execution
$sql = "INSERT INTO details (firstname, lastname, email, phone, icnum, event) VALUES ('$firstname', '$lastname', '$email', '$phone', '$icnum', '$event')";
if(mysqli_query($connection, $sql)){
    echo "Records added successfully.";
    redirect("./index.html",true);

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);

}


// close connection
mysqli_close($connection);



//redirect page function
function redirect($url, $permanent){
	header('Location: '. $url, true, $permanent ? 301:302);
	exit();
}


?>
