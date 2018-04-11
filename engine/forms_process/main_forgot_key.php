<?php



//Проверим на доступ

if(!defined('CASINOENGINE')) { die("Нет доступа!<script>location.href='/';</script>"); }
	$востановление_key 	= $_POST['key'];
	$востановление_key_фильтер = preg_match("/^[A-Za-z0-9]{1,64}$/", $востановление_key);
	$востановление_key_GET 	= $_GET['key'];
	$востановление_key_GET_фильтер = preg_match("/^[A-Za-z0-9]{1,64}$/", $востановление_key_GET);
	if ( $востановление_key == '') { $error .= 'Ключь не введён!'; } else
		{ if ($востановление_key_фильтер == false ) { $error .= 'Ключь не корректен!';} }
	if ($востановление_key_GET != '' and $востановление_key_GET_фильтер == false ) { $error .= 'Ключь не корректен!';}
	if ( $востановление_key_GET != '' and $востановление_key_GET_фильтер == true )
	{
		//Востанавливаем ключь генерируем новый пароль сами, меняем и отправлем на email пользователю
		//Проверим заказывал ли пользователь ключь
		$key_user_query = @mysql_fetch_array(@mysql_query("SELECT * FROM clients WHERE key_reset='".filter($востановление_key_GET)."'"));
		if ( $key_user_query != '' and $key_user_query != 0 )
		{
			//Генерируем 8ми значный новый пароль
			$new_pass = @new_pass();
			//Первращаем в md5, для базы
			$new_pass_md5 = md5($new_pass);
			//Меняем пароль в безе
			@mysql_query("UPDATE clients SET pass='".$new_pass_md5."' WHERE key_reset='".filter($востановление_key_GET)."'");
			//Берём логин от этого аккаунта
			$user_login_query =	@mysql_fetch_array(@mysql_query("SELECT * FROM clients WHERE key_reset='".$востановление_key_GET."'"));
			$user_login = $user_login_query['login'];
			$user_email = $user_login_query['email'];
			//Затираем ключь
			@mysql_query("UPDATE clients SET key_reset='' WHERE login='".filter($user_login)."'");
			//Отсылаем письмо
			//Отошлем письмо о регистрации
		    $установки_запрос = mysql_fetch_array(mysql_query("SELECT * FROM casino_settings"));
			$от_email = $установки_запрос['emailadmin'];
			$priority = 3;
			$format="text/html";
			$msg .= 'Здравствуйте, '.$user_login.',<br>';
			$msg .= 'Данное письмо содержит новую информацию для доступа к вашему игровому аккаунту:<br>';
			$msg .= '<br>';
			$msg .= 'Логин   : '.$user_login.'<br>';
			$msg .= 'Пароль  : '.$new_pass.'<br>';
			$msg .= '<br>';
			$msg .= '---------------------<br>';
			$msg .= 'С Наилучшими Пожеланиями,<br>';
			$msg .= 'Администрация Интернет-казино '.$установки_запрос['siteadress'].'<br>';
			@mail($user_email, 'Новый пароль для сайта: '.$установки_запрос['siteadress'], $msg, "From: $от_email\nContent-Type:$format;charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: $priority\nX-Mailer:Casino mail v2");
			//Информируем пользователя и скидываем на страничку с логином и паролем
			echo "<script> alert('Новый пароль, отправленн вам на email указанный при регистрации!');</script>";
			echo '<script>location.href="/'.$_SESSION['language'].'/login";</script>';
			die() or exit();
		} else { $error .= 'Укажите верный ключь!'; }
	}
	if ( $востановление_key != '' and $востановление_key_фильтер == true )
	{
		//Востанавливаем ключь генерируем новый пароль сами, меняем и отправлем на email пользователю
		//Проверим заказывал ли пользователь ключь
		$key_user_query = @mysql_fetch_array(@mysql_query("SELECT * FROM clients WHERE key_reset='".filter($востановление_key)."'"));
		if ( $key_user_query != '' and $key_user_query != 0 )
		{			//Генерируем 8ми значный новый пароль			$new_pass = @new_pass();
			//Первращаем в md5, для базы
			$new_pass_md5 = md5($new_pass);
			//Меняем пароль в безе
			@mysql_query("UPDATE clients SET pass='".$new_pass_md5."' WHERE key_reset='".filter($востановление_key)."'");
			//Берём логин от этого аккаунта
			$user_login_query =	@mysql_fetch_array(@mysql_query("SELECT * FROM clients WHERE key_reset='".filter($востановление_key)."'"));
			$user_login = $user_login_query['login'];
			$user_email = $user_login_query['email'];
			//Затираем ключь
			@mysql_query("UPDATE clients SET key_reset='' WHERE login='".filter($user_login)."'");
			//Отсылаем письмо

			//Отошлем письмо о регистрации

		    $установки_запрос = mysql_fetch_array(mysql_query("SELECT * FROM casino_settings"));

			$от_email = $установки_запрос['emailadmin'];

			$priority = 3;

			$format="text/html";



			$msg .= 'Здравствуйте, '.$user_login.',<br>';

			$msg .= 'Данное письмо содержит новую информацию для доступа к вашему игровому аккаунту:<br>';

			$msg .= '<br>';

			$msg .= 'Логин   : '.$user_login.'<br>';

			$msg .= 'Пароль  : '.$new_pass.'<br>';

			$msg .= '<br>';

			$msg .= '---------------------<br>';

			$msg .= 'С Наилучшими Пожеланиями,<br>';

			$msg .= 'Администрация Интернет-казино '.$установки_запрос['siteadress'].'<br>';



			@mail($user_email, 'Новый пароль для сайта: '.$установки_запрос['siteadress'], $msg, "From: $от_email\nContent-Type:$format;charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: $priority\nX-Mailer:Casino mail v2");



			//Информируем пользователя и скидываем на страничку с логином и паролем

			echo "<script> alert('Новый пароль, отправленн вам на email указанный при регистрации!');</script>";

			echo '<script>location.href="/'.$_SESSION['language'].'/login";</script>';

			die() or exit();



		} else { $error .= 'Укажите верный ключь!'; }

	}



	if ($error != '') { include(ENGINE_DIR."forms/main_forgot_key.php");}

?>

