<?php

//Проверим на доступ
if(!defined('CASINOENGINE')) { die("Нет доступа!<script>location.href='/';</script>"); }

	$поддержка_email		= $_POST['email'];
	$поддержка_тема			= $_POST['subject'];
	$поддержка_сообщение	= $_POST['message'];
	$поддержка_капча		= $_POST['captcha_code'];
	$error = '';

	$поддержка_email_фильтер  = preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9]+[a-zA-Z0-9_-]*)+$/', $поддержка_email);
	$поддержка_тема_фильтер	  = true;//preg_match('/^[!,.?A-Za-z0-9А-Яа-я ]{2,60}$/', $поддержка_тема);
	$поддержка_капча_фильтер  = preg_match('/^[A-Za-z0-9]{2,20}$/', $поддержка_капча);

	if ($поддержка_email == '') 					 			{ $error .= 'Не введён email<br>';}  else
	{ if ($поддержка_email_фильтер == false) 					{ $error .= 'Не корректный email<br>';} }
	if ($поддержка_тема == '') 					 				{ $error .= 'Не введена тема сообщения<br>';}  else
	{ if ($поддержка_тема_фильтер == false) 					{ $error .= 'Не корректная тема сообщения<br>';} }
	if ($поддержка_сообщение == '') 					 		{ $error .= 'Не введёно сообщение<br>';}

		if ($поддержка_капча == '') 				 			{ $error .= 'Не введён код<br>';}  else
		{ if ($поддержка_капча_фильтер == false) 				{ $error .= 'Не корректный код<br>';} else {
			include_once (ENGINE_DIR.'/securimage/securimage.php');
			$securimage = new Securimage();

			$капча_проверка = $securimage->check($поддержка_капча);
			if ($поддержка_капча == '') { $error .= 'Введите пожалуйста код на изображении<br>';}   else {
        		   if ($капча_проверка == false) { $error .= 'Неправльно введён код<br>'; }
			}
			}
		}

	//Если ошибок небыло и все данные корректны отсылаем сообщение
	if (
	$error == '' and
	$поддержка_email_фильтер == true and
	$поддержка_тема_фильтер == true and
	$поддержка_капча_фильтер == true
	) 	{
		if ($_SESSION['login'] != '') { $login_support = $_SESSION['login']; } else { $login_support = 'guest'; }
		$date = date ("Y-m-d");
		$time = date ("H:i:s");

		@mysql_query("INSERT INTO casino_messages
		(`id` ,`login`, `date`, `time`, `title`, `message`, `email`) VALUES
		(NULL,'".$login_support."','".$date."', '".$time."', '". mysql_escape_string($поддержка_тема)."', '".mysql_escape_string($поддержка_сообщение)."' , '".$поддержка_email."')");


		//Отправка сообщения админу
		//Берём email тех. поддержки
		//Отправляем

		        $установки_запрос = mysql_fetch_array(mysql_query("SELECT * FROM casino_settings"));
			$от_email = $установки_запрос['emailadmin'];
			$priority = 3;
			$format="text/html";
			$msg = htmltext($поддержка_сообщение).'<br>';
			$msg .= "\n\n\n--------------\n<br> Тех. Поддержка Интернет Казино ".sitename();
			mail($от_email, 'Вам сообщение: '.htmltext($поддержка_тема), $msg, "From: $поддержка_email\nContent-Type:$format;charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: $priority\nX-Mailer:Casino mail v2");

			echo "<script> alert('Ваше сообщение отправленно! Вам ответят в самое ближайшее время.'); window.history.back();</script>";

	}


	//Если данныех нет то первый раз загрузили страничку, error = '';
	if ($поддержка_email == '' and $поддержка_тема == '' and $поддержка_сообщение == '')
	{ $error = ''; }

	include(ENGINE_DIR."forms/main_support.php");
?>