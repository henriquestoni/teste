<?php
require __DIR__.'/abaco/autoload.php';

use Notification\EMail;

$email = new Email();
$email->sendMail("Meu Teste", "<p>Email de <b>teste</b>.</p>", "rio@carnivalservice.com", "Toni H", "carnivalservice@gmail.com", "Testando");
var_dump($email);