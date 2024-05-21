<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

// Підключення необхідних класів PHPMailer
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

// Створення об'єкту PHPMailer
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ua', 'phpmailer/language/');
$mail->IsHTML(true);

// Встановлення адреси та імені відправника
$mail->setFrom('busenko777@gmail.com', 'Бусенко');

// Додавання адреси отримувача
$mail->addAddress('busenko777@gmail.com');

// Встановлення теми листа
$mail->Subject = 'Вітаю, Вам прийшов запит.';

// Створення тіла листа
$body = '<h1>Лист пропозиція! </h1>';
if(!empty($_POST['user_name'])){
    $body .= '<p><strong>Від кого ПІБ:</strong> ' . $_POST['user_name'] . '</p>';
}
if(!empty($_POST['mail'])){
    $body .= '<p><strong>E-mail:</strong> ' . $_POST['mail'] . '</p>';
}
if(!empty($_POST['textQ'])){
    $body .= '<p><strong>Повідомлення: </strong>' . $_POST['textQ'] . '</p>';
}

// Додавання тіла листа
$mail->Body = $body;

// Відправлення листа
if (!$mail->send()) {
    $message = 'Помилка';
} else {
    $message = 'Дані надіслані!';
}
$response = ['message' => $message];

// Виведення результату у форматі JSON
header('Content-type: application/json');
echo json_encode($response);

// Повернення на головну сторінку за допомогою JavaScript
 $link = "index.html";
  header('Location: ' . $link);
?>