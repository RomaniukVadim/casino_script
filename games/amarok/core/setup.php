<?php
define('CASINOENGINE', true);

include_once('../../../engine/config/config_db.php');
mysql_connect($dbhost,$dbuname,$dbpass);
mysql_select_db($dbname);
