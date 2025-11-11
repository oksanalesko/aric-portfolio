<?php
// Налаштування відправки
require 'config.php';

//Від кого лист
$mail->setFrom('some@gmail.com', 'Letter from site "Arik"'); // Вказати потрібний E-mail
//Кому відправити
$mail->addAddress(''); // Вказати потрібний E-mail
//Тема листа
$mail->Subject = 'Hi! This is test letter from site "Arik"';

//Тіло листа
$body = '<h1 style="color: #333;font-family: var(--font-secondary);font-size: 24px;margin-block-end: 20px;">Welcome to our site!</h1>';

if (trim(!empty($_POST['name']))) {
	$body .= '<p style="color: #352a54;font-family: var(--font-primary);font-size: 18px;margin-block-end: 10px;">Name: ' . $_POST['name'] . '</p>';
}
if (trim(!empty($_POST['email']))) {
	$body .= '<p style="color: #352a54;font-family: var(--font-primary);font-size: 18px;margin-block-end: 10px;">Email: ' . $_POST['email'] . '</p>';
}
if (trim(!empty($_POST['message']))) {
	$body .= '<p style="color: #352a54;font-family: var(--font-primary);font-size: 18px;margin-block-end: 10px;">Message: ' . $_POST['message'] . '</p>';
}

/*
	//Прикріпити файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//шлях завантаження файлу
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузимо файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото у додатку</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

$mail->Body = $body;

//Відправляємо
if (!$mail->send()) {
	$message = 'Error';
} else {
	$message = 'Data sent successfully!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
