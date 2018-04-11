<?php
//Проверим на доступ
if(!defined('CASINOENGINE')) { die("Нет доступа!<script>location.href='/';</script>"); }
?>

<h1 style="color: rgb(255, 255, 255); font-size: 1.5em; line-height: 1em; font-weight: normal; margin-bottom: 23px; visibility: visible;">Востановление пароля.</h1>
<? if($error != '') { echo "<font style='font-size:10px;color:#FF4500'>Ошибка: ".htmltext($error)."</font><br>"; } ?>

<form name="form" action="/<?=$_SESSION['language']?>/forgot_key" method="post">
	Введите ключ высланный вам на email:<br>
	<input class='input' style="width:200px;" type="text" name="key" size="25" maxlength="64" value="<?=htmltext($востановление_key)?>" />
	<br><br>
	<INPUT type="submit" value="Востановить" name="submit" style="font-weight:bold;color:#000;">
</form>

