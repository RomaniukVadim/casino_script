<?php
//Проверим на доступ
if(!defined('CASINOENGINE')) { die("Нет доступа!<script>location.href='/';</script>"); }
?>

                                                                        <h1 style="color: rgb(255, 255, 255); font-size: 1.5em; line-height: 1em; font-weight: normal; margin-bottom: 23px; visibility: visible;">Вход на сайт!</h1>

<? if ($_SESSION['sid'] == '' or $_SESSION['login'] == '') {

	if($error != '') { echo "<font style='font-size:10px;color:#FF4500'>Ошибка: ".htmltext($error)."</font><br>"; }
?>

<?=$redirect?>

<form name="form" action="/<?=$_SESSION['language']?>/login" method="post">

	<b><?=$lang['login']?></b><br>
	<INPUT class='input' style='width:200px;' name='login' maxLength='50' <? if($логин != '') { echo 'value="'.htmltext($логин).'"';} ?>><br>
	<b><?=$lang['password']?></b><br>
	<INPUT class='input' style='width:200px;' name='password' type='password' maxLength='12' <? if($пароль != '') { echo 'value="'.htmltext($пароль).'"';} ?>><br>
	<b><?=$lang['sec_code']?></b><br>
	<img id="captcha" src="/engine/securimage/securimage_show_example.php "><br><a href="#" onclick="document.getElementById('captcha').src = '/engine/securimage/securimage_show_example.php?' + Math.random(); return false">Обновить изображение</a><br>
	<b><?=$lang['enter_sec_code']?></b><br>
	<input class='input' style="width:200px;" type="text" name="captcha_code" size="25" maxlength="6" value="<?=htmltext($капча)?>" />
	<br><br>
	<INPUT type="submit" value="Войти" name="submit" style="font-weight:bold;color:#000;">
</form>
<? } else {
	//Иначе сообщаем что вход был осуществлён
	echo 'Вы уже вошли.Чтобы зайти нужно сначало выйти <a href="/?logout">exit</a>';
	}
?>


