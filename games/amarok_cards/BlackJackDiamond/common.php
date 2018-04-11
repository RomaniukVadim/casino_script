<?php

$rules_url="./rules.html";    # ссылка где написанны правила игры
$help_url="./help.html";      # ссылка где написанна справка по казино
$bank_url="./bank.html";       # ссылка на аккаунт пользовател€
$gamelist_url="./ru/games/";  # ссылка на список игр

//include("./setup.php");


# —тарайтесь думать прежде чем редактирвоать следующие строки)

define("_CHANCE_DEFAULT_MAX", 12);
define("_CHANCE_DEFAULT_LEVEL", 7);
define("_AMAROK_DELITEL", 100);

session_start();

if ($_SESSION['mode'] == "fun")
{
    $_SESSION['dur'] = "fun";
}
else
{
    $_SESSION['dur'] = "wmr";
}

//ƒосутп тока скрипту
define ( 'CASINOENGINE', true );
include_once ("../../../engine/config/config_db.php");

if (defined("_GAME_NAME")) {
 $_SESSION['GAME_NAME']=_GAME_NAME;
}

$debug_filename="./debug.txt";

$game_configs=get_configs();
trace_var($game_configs, "game_configs");

function is_user () {
  if (isset($_SESSION['login'])) {
    if (mysql_num_rows(mysql_query("SELECT * FROM `clients` WHERE login='".$_SESSION['login']."'"))==1) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function user_balance () {
	if ($_SESSION['dur'] == "wmr")
	{
		$q=mysql_query("SELECT cash FROM `clients` WHERE login='".$_SESSION['login']."'");
		if (mysql_num_rows($q)==1)
		{
			list($cash)=mysql_fetch_array($q);
			return $cash;
		} else {
			return false;
		}
	}
	else
	{
		$q=mysql_query("SELECT `cashfun` FROM `clients` WHERE login='".$_SESSION['login']."'");
		if (mysql_num_rows($q)==1)
		{
			list($cash)=mysql_fetch_array($q);
			return $cash;
		} else {
			return false;
		}
	}
}

function user_add ($summa) {
     global $game_configs;
	if ($_SESSION['dur'] == "wmr")
	{
		  if (((is_user()) AND ($summa>0))/* AND (!$game_configs['testing'])*/) {
		    mysql_query("UPDATE `clients` SET cash=cash+'".$summa."' WHERE login='".$_SESSION['login']."'");
		  }
	}
	else
	{
		  if (((is_user()) AND ($summa>0)) /*AND (!$game_configs['testing'])*/) {
		    mysql_query("UPDATE `clients` SET cashfun=cashfun+'".$summa."' WHERE login='".$_SESSION['login']."'");
		  }
	}
}

function user_pay ($summa) {
     global $game_configs;
	if ($_SESSION['dur'] == "wmr")
	{
		  if (((is_user()) AND ($summa>0))/* AND (!$game_configs['testing'])*/) {
		    mysql_query("UPDATE `clients` SET cash=cash-'".$summa."' WHERE login='".$_SESSION['login']."'");
		  }
	}
	else
	{
		  if (((is_user()) AND ($summa>0)) /*AND (!$game_configs['testing'])*/) {
		    mysql_query("UPDATE `clients` SET cashfun=cashfun-".$summa." WHERE login='".$_SESSION['login']."'");
return "!!!!!!";
		  }
	}
}

function is_bank ($bid) {
  if ($bid!="") {
    $sql="SELECT * FROM `games_bank` WHERE id='".intval($bid)."'";
    trace_str($sql);
    $q=mysql_query($sql);
    if (mysql_num_rows($q)==1) {
      trace_str("'".$bid."' - is a bank.");
      return true;
    } else {
      trace_str("'".$bid."' - is not a bank.");
      return false;
    }
  } else {
    trace_str("'".$bid."' - is not a bank.");
    return false;
  }
}

function bank_balance ($bid) {
  if (is_bank($bid)) {
    $q=mysql_query("SELECT bank FROM `games_bank` WHERE id='".$bid."'");
    if (mysql_num_rows($q)==1) {
      $result=mysql_fetch_array($q);
      $result=round($result['bank'], 2);
      trace_str("bank('".$bid."')=".$result);
      return $result;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function bank_add ($bid, $summa, $profit_bank=false) {
     global $game_configs;
	if ($_SESSION['dur'] == "wmr")
	{
		  trace_str("bank_add('".$bid."', '".$summa."')");
		if ($profit_bank)
		{
		  if (((is_bank($bid)) AND ($summa>0)) /*AND (!$game_configs['testing'])*/) {
		    $sql="UPDATE `games_jp` SET jp=jp+'".$summa."' WHERE id='".$bid."'";
		    trace_str($sql);
		    mysql_query($sql);
		  }
		}
		else
		{
		  if (((is_bank($bid)) AND ($summa>0)) /*AND (!$game_configs['testing'])*/) {
		    $sql="UPDATE `games_bank` SET bank=bank+'".$summa."' WHERE id='".$bid."'";
		    trace_str($sql);
		    mysql_query($sql);
		  }
		}
	}
}

function bank_pay ($bid, $summa) {
     global $game_configs;
	if ($_SESSION['dur'] == "wmr")
	{
		  trace_str("bank_pay('".$bid."', '".$summa."')");
		  if (((is_bank($bid)) AND ($summa>0)) /*AND (!$game_configs['testing'])*/) {
		    $sql="UPDATE `games_bank` SET bank=bank-'".$summa."' WHERE id='".$bid."'";
		    trace_str($sql);
		    mysql_query($sql);
		  }
	}
}

function trace_str ($str) {
     global $debug_filename, $game_configs;
/*  if (($game_configs['debug']) AND ($str!="")) {
  	$fp=@fopen($debug_filename, "a");
  	if ($fp!==false) {
  	  fwrite($fp, date("d.m.Y H:i:s")."@".$_SERVER['REMOTE_ADDR'].":".$str."\r\n");
  	  fclose($fp);
    }
    $sql="INSERT INTO `amarok_game_debug` "
        ."(`date`, `client_addr`, `game_name`, `message`) "
        ."VALUES "
        ."('".date("Y-m-d H:i:s")."', INET_ATON('".$_SERVER['REMOTE_ADDR']."'), '".$_SESSION['GAME_NAME']."', '".addslashes($str)."')";
   // mysql_query($sql);
  }*/
}

function trace_var ($var, $title="") {
     global $game_configs;
  ob_start();
  print_r($var);
  $output=ob_get_contents();
  ob_end_clean();
  if ($title!="") {
    trace_str("====VARIABLE TRACE:".$title."====");
  } else {
    trace_str("====VARIABLE TRACE====");
  }
  $output=eregi_replace("\r", "", $output);
  $output=explode("\n", $output);
  foreach ($output as $out) {
    trace_str($out);
  }
  trace_str("====VARIABLE END====");
}

function get_configs () {
  $result=array();
/*  $sql="SELECT name, type, value_char, value_int, value_float FROM `amarok_game_configs` WHERE game_name='".$_SESSION['GAME_NAME']."'";
  $q=mysql_query($sql);
  while ($row=mysql_fetch_array($q)) {
    switch ($row['type']) {
      case "char":
      $result[$row['name']]=$row['value_char'];
      break;

      case "int":
      $result[$row['name']]=$row['value_int'];
      break;

      case "float":
      $result[$row['name']]=$row['value_float'];
      break;

      case "bool":
      if (strtolower($row['value_char'])=="true") {
        $result[$row['name']]=true;
      } else {
        $result[$row['name']]=false;
      }
      break;
    }
  }*/

  $sql="SELECT * FROM `games_bank` WHERE name='".$_SESSION['GAME_NAME']."'";
  $q=mysql_query($sql);
  if ($row=mysql_fetch_array($q))
  {
    $result['profit_percent']=$row['proc'];
    $result['win_chance']=$row['mode'];
    $sql="SELECT * FROM `games` WHERE name='".$_SESSION['GAME_NAME']."'";
    $q=mysql_query($sql);
    if ($row=mysql_fetch_array($q))
    {
      $result['game_bank']=$row['id_bank'];
      $result['profit_bank']=$row['id_jp'];
    }
  }

  return $result;
}

function write_stat ($allbet, $winall, $game_postfix="", $game_bank_id=null) {
     global $game_configs;
/*  if ($game_postfix!="") {
    $sql="INSERT INTO stat_game VALUES('NULL','". date("d.m.y")."','".date("H:i:s")."','".$_SESSION['login']."','".user_balance()."','".$allbet."','".$winall."','".$_SESSION['GAME_NAME']."_".$game_postfix."')";
    trace_str($sql);
    mysql_query($sql);
    $sql="INSERT INTO `game_stat` (`date`, login, balance, stav, win, game) VALUES ('".date("Y-m-d H:i:s")."', '".$_SESSION['login']."', '".user_balance()."', '".$allbet."','".$winall."','".$_SESSION['GAME_NAME']."_".$game_postfix."')";
    trace_str($sql);
    mysql_query($sql);
  } else {
    $sql="INSERT INTO stat_game VALUES('NULL','". date("d.m.y")."','".date("H:i:s")."','".$_SESSION['login']."','".user_balance()."','".$allbet."','".$winall."','".$_SESSION['GAME_NAME']."')";
    trace_str($sql);
    mysql_query($sql);
    $sql="INSERT INTO `game_stat` (`date`, login, balance, stav, win, game) VALUES ('".date("Y-m-d H:i:s")."', '".$_SESSION['login']."', '".user_balance()."', '".$allbet."','".$winall."','".$_SESSION['GAME_NAME']."')";
    trace_str($sql);
    mysql_query($sql);
  }
  if (is_null($game_bank_id)) {
    $game_bank_id=$game_configs['game_bank'];
  }
  $sql="INSERT INTO `amarok_game_statistics` "
      ."(`game_date`, `game_name`, `game_postfix`, `player_login`, `player_balance`, `bank_id`, `bank_balance`, `bet`, `win`) "
      ."VALUES "
      ."('".date("Y-m-d H:i:s")."', '".$_SESSION['GAME_NAME']."', '".$game_postfix."', '".$_SESSION['login']."', '".user_balance()."', '".$game_bank_id."', '".bank_balance($game_bank_id)."', '".$allbet."', '".$winall."')";
  trace_str($sql);
  mysql_query($sql);*/
}

function calculate_stat_average () {
     global $game_configs;
}

function calculate_game_stat_average () {
     global $game_configs;
/*  $q=mysql_query("SELECT `updated` FROM `amarok_game_statistics_average` WHERE `game_name`='".$_SESSION['GAME_NAME']."'");
  if (mysql_num_rows($q)==1) {
    list($updated)=mysql_fetch_array($q);

  } else {

  }*/
}

function calculate_player_stat_average () {
     global $game_configs;
}

function calculate_game_player_stat_average () {
     global $game_configs;
}

function print_var ($varname, $value=null) {
     global $game_configs;
  if (is_null($value)) {
    trace_str($varname);
    print $varname;
  } else {
    $str="&".$varname."=".$value;
    trace_str($str);
    print $str;
  }
}

function chance ($value=null, $max=null) {
  $result=-1;
  if (is_null($value)) {
    $value=_CHANCE_DEFAULT_LEVEL;
  } else {
  	$value=intval($value);
  }
  if (is_null($max)) {
    $max=_CHANCE_DEFAULT_MAX;
  } else {
  	$max=intval($max);
  }
  if ($value==$max) {
    trace_str("chance('".$value."')=FALSE");
    return false;
  } else {
    $result=my_rand(1, $value);
    if ($result==1) {
      trace_str("chance('".$value."')=TRUE");
      return true;
    } else {
      trace_str("chance('".$value."')=FALSE");
      return false;
    }
  }
}

function my_rand($min=null, $max=null) {
  if (is_null($min)) {
    $min=_MY_RAND_DEFAULT_MIN;
  }
  if (is_null($max)) {
    $max=_MY_RAND_DEFAULT_MAX;
  }
  mt_srand();
  return mt_rand($min, $max);
}