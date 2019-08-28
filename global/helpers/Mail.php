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
            $mail = new PHPMailer(true);

            try {
                $mail = new PHPMailer(true);

                $mail->isSMTP();// Set mailer to use SMTP
                $mail->CharSet = "utf-8";// set charset to utf8
                $mail->SMTPAuth = true;// Enable SMTP authentication
                $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted

                $mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
                $mail->Port = 25;// TCP port to connect to
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->isHTML(true);// Set email format to HTML

                $mail->Username = 'popmoviesshop@gmail.com';// SMTP username
                $mail->Password = 'shopOnline@2018$';// SMTP password

                $mail->setFrom('popmoviesshop@gmail.com', 'John Smith');//Your application NAME and EMAIL
                $mail->Subject = 'Test';//Message subject
                $mail->MsgHTML('HTML code');// Message body
                $mail->addAddress('alexgve7@gmail.com', 'User Name');// Target email


                $mail->send();
                echo 'Message has been sent';
                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
?>