<?php
namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class Email
 * @package Notification
 */
class Email{
    /** @var PHPMailer */
    private $mail = \stdClass::class;

    /**
     * Email constructor.
     * @throws Exception
     */
    public function __construct($smtpDebug, $host, $userName, $password, $port, $setFromMail, $setFromUser){
        $this->mail= new PHPMailer(true);
        $this->mail->SMTPDebug = $smtpDebug;                      // Enable verbose debug output
        $this->mail->isSMTP();                                            // Send using SMTP
        $this->mail->Host       = $host;                    // Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->mail->Username   = $userName;                     // SMTP username
        $this->mail->Password   = $password;                               // SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $this->mail->CharSet = "utf-8";
        $this->mail->setLanguage("br");
        $this->mail->isHTML(true);
        $this->mail->setFrom($setFromMail, $setFromUser);
    }

    /**
     * @param $subject
     * @param $body
     * @param $replyEmail
     * @param $replyName
     * @param $addessEmail
     * @param $addressName
     * @throws Exception
     */
    public function sendMail($subject, $body, $replyEmail, $replyName, $addessEmail, $addressName){
        $this->mail->Subject = (string)$subject;
        $this->mail->Body = $body;
        $this->mail->addReplyTo($replyEmail,$replyEmail);
        $this->mail->addAddress($addessEmail.$addressName);
        try {
            $this->mail->send();
        }catch (\Exception $exception){
            echo "Erro ao enviar o email: {$this->mail->ErrorInfo} {$exception->getMessage()}";
        }
    }
}