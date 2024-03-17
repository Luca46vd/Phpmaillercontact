
<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (!empty($_POST)) {
    extract($_POST);
    $valide = true;
    if (empty($nom)) {
        $valide = false;
        $erreurnom = "Vous n'avez pas rempli le champ nom";
    }
        if (empty($phone)) {
            $valide = false;
            $erreurphone = "Vous n'avez pas rempli le champ numéro de téléphone";
    }
    if (!preg_match("/^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]{2,3}$/i", $email)) {
        $valide = false;
        $erreurmail = "Votre email n'est pas valide";
     
    }
    if (empty($email)) {
        $valide = false;
        $erreurmail = "Vous n'avez pas rempli le champ mail";
    }

    if (empty($message)) {
        $valide = false;
        $erreurmessage = "Vous n'avez pas rempli le champ message";

    }

    $honeypot = $_POST["firstname"];
    if ($valide) {
                    $message = "Ce message provient du formulaire de contact de votre site <br>
                    Nom : " . $_POST['nom'] . " <br>
                    Numero : ". $_POST['phone'] ." <br>
                    Email : " . $_POST['email'] . " <br>
                    Message : " . $_POST['message'];
                    
        if (count($_FILES['file']['tmp_name']) != 0) {
            
                  //required files
            
                    $message = "Ce message provient du formulaire de contact de votre site <br>
                    Nom : " . $_POST['nom'] . " <br>
                    Numero : ". $_POST['phone'] ." <br>
                    Email : " . $_POST['email'] . " <br>
                    Message : " . $_POST['message'];
            
                    $mail = new PHPMailer(true);
                    
                    //Server settings
                    $mail->isSMTP();                              //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;             //Enable SMTP authentication
                    $mail->Username   = 'luca.vidiri2005@gmail.com';   //SMTP write your email
                    $mail->Password   = 'fnbftkefdmkojojv';      //SMTP password
                    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
                    $mail->Port       = 465;                                    
            
                    //Recipients

                    $mail->setFrom('lucareseausocial@gmail.com', $_POST["name"]);
                    $mail->addAddress('luca.vidiri2005@gmail.com');     //Add a recipient email  
                    $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email
                    
                    //multiple file attachment
                    for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i] ); 
                    }
            
                    //Content
                    $mail->isHTML(true);               //Set email format to HTML
                    $mail->Subject = 'Message provenant de votre formulaire contact'. $_POST["name"];   // email subject headings
                    $mail->Body    = $message; //email message
                        
                    // Success sent message alert
                    $mail->send();
              
          
            }
            else 
            {
                mail('luca.vidiri2005@gmail.com','Message provenant de votre formulaire contact',$message, 'luca.vidiri2005@gmail.com');
            }

        }

    }
?>