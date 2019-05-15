<?php
    
    $error = '';
    $name = '';
    $email = '';
    $subject = '';
    $message = '';

    function clean_text($string){
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);

    }

    if(isset($_POST["submit"])){
        if(empty($_POST["name"])){
            $error .= '<p><lable class="text-danger">SVP donner votre Nom</label></p>';
        }
        else{
            $name = clean_text($_POST["name"]);
            if(!preg_match("/^[a-zA-Z]*$/",$name)){
                $error .= '<p><lable class="text-danger">Seulement des lettres
                           qui sont autorisé pour votre Nom</label></p>';
            }
        }
        if(empty($_POST["email"])){
            $error .= '<p><lable class="text-danger">SVP donner votre émail</label></p>';

        }
        else{
            $email = clean_text($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error .= '<p><lable class="text-danger">Votre émail est invalide
                           rééssayer avec un émail valide</label></p>';

            }

        }
        if(empty($_POST["subject"])){
            $error .= '<p><lable class="text-danger">Donner un object 
                         à votre émail</label></p>';

        }
        else{
            $subject = clean_text($_POST["subject"]);
        }
        
        if(empty($_POST["message"])){
            $error .= '<p><lable class="text-danger">Message est obligatoire </label></p>';

        }
        else{
            $message = clean_text($_POST["message"]);

        }

        if($error != ''){
            require './PHPMailer/PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = 'smtp.gmail.com:';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = "thirdiallo@gmail.com";
            $mail->Password = "tairoudiallo91";
            $mail->SMTPSecure = 'ssl';
            $mail->setFrom = ("thirdiallo@gmail.com");
            $mail->FromName = $_POST["name"];
            $mail->addAddress("thirdiallo@gmail.com");
            $mail->addCC($_POST["email"], $_POST["name"]);
            $mail->IsHTML(true);
            $mail->Subject = $_POST["subject"];
            $mail->Body = $_POST["message"];
            if ($mail->send()) {
                $error = '<label class="text-success"> Votre message est bien
                           envoyé et merci de mavoir contacter </label>';
    
            } else {
                $error = '<label class="text-success"> Votre message né pas
                           envoyé rééssayer encore </label>';
            }

            $name = '';
            $email = '';
            $subject = '';
            $message = '';

        }
       // header('location:contact.php');

    }


/* if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){

      date_default_timezone_set('Etc/UTC');
    

      require './PHPMailer/PHPMailer/PHPMailerAutoload.php';

      //Create a new PHPMailer instance
      $mail = new PHPMailer;

      //Tell PHPMailer to use SMTP
      $mail->isSMTP();


     

      //Enable SMTP debugging
      // 0 = off (for production use)
      // 1 = client messages
      // 2 = client and server messages
      $mail->SMTPDebug = 2;

      //Ask for HTML-friendly debug output
      $mail->Debugoutput = 'html';
      
     // $mail->SMTPAutoTLS = false;

      //Set the hostname of the mail server
      $mail->Host = 'smtp.gmail.com:';
      // use
      // $mail->Host = gethostbyname('smtp.gmail.com');
      // if your network does not support SMTP over IPv6

      //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
      $mail->Port = 465;

      //Set the encryption system to use - ssl (deprecated) or tls
      $mail->SMTPSecure = 'ssl';

      //Whether to use SMTP authentication
      $mail->SMTPAuth = true;

      //Username to use for SMTP authentication - use full email address for gmail
      $mail->Username = "thirdiallo@gmail.com";

      //Password to use for SMTP authentication
      $mail->Password = "tairoudiallo91";

      //Set who the message is to be sent from
      $mail->setFrom($email, $name);

      //Set an alternative reply-to address
      //$mail->addReplyTo('no-replyto@Webmaster.info', 'Tairou');

      //Set who the message is to be sent to
      $mail->addAddress('thirdiallo@gmail.com', 'Webmaster');

      //Set the subject line
      $mail->Subject = $subject;

      //Read an HTML message body from an external file, convert referenced images to embedded,
      //convert HTML into a basic plain-text alternative body
      $mail->msgHTML('<!DOCTYPE html><html><body>'.$message.'</body></html>');

      //Replace the plain text body with one created manually
      $mail->AltBody = $subject;

      //Attach an image file
     // $mail->addAttachment('images/phpmailer_mini.png');

      //send the message, check for errors
      if (!$mail->send()) {
          echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
          echo "Message sent!";
          //Section 2: IMAP
          //Uncomment these to save your message in the 'Sent Mail' folder.
          #if (save_mail($mail)) {
          #    echo "Message saved!";
          #}
      }
      header('location:contact.php');

  }else{
     echo "SVP entrer toutes les informations";
    }
} */

 /* function save_mail($mail) {
  //You can change 'Sent Mail' to any other folder or tag
  $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

  //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
  $imapStream = imap_open($path, $mail->Username, $mail->Password);

  $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
  imap_close($imapStream);

  return $result;
  } 
 */
?>