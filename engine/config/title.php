<?php 
// Проверим на доступ
if (!defined('CASINOENGINE')) {
	die("Нет доступа!<script>location.href='/';</script>");
} 
// Берём название казино
$sitename_query = @mysql_fetch_array(@mysql_query("SELECT * FROM casino_settings"));

$sitename = strip_tags($sitename_query['sitename']);

if ($page_filter == true) {
	if ($_SESSION['language'] == 'ru') { // Гланые странички
		if ($page == 'index') {
			$title = $sitename;
		} 

		if ($page == 'login') {
			$title = 'Вход - ' . $sitename;
		} 

		if ($page == 'terms') {
			$title = 'Условия использования - ' . $sitename;
		} 

		if ($page == 'support') {
			$title = 'Служба поддержки - ' . $sitename;
		} 

		if ($page == 'forgot_password') {
			$title = 'Востановление пароля - ' . $sitename;
		} 

		if ($page == 'open_account') {
			$title = 'Регистрация - ' . $sitename;
		} 

		if ($page == 'games') {
			$title = 'Игры - ' . $sitename;
		} 

		if ($page == 'faq') {
			$title = 'Часто Задаваемые Вопросы - ' . $sitename;
		} 
		// Пользовательская часть
		if ($page == 'messages') {
			$title = 'Служба поддержки - ' . $sitename;
		} 

		if ($page == 'in') {
			$title = 'Пополнение счёта - ' . $sitename;
		} 

		if ($page == 'out') {
			$title = 'Вывод средств - ' . $sitename;
		} 
		
		if ($page == 'partner') {
			$title = 'Партнёрская программа - ' . $sitename;
		}		
	} 

	if ($_SESSION['language'] == 'en') {
		if ($page == 'index') {
			$title = 'Casino Megastart wm-scripts.ru';
		} 

		if ($page == 'login') {
			$title = 'Enter site - Casino Megastart wm-scripts.ru';
		} 
	} 
} 

?>