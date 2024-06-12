<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Устанавливаем адрес получателя и тему письма
    $to = "bogulevsckij@yandex.by";
    $subject = "Новое сообщение с сайта";

    // Формируем тело письма
    $body = "Имя: $name\n";
    $body .= "Электронная почта: $email\n\n";
    $body .= "Сообщение:\n$message\n";

    // Устанавливаем заголовки письма
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n"; 

    // Отправляем письмо
    if (mail($to, $subject, $body, $headers)) {
        echo "Сообщение успешно отправлено!";
    } else {
        echo "Ошибка при отправке сообщения.";
    }
} else {
    echo "Некорректный метод отправки.";
}
?>