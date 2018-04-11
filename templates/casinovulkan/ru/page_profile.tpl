<form name="reg_your_details" method="post" action="/{language}/profile">
	<INPUT type='hidden' name='action' value="update_profile">
	<b>Логин</b><br>
	<INPUT class='input' style='width:150px;color:#333333;' maxLength='20' disabled="disabled" value="{login}"><br>
	Логин может состоять из цифр и букв английского алфавита. От трёх до двадцати символов.<br>Пример: JohnDoe54<br><br>
	<b>Пароль Текущий (Зашифрованный)</b><br>
	<INPUT class='input' style='color:#333333;width:230px;' maxLength='64' disabled="disabled" value="{pass}"><br>
	<b>Новый Пароль</b><br>
	<INPUT class='input' style='width:150px;' name='profile_new_pass1' maxLength='20'"><br>
	Пароль может состоять из цифр и букв английского алфавита. От трёх до двадцати символов.<br>
	<b>Повторите Новый Пароль</b><br>
	<INPUT class='input' style='width:150px;' name='profile_new_pass2' maxLength='20'"><br><br>
	<b>Ваш почтовый адресс</b><br>
	<INPUT class='input' style='width:220px;' name='profile_email' maxLength='50' value="{email}"><br>
	<br>
	<input id="reg_your_details_submit" style="float:left; width:200px;color:#000000;" type="submit" value="Обновить профиль">
 <br><br>
 </form>