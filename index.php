<?php
  session_start();
  

  define("CASINOENGINE", true);
  define("ROOT_DIR", dirname(__FILE__));
  
  define("ROOT_PATH", dirname(__FILE__) . "/");
  define("ENGINE_DIR", ROOT_DIR . "/engine/");
 
  require_once(ENGINE_DIR . "config/config.php");
  require_once(ENGINE_DIR . "core/functions.php");
  require_once(ENGINE_DIR . "core/mysql_log.php");
  require_once(ENGINE_DIR . "core/partner.php");
  require_once(ENGINE_DIR . "core/gamemode.php");
  require_once(ENGINE_DIR . "core/language.php");
  require_once(ENGINE_DIR . "core/online.php");
  
  
  if(isset($_GET['ref'])) {
  	$ref = mysql_real_escape_string($_GET['ref']);
  	mysql_query("UPDATE clients SET hits = (hits + 1) WHERE login = '".$ref."'");
  	$_SESSION['ref'] = $ref;
  	/*
  	if($_SESSION['ref2'] !== $_GET['ref']) {
  		echo $_SESSION['ref2'].'/'.$_GET['ref'].'<br>';
  		//Защита от накрутки счётчика через обновление страницы  		
  		$_SESSION['ref2'] = $ref;
  		echo $ref.'<br>';
  		echo $_SESSION['ref2'].'<br>';
  		mysql_query("UPDATE clients SET hits = (hits + 1) WHERE login = '".$ref."'");
  		echo "UPDATE clients SET hits = (hits + 1) WHERE login = '".$ref."'<br>";
  		die($_SESSION['ref2'].'/'.$_GET['ref']);
  
  	}
  	*/
  }
  
  

  define("TEMPLATE_DIR", ROOT_DIR . "/templates/" . $template . "/" . $_SESSION['language']);
  define("TEMPLATE", "templates/" . $template . "/" . $_SESSION['language']);
  define("LANGUAGE_SITE", $_SESSION['language']);
  require_once(ENGINE_DIR . "core/templates.php");
  require_once(ENGINE_DIR . "core/page.php");
  
  /*
  if (!isAjaxRequest()){
	  echo "<div style=\"font-size: 10px; line-height: 1em;\"><center>Пользователей онлайн:" . $_SESSION['online'] . "</center>";
	  echo "</div></body></html>";
  }
  */
  
  function isAjaxRequest() {
	return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
  }
?>
