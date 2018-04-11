<?php
/* Движок для игр Amarok
 * специально для Casino-Engine.ru
 * совместимость php5.*
 */

define('CASINOENGINE', true);
include_once('../../../engine/config/config_db.php');
mysql_connect($dbhost,$dbuname,$dbpass);
mysql_select_db($dbname);

//Инициализация
session_start();
$rules_url="./rules.html";    		// ссылка где написанны правила игры
$help_url="./help.html";      		// ссылка где написанна справка по казино
$bank_url="./bank.html";       		// ссылка на аккаунт пользователя
$gamelist_url="./casino.html";  	// ссылка на список игр

define("_CHANCE_DEFAULT_MAX", 12);
define("_CHANCE_DEFAULT_LEVEL", 7);
define("_AMAROK_DELITEL", 100);
if(defined("AMAROK_GAME_NAME")) $_SESSION['GAME_NAME']=AMAROK_GAME_NAME;
Game::getConfig();

//API
class Game {
	private static $cache=array();
	public static $config=array();
	
	//Приватный конструктор
	private function __construct() {}
	private function __clone() {}
	
	//Узнаем текущего пользователя
	public static function isUser($user=NULL) {
		if(is_array(self::$cache['user'])) return true;
		if(!$user and isset($_SESSION['login'])) $user = $_SESSION['login'];
		if($user) {
	   		$sql = mysql_query("SELECT * FROM `clients` WHERE `login`='".$user."'");
	   		if($sql) {
	   			self::$cache['user']=mysql_fetch_assoc($sql);
	   			return true;
	   		} else return false;
   		} else return false;
    }
    
    //Узнаем баланс пользователя
    public static function userBalance() {
    	if(!self::isUser()) return false;
    	$user=self::$cache['user'];
		switch($_SESSION['mode']) {
			case 'fun': return $user['cashfun']; break;
			case 'wmr': return $user['cash']; break;
			default: return false;
		}
	}
	
	//Повышаем баланс пользователя
	public static function userAdd($cash) {
		if(!self::isUser()) return false;
		$user=self::$cache['user'];
		switch($_SESSION['mode']) {
			case 'fun': 
				mysql_query("UPDATE `clients` SET `cashfun`=`cashfun`+\"{$cash}\" WHERE `id`=\"{$user['id']}\""); 
				self::$cache['user']['cashfun']+=$cash;
				return true;
			break;
			case 'wmr':
				mysql_query("UPDATE `clients` SET `cash`=`cash`+\"{$cash}\" WHERE `id`=\"{$user['id']}\"");
				self::$cache['user']['cash']+=$cash;
				return true;
			break;
			default: return false;
		}
  	}
  	
  	//Понижаем баланс пользователя
  	public static function userPay($cash) {
		if(!self::isUser()) return false;
		$user=self::$cache['user'];
		switch($_SESSION['mode']) {
			case 'fun': 
				mysql_query("UPDATE `clients` SET `cashfun`=`cashfun`-\"{$cash}\" WHERE `id`=\"{$user['id']}\""); 
				self::$cache['user']['cashfun']-=$cash;
				return true;
			break;
			case 'wmr':
				mysql_query("UPDATE `clients` SET `cash`=`cash`-\"{$cash}\" WHERE `id`=\"{$user['id']}\"");
				self::$cache['user']['cash']-=$cash;
				return true;
			break;
			default: return false;
		}
  	}
  	
  	//Проверяем $id банка
	public static function isBank() {
		if(is_array(self::$cache['bank'])) return true;
		if($_SESSION['mode']=='fun') $id=self::$config['id_funbank'];
		elseif($_SESSION['mode']=='wmr') $id=self::$config['id_bank'];
		if($id) {
			$sql=mysql_query("SELECT * FROM `games_bank` WHERE `id`=\"{$id}\"");
			if($sql) {
				self::$cache['bank']=mysql_fetch_assoc($sql);
				return true;
			} else return false;
		} else return false;
	}
	
	//Проверяем наличие средств в банке
	public static function bankBalance() {
		if(!self::isBank()) return false;
		return self::$cache['bank']['bank'];
	}
	
	//Вносим средства в банк
	public static function bankAdd ($cash) {
		if(!self::isBank()) return false;
		if($_SESSION['mode']=='fun') $id=self::$config['id_funbank'];
		elseif($_SESSION['mode']=='wmr') $id=self::$config['id_bank'];
		mysql_query("UPDATE `games_bank` SET `bank`=`bank`+\"{$cash}\" WHERE `id`=\"{$id}\"");
		self::$cache['bank']['bank']+=$cash;
		return true;
	}
	
	//Получаем средства из банка
	public static function bankPay($cash) {
		if(!self::isBank()) return false;
		if($_SESSION['mode']=='fun') $id=self::$config['id_funbank'];
		elseif($_SESSION['mode']=='wmr') $id=self::$config['id_bank'];
		mysql_query("UPDATE `games_bank` SET `bank`=`bank`-\"{$cash}\" WHERE `id`=\"{$id}\"");
		self::$cache['bank']['bank']-=$cash;
		return true;
	}
	
	//Получаем конфигурацию игры
	public static function getConfig() {
		if(isset(self::$config['name'])) return true;
		if($name=$_SESSION['GAME_NAME']) {
			$sql=mysql_query("SELECT * FROM `games` WHERE `name`=\"{$name}\"");
			if($sql) {
				self::$config=mysql_fetch_assoc($sql);
				return true;
			} else return false;
		} else return false;
	}

	//Запись статистики
	public static function writeStat($bet, $win) {
		if(!self::isBank() or !self::isUser()) return false;
		$user=self::$cache['user'];
		$bank=self::$cache['bank'];
		switch($_SESSION['mode']) {
			case 'wmr': $cash=$user['cash']; break;
			case 'fun': $cash=$user['cashfun']; break;
		}
		$date=date('d.m.y', time());
		mysql_query("INSERT INTO `games_stats` (`data`, `time`, `login`, `cash`, `bank`, `bet`, `win`, `game`, `mode`) VALUES (\"{$date}\",NOW(),\"{$user['login']}\", \"{$cash}\", \"{$bank['bank']}\", \"{$bet}\", \"{$win}\", \"{$_SESSION['GAME_NAME']}\", \"{$_SESSION['mode']}\")");
	}
}


//Вывод значений
function printVar($varname, $value=null) {
	if (is_null($value)) echo $varname;
	else echo "&".$varname."=".$value;
}

//Расчет шанса
function chance($value=null, $max=null) {
	$result=-1;
	if (is_null($value)) $value=_CHANCE_DEFAULT_LEVEL;
	else $value=intval($value);
	if (is_null($max)) $max=_CHANCE_DEFAULT_MAX;
	else $max=intval($max);
	if ($value==$max) return false;
	else $result=myRand(1, $value);
    if ($result==1) return true;
    else return false;
}

//Расчет случайного значения
function myRand($min=null, $max=null) {
	if(is_null($min)) $min=_MY_RAND_DEFAULT_MIN;
	if(is_null($max)) $max=_MY_RAND_DEFAULT_MAX;
	mt_srand();
	return mt_rand($min, $max);
}
?> 
