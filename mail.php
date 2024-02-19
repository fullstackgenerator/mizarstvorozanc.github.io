
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 require 'PHPMailer/Exception.php';
 require 'PHPMailer/PHPMailer.php';
 require 'PHPMailer/SMTP.php';

 function send_reg_mail($email,$name,$mail_body){
         $mail = new PHPMailer(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
//Enable SMTP debugging.
        // $mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
        $mail->isSMTP();
//Set SMTP host name
        $mail->Host = "";
//Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "";
$mail->Password = "";
//If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "";
//Set TCP port to connect to
        $mail->Port = "";

        $mail->From = "";
        $mail->FromName = $name;

        $mail->addAddress($email, $name);

        $mail->isHTML(true);

        $mail->Subject = "Novo sporocilo";
        $mail->Body = $mail_body;

        try {
            if($mail->send()){
                ?>
                <script>
                alert('Vaše sporočilo je bilo uspešno poslano! / Your message has been sent successfully!');
                window.location.assign('index.html');
                </script>
                <?php
            }
        } catch (Exception $e) {
            return "Mailer Error: " . $mail->ErrorInfo;
        }
 }

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $mail_body = 'Ime : '.$name.'<br/><br/>E-pošta : '.$email.'<br/><br/>Telefon : '.$phone.'<br/><br/>Zadeva : '.$subject.'<br/><br/>Sporočilo : '.$message;
    send_reg_mail('info@epicdev.si',$name,$mail_body);

}

?>
