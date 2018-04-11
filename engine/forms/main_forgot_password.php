<?php
//Проверим на доступ
if(!defined('CASINOENGINE')) { die("Нет доступа!<script>location.href='/';</script>"); }
?>
<h1 style="color: rgb(255, 255, 255); font-size: 1.5em; line-height: 1em; font-weight: normal; margin-bottom: 23px; visibility: visible;">Востановление пароля.</h1>
<? if($error != '') { echo "<font style='font-size:10px;color:#FF4500'>Ошибка: ".htmltext($error)."</font><br>"; } ?>
<form name="form" action="/<?=$_SESSION['language']?>/forgot_password" method="post">

	<b>Введите ваш логин на сайте</b><br>
	<INPUT class='input' style='width:200px;' name='forgot_login' maxLength='30' value="<?=htmltext($востановление_логин)?>"><br>
	<b>или Ваш почтовый адресс указанный при регистрации</b><br>
	<INPUT class='input' style='width:200px;' name='forgot_email' maxLength='30' value="<?=htmltext($востановление_email)?>"><br>
	<b>Код</b><br>
	<img id="captcha" src="/engine/securimage/securimage_show_example.php "><br><a href="#" onclick="document.getElementById('captcha').src = '/engine/securimage/securimage_show_example.php?' + Math.random(); return false">Обновить изображение</a><br>
	<b>Введите код</b><br>
	<input class='input' style="width:200px;" type="text" name="captcha_code" size="25" maxlength="8" value="<?=htmltext($востановление_капча)?>" />
	<br><br>
	<INPUT type="submit" value="Востановить" name="submit" style="font-weight:bold;color:#000;">
</form>
