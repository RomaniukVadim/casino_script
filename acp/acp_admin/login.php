<?php
//Инициализация сессии и констант
session_start();
define("CASINOENGINE", true);
define("ROOT_DIR", dirname( __FILE__ )."/");
define("ADMIN_DIR", ROOT_DIR );
define("ENGINE_DIR", $_SERVER['DOCUMENT_ROOT']."/engine_acp");

//Загрузка конфигурации
require_once( ENGINE_DIR."/config/config.php" );

//Инициализация переменных
$pattern = "/^[A-Za-z0-9]{2,20}\$/D";
if(isset($_POST['login'])) $adm_login = $_POST['login']; else $adm_login='';
if(isset($_POST['password'])) $adm_pass = $_POST['password']; else $adm_pass='';
if(isset($_POST['password1'])) $adm_pass2 = $_POST['password1']; else $adm_pass2='';
if(isset($_POST['captcha_code'])) $adm_captcha = $_POST['captcha_code']; else $adm_captcha='';

//Инициализируем сообщение об ошибке
$error = "";
if (!$adm_login or !preg_match($pattern, $adm_login)) $error .= "Не правильно введён логин<br>";
if (!$adm_pass or !preg_match($pattern, $adm_pass)) $error .= "Не правильно введён пароль<br>";
if (!$adm_pass2 or !preg_match($pattern, $adm_pass2)) $error .= "Не правильно введён пароль 2<br>";

//Проверка captcha
if (!$adm_captcha) $error .= "Не введён код<br>";
else {
    include_once(ENGINE_DIR."/securimage/securimage.php" );
    $captcha_image = new Securimage();
    $check_captcha = $captcha_image->check($adm_captcha);
	if (!$check_captcha) $error .= "Неправльно введён код<br>";
}

//Вход пльзователя
if ($error == "") {
    $sql = mysql_query (
	"SELECT * FROM `casino_admin` 
	WHERE `login`='".mysql_escape_string($adm_login)."' 
	AND `pass`='".md5($adm_pass)."' 
	AND `pass2`='".md5($adm_pass2)."'");
    if ($adm_user = mysql_fetch_assoc($sql)) {
        $_SESSION['session_admin'] = $adm_user['login'];
        echo "<script>location.href=\"index.php\";</script>";
    } else $error .= "Ошибка! Неправильные данные.";
}

//Если все поля пусты не выводим ошибку
if (!$adm_login && !$adm_pass && !$adm_pass2 && !$adm_captcha) $error = "";

//Добавляем вид
include_once( ENGINE_DIR."/forms/login.php" );
?>
