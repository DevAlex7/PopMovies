<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../../../Mail/src/Exception.php';
    require '../../../Mail/src/PHPMailer.php';
    require '../../../Mail/src/SMTP.php';
    
    class Mail{
        private  $from_email;
        private  $from_username;
        private  $to_email;
        private  $to_username;

        public function from($from_mail, $from_user){
            $this->from_email = $from_mail;
            $this->from_username = $from_user;
        }

        public function to($to_mail, $to_user){
            $this->to_email=$to_mail;
            $this->to_username=$to_user;
        }
        
        public function sendMail(){
            echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
            try {
                $mail = new PHPMailer();
                $mail->isSMTP(true);

                $mail->Host = 'smtp.gmail.com';

                $mail->Port = 465;

                $mail->SMTPSecure = 'ssl';

                $mail->SMTPAuth = true;

                $mail->SMTPDebug = 2;

                $mail->Username = '';

                $mail->Password = '';

                $mail->setFrom('popmoviesshop@gmail.com', 'Webmaster');

                $mail->addAddress('alexgve7@gmail.com');

                $mail->Subject = 'Hellooooo';

                $mail->msgHTML('adadad');

                if (!$mail->send()) {
                   $error = "Mailer Error: " . $mail->ErrorInfo;
                } 
                else {

                }
                

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
?>