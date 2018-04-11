<?php 
// Проверим на доступ
if (!defined('CASINOENGINE')) {
	die("Нет доступа!<script>location.href='/';</script>");
} 
// Уровень ошибок
error_reporting(0);
$language_default = 'ru'; //Язык по умолчанию для сайта
$apache_geoip = false; //Определение страны посетителя если geoip модуль для апача включен то автоматом, иначе язык выставляется в ручную
$template = 'casinovulkan'; //Шаблон сайта
$path = '/kazino/'; //Пусть к папке 


// Если Отладка то true иначе false
$debug = true;
$notlocal = false;
$demo = 'demologin';
// Подключим базу
require_once('config_db.php');

?>