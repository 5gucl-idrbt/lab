<?php


  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'pavankumard@idrbt.ac.in';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',  
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>



<!-- <?php
// if(isset($_POST['submit'])) {
//     $to = "pavankumard@idrbt.ac.in"; // recipient email address
//     $from = $_POST['email']; // sender email address
//     $subject = "Website Contact Form"; // email subject
//     $message = "Name: " . $_POST['name'] . "\n\nEmail: " . $_POST['email'] . "\n\nMessage: " . $_POST['message']; // email message
    
//     // headers
//     $headers = "From:" . $from . "\r\n";
//     $headers .= "Reply-To:" . $from . "\r\n";
//     $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
    
//     // send email
//     mail($to, $subject, $message, $headers);
    
//     // redirect to thank you page
//     header('Location: thank-you.html');
//     exit();
// }
?> -->

