<?php

//Проверим на доступ
if(!defined('CASINOENGINE')) { die("Нет доступа!<script>location.href='/';</script>"); }

	$востановление_логин 	= $_POST['forgot_login'];
	$востановление_email	= $_POST['forgot_email'];
	$востановление_капча	= $_POST['captcha_code'];
	$востановление_тип      = '';
	//$email					= '';
	//$error 					= '';

	$востановление_логин_фильтер  = preg_match('/^[A-Za-z0-9]{2,20}$/', $востановление_логин);
	$востановление_email_фильтер  = preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9]+[a-zA-Z0-9_-]*)+$/', $востановление_email);
	$востановление_капча_фильтер = preg_match('/^[A-Za-z0-9]{2,20}$/', $востановление_капча);

	if ($востановление_логин == '' and $востановление_email == '') {
		$error .= 'Введите ваш логин или email!<br>';
	}
	if ($востановление_логин != '') {
			if ($востановление_логин_фильтер == false) 				{ $error .= 'Не корректный логин<br>';}
		}
    if ($востановление_email != '') {
			if ($востановление_email_фильтер == false) 				{ $error .= 'Не корректный email<br>';}
    	}


	if ($востановление_капча == '') 				 				{ $error .= 'Не введён код<br>';}  else
		{ if ($востановление_капча_фильтер == false) 				{ $error .= 'Не корректный код<br>';} else {
			include_once (ENGINE_DIR.'/securimage/securimage.php');
			$securimage = new Securimage();

			$капча_проверка = $securimage->check($востановление_капча);
			if ($востановление_капча == '') { $error .= 'Введите пожалуйста код на изображении<br>';}   else {
        		   if ($капча_проверка == false) { $error .= 'Неправльно введён код<br>'; }
			}
			}
		}

	//Проверм на пользователя
	if ( $востановление_логин_фильтер == true and $востановление_логин != '' and $капча_проверка == true)
	{
		$email_query = @mysql_fetch_array(@mysql_query("SELECT * FROM clients WHERE login='".filter($востановление_логин)."'"));
		$email = $email_query['email'];
		if ($email !=0 or $email != '') { $востановление_тип = 'login';}
	}

	//Проверм на email
	if ( $востановление_email_фильтер == true and $востановление_email != '' and $капча_проверка == true)
	{
		$email_query = @mysql_fetch_array(@mysql_query("SELECT * FROM clients WHERE email='".filter($востановление_email)."'"));
		$email = $email_query['email'];
		if ($email !=0 or $email != '') { $востановление_тип = 'email';}
	}

	//Если ошибок небыло и все данные корректны регаем
	if ( $error == '' and $email != '')
	{
		//Генерируем ативационный код md5(email+старый пароль)
		$key = md5($email_query['email'].$email_query['pass']);
		@mysql_query("UPDATE clients SET key_reset='".$key."' WHERE email='".filter($email)."'");
		//Посылаем ключь востановления на email

		    $установки_запрос = @mysql_fetch_array(@mysql_query("SELECT * FROM casino_settings"));
			$от_email = $установки_запрос['emailadmin'];
			$priority = 3;
			$format="text/html";
			$msg  = 'Вы запросили востановление пароля на сайте: '.$установки_запрос['siteadress'].'<br>';
			$msg .= 'Ваша <a href="http://'.$установки_запрос['siteadress'].'/ru/forgot_key&key='.$key.'">ссылка для восстановления пароля</a>, если вы запрашивали восстановление пароля то пожалуйста перейдите по указанный ссылке. Если нет, просим вас проигнорировать данное сообщение!.<br>';
			$msg .= "\n\n\n--------------\n<br> Тех. Поддержка Интернет Казино ".sitename();
			@mail($email, 'Востановление пароля: '.$установки_запрос['siteadress'], $msg, "From: $от_email\nContent-Type:$format;charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: $priority\nX-Mailer:Casino mail v2");

			echo "<script> alert('Инструкции по востановлению пароля, отправленны вам на email указанный при регистрации!');</script>";
			echo '<script>location.href="/'.$_SESSION['language'].'/forgot_key";</script>';
			die() or exit();

	}
	//Если поля пустые
	//Если данныех нет то первый раз загрузили страничку, error = '';
	if ($востановление_логин == '' and $востановление_email == '' and $востановление_капча == '')
	   { $error = ''; }

	include(ENGINE_DIR."forms/main_forgot_password.php");
?>
