<?php
    $recepient = "cycyrbita@mail.ru";
    $siteName = "HTML-шаблон";

    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $town = trim($_POST["town"]);
    $count = trim($_POST["count"]);
    $message = "Имя: $name \nТелефон: $phone \nСтрана: $town \nКоличество упаковок: $count";

    $pagetitle = "Заявка с сайта \"$siteName\"";
    mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
?>