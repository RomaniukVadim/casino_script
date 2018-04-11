<?php
//Проверим на доступ
if(!defined('CASINOENGINE')) { die("Нет доступа!<script>location.href='/';</script>"); }
?>
                                                                        <h1 style="color: rgb(255, 255, 255); font-size: 1.5em; line-height: 1em; font-weight: normal; margin-bottom: 23px; visibility: visible;">Регистрация</h1>

<? if($error != '') { echo "<font style='font-size:10px;color:#FF4500'>Ошибка: ".$error."</font><br>"; } ?>


<form name="reg_your_details" method="post" action="/<?=$_SESSION['language']?>/open_account">
	<b>Логин:</b><br>
	<input name="login" type="text" class='input' id="uid" style="width:180px;" value="<?  echo htmltext($регистрация_логин); ?>" maxlength="12"><br>
	Логин может стоятять из цифр и букв английского алфавита. От трёх до двадцати символов.<br>Пример: JohnDoe54
    <br><br>
	<b>Пароль:</b><br>
	<input name="password" type="password" class='input' id="pass1" style="width:180px;" value="<?  echo htmltext($регистрация_пароль); ?>"><br>
	Пароль может стоятять из цифр и букв английского алфавита. От трёх до двадцати символов.
	<br><br>
	<b>Повторите пароль:</b><br>
	<input name="password2" type="password" class='input' id="pass2" style="width:180px;" value="<?  echo htmltext($регистрация_пароль2); ?>">
	<br><br>
	<b>Ваш email адрес:</b><br>
	<input name="email" type="text" maxLength='30' class='input' id="email" style="width:180px;" value="<?  echo htmltext($регистрация_email); ?>"><br>
	Пример: yourname@email.com
	<br><br>
	Код:<br>
	<img id="captcha" src="/engine/securimage/securimage_show_example.php " alt="CAPTCHA Image" />
	<br>
	<a href="#" onclick="document.getElementById('captcha').src = '/engine/securimage/securimage_show_example.php?' + Math.random(); return false">Обновить изображение</a><br>
	Введите Код:<br>
	<input class='input' type="text" name="captcha_code" size="10" maxlength="8" value="<?=htmltext($капча)?>" />
 	<br><br>

	<input id="reg_your_details_submit" style="float:left; width:200px;color:#000000;" type="submit" value="Зарегестрироватся">
</form>

                                                                        <br class="clear">

