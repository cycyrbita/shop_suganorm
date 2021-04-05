<?php
    // Файлы phpmailer
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    require 'phpmailer/Exception.php';

    // Переменные, которые отправляет пользователь
    $country = $_POST['country'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Формирование самого письма
    $title = "Заявка Dialine";
    $body = "
        <h2>Заявка Dialine</h2>
        <b>Страна:</b> $country
        <br>
        <b>Имя:</b> $name
        <br>
        <b>Телефон:</b> $phone
    ";

    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        $mail->isSMTP();   
        $mail->CharSet = "UTF-8";
        $mail->SMTPAuth   = true;
        //$mail->SMTPDebug = 2;
        $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

        // Настройки вашей почты
        $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
        $mail->Username   = 'mexicosend@gmail.com'; // Логин на почте
        $mail->Password   = 'xpzwqtaydbgjyvat'; // Пароль на почте (пароль приложения)
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('mexicosend@gmail.com', 'Dialine'); // Адрес самой почты и имя отправителя

        // Получатель письма
        $mail->addAddress('mexicozayavki@gmail.com');  

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
?>