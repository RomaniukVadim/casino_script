<?php
//Проверим на доступ
if(!defined('CASINOENGINE')) { die("Нет доступа!<script>location.href='/';</script>"); }

	//Читаем post массив
	$error = '';
	$регистрация_логин 	 = $_POST['login'];
	$регистрация_пароль  = $_POST['password'];
	$регистрация_пароль2 = $_POST['password2'];
	$регистрация_email	 = $_POST['email'];
	$регистрация_капча	 = $_POST['captcha_code'];
	$confirm             = (isset($_POST['confirm']) && 'on' == $_POST['confirm']);
 	$error = '';

	$регистрация_логин_фильтер = preg_match('/^[A-Za-z0-9]{3,20}$/', $регистрация_логин);
	$регистрация_пароль_фильтер = preg_match('/^[A-Za-z0-9]{6,20}$/', $регистрация_пароль);
	$регистрация_пароль2_фильтер = preg_match('/^[A-Za-z0-9]{6,20}$/', $регистрация_пароль2);
	$регистрация_капча_фильтер = preg_match('/^[A-Za-z0-9]{2,20}$/', $регистрация_капча);
	$регистрация_email_фильтер = preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9]+[a-zA-Z0-9_-]*)+$/', $регистрация_email);

	if ($регистрация_логин == '') 				 			{ $error .= 'Не введён логин<br>';}  else
		{ if ($регистрация_логин_фильтер == false) 			{ $error .= 'Не корректный логин<br>';} }
	if ($регистрация_пароль == '') 			 				{ $error .= 'Не введён пароль<br>';} else
		{ if ($регистрация_пароль_фильтер == false) 		{ $error .= 'Не корректный пароль<br>';} }
	if ($регистрация_пароль2 == '') 						{ $error .= 'Не введён повторный пароль<br>';} else
		{ if ($регистрация_пароль2_фильтер == false) 		{ $error .= 'Не корректный повторный пароль<br>';}
		  if ($регистрация_пароль != $регистрация_пароль2)  { $error .= 'Пароль и повторный пароль несовпадают<br>';}
		}
	if ($регистрация_email == '') 				 			{ $error .= 'Не введён почтовый адрес<br>';} else
		{
		  if ($регистрация_email_фильтер == false) 			{ $error .= 'Не корректный почтовый адрес<br>';} }

	if ($регистрация_капча == '') 			 				{ $error .= 'Не введён код<br>';} else
		{ if ($регистрация_капча_фильтер == false) 			{ $error .= 'Не корректный код<br>';} else {

			include_once (ENGINE_DIR.'/securimage/securimage.php');
			$securimage = new Securimage();

			$капча_проверка = $securimage->check($регистрация_капча);
			if ($регистрация_капча == '') { $error .= 'Введите пожалуйста код на изображении<br>';}   else {
		           if ($капча_проверка == false) { $error .= 'Неправльно введён код<br>'; }
			}
			}
		}
	if (!$confirm) {
		$error .= 'Вы не согласились с условиями казино Zodiac<br />';
	}

	//Если ошибок небыло и все данные корректны регаем
	if (
	$error == '' and
	$регистрация_логин_фильтер == true and
	$регистрация_пароль_фильтер == true and
	$регистрация_пароль2_фильтер == true and
	$регистрация_email_фильтер == true and
	$регистрация_капча_фильтер == true and
	$confirm
	) 	{
		//Регаем акк
	    //echo 'Регаем';



		$ip = $_SERVER['REMOTE_ADDR'];


		//Тут надо проверить на то не существует ли уже пароль перед тем как писать в базу.
		$проверка_на_дублирование = @mysql_num_rows(mysql_query("select login from clients where login='".filter($регистрация_логин)."' or email='".filter($регистрация_email)."'"));
		if ($проверка_на_дублирование != '0') { $error .= 'Аккаунт с такими данными уже занят!'; }

		if ($error == '' and $проверка_на_дублирование == '0' ) {

		$mysqltime = date ("Y-m-d H:i:s");

		$fun_reg_query = @mysql_fetch_array(mysql_query("select * from casino_settings"));
		$fun_reg = $fun_reg_query['fun_reg'];
		$regBonus = $fun_reg_query['bonusreg'];
		
		//определение реферера
		$referer = -1;		
		if(isset($_SESSION['ref'])) {
			$referer = mysql_real_escape_string($_SESSION['ref']);
				
			$refId0 = mysql_fetch_row(mysql_query("SELECT id FROM clients WHERE login = '$referer';"));
			$refId = $refId0[0];
			
			//Апдейт статистики
			mysql_query("UPDATE clients SET registers = registers + 1 WHERE login = '".$referer."';");
		}
		
		if($refId == '')
			$refId = -1;
		
		//Определим парнёра - если установленн
		$pid=intval($HTTP_COOKIE_VARS["pid"]);
		//Если кука не установленна, то пишем 0 - аккаунт без парнера
		if ($pid == '' and $pid == 0) { $pid = 0; }
		//Пишем в базу данные регистрации
		
		@mysql_query("INSERT INTO clients
		(`id` ,`login`, `pass`, `email`, `cashfun`, `cash`, `ip_reg`, `ip_last`, `date`, `fun_date`, `status`, `admin_notes`, `operator_notes`,`status_message`, `key_reset`, `referer`) VALUES
		(NULL,'".$регистрация_логин."','".md5($регистрация_пароль)."', '".$регистрация_email."', '".$fun_reg."', '".$regBonus."' , '".filter($ip)."', '".filter($ip)."', '".$mysqltime."', '".$mysqltime."', '1', 'Заметка Админа', 'Заметка опера', '0', '', '".$refId."')");
/*
@mysql_query("INSERT INTO clients
		(`login`, `pass`, `email`, `cashfun`, `cash`, `ip_reg`, `ip_last`, `date`, `fun_date`, `status`, `admin_notes`, `operator_notes`,`status_message`, `key_reset`, `referer`) VALUES
		('".$регистрация_логин."','".md5($регистрация_пароль)."', '".$регистрация_email."', '".$fun_reg."', '".$regBonus."' , '".filter($ip)."', '".filter($ip)."', '".$mysqltime."', '".$mysqltime."', '1', 'Заметка Админа', 'Заметка опера', '0', '', '".$refId."')");*/
		//Ставим сессии и перенаправляем
		$индефикатор_сессии = 'CASINOSOFT' . $_SERVER['HTTP_USER_AGENT'] . $_SERVER['HTTP_ACCEPT_CHARSET'];
		$индефикатор_сессии = md5($индефикатор_сессии . session_id());

		$_SESSION['login'] = $регистрация_логин;
		$_SESSION['sid'] = $индефикатор_сессии;

		//Отошлем письмо о регистрации
		    $установки_запрос = mysql_fetch_array(mysql_query("SELECT * FROM casino_settings"));
			$от_email = $установки_запрос['emailcasino'];
			$priority = 3;
			$format="text/html";

			$msg .= 'Здравствуйте, '.$регистрация_логин.',<br>';
			$msg .= 'Данное письмо содержит информацию для доступа к вашему игровому аккаунту:<br>';
			$msg .= '<br>';
			$msg .= 'Логин   : '.htmltext($регистрация_логин).'<br>';
			$msg .= 'Пароль  : '.htmltext($регистрация_пароль).'<br>';
			$msg .= '<br>';
			$msg .= 'Вход на сайт находится: <a href="http://'.$установки_запрос['siteadress'].'/ru/login">Здесь</a><br>';
			$msg .= '---------------------<br>';
			$msg .= 'С Наилучшими Пожеланиями,<br>';
			$msg .= 'Администрация Интернет-казино '.$установки_запрос['siteadress'].'<br>';


			mail($регистрация_email, 'РЕГИСТРАЦИЯ В КАЗИНО', $msg, "From: $от_email\nContent-Type:$format;charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: $priority\nX-Mailer:CasinoEngine mail v1.0");

			
			if (isAjaxRequest()) {
				unset($pid);
				exit(json_encode(array('status' => 0, 'message' => '', 'url' => '/' . $_SESSION['language'] . '/games')));
			}
			
			echo '<script>location.href="/'.$_SESSION['language'].'/games";</script>';
			unset($pid);
			die() or exit();


		}

		}

	if (isAjaxRequest()) {
		if ($error) {
			$error = iconv('windows-1251', 'utf-8', $error);
			exit(json_encode(array('status' => 1, 'message' => $error, 'url' => '')));
		}
	}
		
	//Если данныех нет то первый раз загрузили страничку, error = '';
	if ($регистрация_логин == '' and $регистрация_пароль == '' and $регистрация_пароль2 =='' and $регистрация_email == '' and $регистрация_капча == '')
	{ $error = ''; }

	include(ENGINE_DIR."forms/main_open_account.php");
?>