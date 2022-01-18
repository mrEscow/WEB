<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
//require_once 'PHPMailer/SMTP.php';
//require_once 'config.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru','PHPMailer/language');
$mail->IsHTML(true);

// От кого письмо
$mail->setFrom('escowxbox@mail.ru', 'VEEEEE!');
// Кому отправлять
$mail->addAddress('escowxbox@mail.ru');
// Тема писльма
$mail->Subject = 'Привет! Это Я!!!';

// Тело письма
$body = '<h1>Встречайте супер пупер письмо!</n1>'

if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
}

if(trim(!empty($_POST['email']))){
    $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
}

if(trim(!empty($_POST['message']))){
    $body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
}

$mail->Body = $body;

// Отправляем
if(!$mail->send()){
    $message = 'Ошибка';
} else {
    $message = 'Данные отправлены!';
}

$response = ['message'=> $message];

header('Contex-type: application/json');
echo json_encode($response);
/*
function Send($subject, $to, $body){
    $mail = new PHPMailer();

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->CharSet = 'UTF-8';

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = 0;

    $mail->Host = smtp_host;
    $mail->Port = smtp_port;
    $mail->Username = smtp_user;
    $mail->Password = smtp_password;
    $mail->setFrom(smtp_user, smtp_from);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->msgHTML($body);
    $mail->send();
}
if (isset($_POST['to-camera'])){
    $body = "";
    $body .= "Куда нужно видеонаблюдение? " . urldecode($_POST['to-camera']) . "\r\n <br />";
    $body .= "Как вы думаете, сколько вам потребуется камер видеонаблюдения? " . urldecode($_POST['range'] . "(" . urldecode($_POST['camera-cnt']) . ")") . "\r\n <br />";
    $body .= "Сколько дней требуется хранить запись с камер? " . urldecode($_POST['record-cnt']) . "\r\n <br />";
    $body .= "Что для Вас важнее при записи видео? " . urldecode($_POST['vaznoe']) . "\r\n <br />";
    $body .= "В рамках какого бюджета хотите установить систему? " . urldecode($_POST['budjet']) . "\r\n <br />";
    $body .= "Требуется ли проведение интернета? " . urldecode($_POST['record-cnt-2']) . "\r\n <br />";
    $body .= "Скидка (подарок) " . urldecode($_POST['discount']) . "\r\n <br />";
    $body .= "Имя " . urldecode($_POST['name']) . "\r\n <br />";
    $body .= "Телефон " . urldecode($_POST['phone']) . "\r\n <br />";
    $body .= "Email " . urldecode($_POST['email']) . "\r\n <br />";
    Send("Заявка на расчет стоимости монтажа", mail_to, $body);
    echo ("<br><br><div class=\"alert alert-info text-center\">
    <h3>Спасибо!</h3>
    <p>Вы с вами свяжемся в самое ближайшее время</p>
    </div>");
}
if (isset($_POST['feedback-form-1'])){
    $body = "";
    $body .= "Куда нужно видеонаблюдение? " . urldecode($_POST['f1-to']) . "\r\n <br />";
    $body .= "Сколько нужно видеокамер? " . urldecode($_POST['f1-count']) . "\r\n <br />";
    $body .= "Сколько нужно времени? " . urldecode($_POST['f1-period']) . "\r\n <br />";
    $body .= "Телефон. " . urldecode($_POST['f1-phone']) . "\r\n <br />";
    $body .= "Email. " . urldecode($_POST['f1-email']) . "\r\n <br />";
    Send("Форма обратной связи", mail_to, $body);
    echo ("<br><br><div class=\"alert alert-info text-center\">
    <h3>Спасибо!</h3>
    <p>Вы с вами свяжемся в самое ближайшее время</p>
    </div>");
}
if (isset($_POST['feedback-form-2'])){
    $body = "";
    $body .= "Где находится объект? " . urldecode($_POST['f1']) . "\r\n <br />";
    $body .= "В какое время вам удобно? " . urldecode($_POST['f2']) . "\r\n <br />";
    $body .= "Ваш номер телефона.  " . urldecode($_POST['f3']) . "\r\n <br />";
    Send("Форма обратной связи", mail_to, $body);
    echo ("<br><br><div class=\"alert alert-info text-center\">
    <h3>Спасибо!</h3>
    <p>Вы с вами свяжемся в самое ближайшее время</p>
    </div>");
}
*/
?>