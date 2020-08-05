<?php
include "./storage/PHPMailer-master/src/PHPMailer.php";
include "./storage/PHPMailer-master/src/Exception.php";
include "./storage/PHPMailer-master/src/OAuth.php";
include "./storage/PHPMailer-master/src/POP3.php";
include "./storage/PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Functions
{
    public static function filter($str)
    {
        $str = trim($str);
        $str = htmlspecialchars($str);
        $str = stripslashes($str);
        return $str;
    }
    public static function sendMail($html,$to)
    {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'djblach@gmail.com';                 // SMTP username
            $mail->Password = '0989839428';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->CharSet="UTF-8";
            $mail->setFrom('djblach@gmail.com', 'Có đơn hàng mới');
            $mail->addAddress($to, 'mail');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Thông báo';
            $mail->Body    = $html;
            $mail->AltBody = '';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
