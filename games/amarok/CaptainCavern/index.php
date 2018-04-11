<?php

define("_GAME_NAME", "CaptainCavern");

include("../core/engine.php");

//print_r($_SESSION);
if (!Game::isUser()) {
  header("Location: /");
  die();
}
?>
<html>
<head>
<title>Игры Amarok - Captain Cavern</title>
</head>
<body marginheight="0" marginwidth="0"><embed type="application/x-shockwave-flash" src="http://www.new_casino/games/amarok/CaptainCavern/CaptainCavern.swf" name="plugin" height="100%" width="100%">
</body>
</html>
