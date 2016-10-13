<?
if(isset($_POST['number'])){
        $to = 'mail@test1.organica.pp.ua,alkv84@yandex.ru';
        $subject = 'Бронирование номера с Вашего сайта';
        $message = '
                <html>
                    <head>
                        <title>Бронирование номера с Вашего сайта</title>
                    </head>
                    <body>
                        <p><strong>Имя отправителя:</strong> '. $_POST['name'] .'</p>
                        <p><strong>Телефон отправителя:</strong> '. $_POST['number'] .'</p>
                        <p><strong>Дата вселения:</strong> '. $_POST['date'] .'</p>
                        <p><strong>На сколько дней:</strong> '. $_POST['days'] .'</p>
                        <p><strong>Количество человек:</strong> '. $_POST['people'] .'</p>
                        <p><strong>Выбранный номер:</strong> '. $_POST['room'] .'</p>
                        <div style="background: #eee; border: 1px solid #888; padding:15px;"><p><strong>Сообщение:</strong></p><p> '. $_POST['message'] . '</p></div>
                    </body>
                </html>';
        $headers  = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "From: VillaViktoria\r\n";
        mail($to, $subject, $message, $headers);
}