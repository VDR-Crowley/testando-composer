<?php

namespace Vdrcrowley\Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
  private $mail = \stdClass::class;

  /**
   * @throws Exception
   */
  public function __construct()
  {
    $this->mail = new PHPMailer(true);
    $this->mail->SMTPDebug = 2;
    $this->mail->isSMTP();
    $this->mail->Host = 'mail.gustavoweb.me';
    $this->mail->SMTPAuth = true;
    $this->mail->Username = 'sender@gustavoweb.me';
    $this->mail->Password = '123456';
    $this->mail->SMTPSecure = 'tls';
    $this->mail->Port = 587;
    $this->mail->CharSet = 'utf-8';
    $this->mail->setLanguage('br');
    $this->mail->isHTML(true);
    $this->mail->setFrom('gustavo@gustavoweb.me', 'Equipe', 'Gustavo Web');
  }

  /**
   * @throws Exception
   */
  public function sendMail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName): void
  {
    $this->mail->Subject = (string)$subject;
    $this->mail->Body = $body;

    $this->mail->addReplyTo($replyEmail, $replyName);
    $this->mail->addAddress($addressEmail, $addressName);

    try {

      $this->mail->send();

    } catch (\Exception $e) {
      echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
    }
    echo "Enviando email";
  }
}