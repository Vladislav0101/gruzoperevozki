
<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Формирование самого письма
$title = "Заявка с transport-logistics.by";
$body = "
<h2>Новое письмо</h2>
<b>Имя:</b> $name<br>
<b>Номер телефона:</b> $phone<br><br>
<b>Сообщение:</b><br>$message
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.mail.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'perevozki.minskd@mail.ru'; // Логин на почте
    // $mail->Password   = 'dima1324perevoz'; // Пароль на почте
    $mail->Password   = 'wkaMqhcQDAWSQsu9ujuW'; // Пароль на почте

    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('perevozki.minskd@mail.ru', 'Transport.logistics'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('bogulevsckij@yandex.by');  

  // Отправка сообщения
  $mail->isHTML(true);
  $mail->Subject = $title;
  $mail->Body = $body;    

  // Проверяем отравленность сообщения
  if ($mail->send()) {$result = "success";} 
  else {$result = "error";}
} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);