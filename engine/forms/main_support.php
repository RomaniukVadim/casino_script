<?php
//Проверим на доступ
if(!defined('CASINOENGINE')) { die("Нет доступа!<script>location.href='/';</script>"); }
?>
                                                                        <h1 style="color: rgb(255, 255, 255); font-size: 1.5em; line-height: 1em; font-weight: normal; margin-bottom: 23px; visibility: visible;">Служба поддержки!</h1>
<? if($error != '') { echo "<font style='font-size:10px;color:#FF4500'>Ошибка: ".$error."</font><br>"; } ?>

<form name="reg_your_details" method="post" action="/<?=$_SESSION['language']?>/support">
	<b>Ваш email адрес:</b><br>
	<input name="email" type="text" maxLength='30' class='input' id="email" style="width:180px;" value="<?  echo htmltext($поддержка_email); ?>"><br>
	Пример: yourname@email.com
    <br><br>
	<b>Тема:</b><br>
	<input name="subject" type="text" class='input' id="pass1" style="width:400px;" value="<?  echo htmltext($поддержка_тема); ?>">
	<br><br>
	<b>Ваш вопрос или сообщение:</b><br>
	<textarea class="input" style="width:400px;height:150px;" name="message" rows="5"><?  echo htmltext($поддержка_сообщение); ?></textarea><br><br>
	Код:<br>
	<img id="captcha" src="/engine/securimage/securimage_show_example.php " alt="CAPTCHA Image" />
	<br>
	<a href="#" onclick="document.getElementById('captcha').src = '/engine/securimage/securimage_show_example.php?' + Math.random(); return false">Обновить изображение</a><br>
	Введите Код:<br>
	<input class='input' type="text" name="captcha_code" size="10" maxlength="8" value="<?=htmltext($поддержка_капча)?>" />
 	<br><br>

	<input id="reg_your_details_submit" style="float:left; width:200px;color:#000000;" type="submit" value="Отправить сообщение">
</form>

                                                                        <br class="clear">

