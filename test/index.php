<?php
require __DIR__ . '../abaco/autoload.php';

use Notification\EMail;

$email = new Email(2, "mail.host.ok", "youUser", "youPass", "587", "from@email.ok", "From Name");
$email->sendMail("Meu Teste", "<p>Email de <b>teste</b>.</p>", "reply@mail.ok", "Name Reply", "emailadress@mail.ok", "Address Name");
var_dump($email);
