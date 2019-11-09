<?php
    require("../vendor/autoload.php");
    use PHPMailer\PHPMailer\PHPMailer;
    function sendMail($to,$content){
        $name = $to["username"];
        $mail = new PHPMailer();
        $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->Username = "1610972@hcmut.edu.vn";
        $mail->Password = "Hauhuynh";
        $mail->SMTPAuth = true;
        $mail->From = $mail->Username;
        $mail->FromName = "TemplateTM";
        try {
            $mail->addAddress("hauhuynh66@gmail.com", $name);
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            var_dump($e->getMessage());
        }
        $mail->isHTML(true);
        $mail->Subject = "Your new password";
        $mail->Body = "<i>Your new password is ".$content."</i>";
        $mail->AltBody = "Your new password is "."$content";

        try {
            if (!$mail->send()) {
                return -1;
            } else {
                return 1;
            }
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            var_dump($e->getMessage());
        }
    }