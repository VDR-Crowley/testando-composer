<?php

require __DIR__ . '/../lib_ext/autoload.php';

use Vdrcrowley\Notification\Email;

//var_dump($email);


$newEmail = new Email(
  '2',
  'mail.gustavoweb.me',
  'sender@gustavoweb.me',
  'teste@123',
  'tls',
  '587',
  'gustavo@gustavoweb.me',
  'Equipe GustavoWeb'
);

//var_dump($newEmail);


$newEmail->sendMail(
  'Testando Envio do email',
  "<p>Testando o <strong>Envio de Email</strong></p>",
  'gustavo@gustavoweb.me',
  'Gustavo Web',
  'vandodosreis2001@gmail.com',
  'Vando dos Reis',
);