<?


?>
<body id="page1">
<script type="text/javascript">
	var loginUrl = "/{language}/login";
	var registrationUrl = "/{language}/open_account";
	<?php if (isset($_SESSION['needToLogin'])) { ?>
		$(function() {
			showLoginForm();
		});
	<?php 
		unset($_SESSION['needToLogin']);
		}	
	?>
</script>

<div class="tail-top">
    <div class="main">
        <div id="header" <?if ($page != 'index') { echo 'style="height:206px;overflow:hidden;"'; } else { echo 'style="height:525px;overflow:hidden;"'; }?>>
           <div class="indent2">


		<? if(!$_SESSION['login']) { ?>
<br>

<? } else { ?>
<br>

<script type="text/javascript">
function gamemodereal() {
document.location.href="/{language}/games/wmr";
}
function gamemodefun() {
document.location.href="/{language}/games/fun";
}
</script>

												<div id="cz_user_menu">
                                                <?php/*<div class="box" style="margin-left:20px;width:400px;">
                                                    <div class="corner-top-right1">
                                                        <div class="corner-top-left1">
                                                            <div class="corner-bottom-left1">
                                                                <div class="corner-bottom-right1">*/ ?>
                                                                    <div class="indent-box" style="padding-top:20px;padding-bottom:40px;padding-left:15px;padding-right:5px;">



<div style="margin-bottom:7px;">
	<div class="cz_um_logged">Вы авторизованы под логином</div> &nbsp;
	<div class="cz_um_logged_bg">{login}</div>
</div>

<div class="cz_counts">
	<strong>
	<div class="cz_count_line">
		<label>
			<input name="mode" id="mode" type="radio" value="real"  <? if ($_SESSION['mode'] == 'wmr' or $_SESSION['mode'] == '') { echo 'checked';} ?> onclick="gamemodereal()">
			<span style="color:#FFF;font-size:14px;font-weight:bold;">&nbsp; Реальные деньги:&nbsp; {cash_wmr}</span>
		</label> 
	</div>
	&nbsp; &nbsp;
		<div class="popoln_btn"><a href="/{language}/in">пополнить</a></div>
		<div class="sniat_btn"><a href="/{language}/out">снять</a></div>

	<input name="user" id="user"  type="hidden" value=" in3t ">
		<div class="cz_count_line">
			<label>
				<input name="mode" id="mode" type="radio" value="virtual" <? if ($_SESSION['mode'] == 'fun') { echo 'checked';} ?> onclick="gamemodefun()">
				<span style="color:#FFF;font-size:14px;font-weight:bold;">&nbsp; Виртуальный счет:&nbsp; <span id="fun">{cash_fun}</span>
			</label>
		</div>
		
		<div class="popoln_btn"><a href="/{language}/games/funup">пополнить</a></div>
	</strong>
</div>


                                                                    </div>
                                                <?php/*         </div>
                                                            </div>
                                                        </div>
                                                    </div> */ ?>
                                                </div>
<? } ?>

		   </div>
            <div class="indent">
<? if ($_SESSION['login'] == '') { ?>
   			<?php/*  <form name="gm" action="/{language}/login" method="post" id="loginform">
                    <div class="fright">
                    	<input value="Логин" class="input" maxlength="18" name="login" onblur="if(this.value=='') this.value='Логин';" onfocus="if(this.value=='Логин') this.value='';" type="text">  &nbsp;
                        <input value="Пароль" type="password" class="input" maxlength="16" name="password" onblur="if(this.value=='') this.value='Пароль';" onfocus="if(this.value=='Пароль') this.value='';" onKeyPress="return submitenter(this,event)" type="text"> &nbsp;
                        <input name="send" value="1" type="hidden"><a href="#" class="button" onclick="document.getElementById('loginform').submit()">Войти</a>
                    </div>
              		</form>

              <ul>
               	<li><a href="/{language}/">Главная</a></li>
				<li><a href="#" onclick="javascript:showLoginForm(); return false;">Login</a></li>
               	<li class="last"><a href="/{language}/open_account">Регистрация</a>
               	<a href="/{language}/forgot_password">Забыли пароль?</a></li>
          </ul>*/ ?>
<? } else { ?>
              <?php /*<ul>
               	<li><a href="/{language}/">Главная</a></li>
	      </ul>*/ ?>
<?php /*<div class="fright">
<a href="/{language}/quit">Выход</a>
</div>*/ ?>
<? } ?> 


                <br class="clear">
           </div>
		   
		
			<div id="cz_bookmark_lnk">
				<a onClick="AddBookmark();return false" href="/">Добавить в закладки</a>
			</div>

	  <?php /*<div style="padding-right:27px;float:right;"><a href="#"  onclick="return add_favorite(this);">Добавить в закладки</a> // <a href="/ru/">ru</a></div>*/ ?>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,24" height="469" width="943">
              <param name="movie" value="/{theme}/swf/header.swf" />
              <param name="quality" value="high" />
              <param name="wmode" value="transparent" />
              <param name="menu" value="false" />
              <!--[if !IE]> <-->
              <object data="/<?=TEMPLATE?>/swf/header.swf" type="application/x-shockwave-flash" height="469" width="943">
                <param name="quality" value="high" />
                <param name="wmode" value="transparent" />
                <param name="menu" value="false" />
                <param name="pluginurl" value="http://www.macromedia.com/go/getflashplayer" />
                Не удалось отобразить Flash заставку.
              </object>

              <!--> <![endif]-->
          </object>

        </div>
		<div style="position: relative; z-index: 1;">
					  <object type="application/x-shockwave-flash" data="/menu_935x150.swf" width="935" height="150">
<param name="movie" value="/menu_935x150.swf" />
<param name="wmode" value="transparent" />
<?php if ($_SESSION['login'] == '') { ?>
<param name="FlashVars" value="autorize=0&lang={language}" />
<?php } else { ?>
<param name="FlashVars" value="autorize=1&lang={language}" />
<?php } ?>
</object>
</div>
	<div id="content_decor"></div>

	<div class="hidden">
		<form id="login_form" method="post" action="">
	    	<p id="login_error" class="hidden">&nbsp;</p>
			<div style="margin: 30px auto 0 auto; width: 392px; text-align: center;">
				<table style="color: #ffffff; text-align: left;" width="392" border="0" cellpadding="0" cellspacing="0">
				<tr>
				<td width="90" align="right"><label for="login">Логин&nbsp;&nbsp;&nbsp;</label></td>
				<td><input type="text" id="login" name="login" size="30" /></td>
				</tr>
				
				<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				</tr>
				
				<tr>
				<td align="right"><label for="password">Пароль&nbsp;&nbsp;&nbsp;</label></td>
				<td><input type="password" id="password" name="password" size="30" /></td>
				</tr>
				
				<tr>
				<td colspan="2" align="center">
				<input type="hidden" id="send" name="send" value="1" />
				<input type="submit" class="cz_login_btn" value="Войти" /></td>
				</tr>
				
				<tr>
				<td colspan="2" align="center">
					<div class="cz_restore_pass_btn">
						<a href="/{language}/forgot_password">Восстановить пароль</a>
					</div>
					<div class="cz_reg_btn">
						<a href="#" onclick="javascript:showRegistrationForm(); return false;">Регистрация</a></td>
					</div>
						
				</tr>
				</table>
			</div>
			<?php/*<p>
				<label for="login">Login: </label>
				<input type="text" id="login" name="login" size="30" />
			</p>
			<p>
				<label for="password">Password: </label>
				<input type="password" id="password" name="password" size="30" />
			</p>
			<p>
				<input type="hidden" id="send" name="send" value="1" />
				<input type="submit" value="Login" />
				<a href="/{language}/forgot_password">Восстановить пароль</a>
				<a href="#" onclick="javascript:hideLoginShowReg(); return false;">Регистрация</a>
			</p>*/ ?>
		</form>
	</div>
	<div class="hidden">
		<form id="reg_form" method="post" action="">
	    	<p id="reg_error" class="hidden">&nbsp;</p>
			
			<table style="color: #ffffff; text-align: left; font-size: 12px;" width="500" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td width="120">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
				<tr>
					<td valign="top"><label for="uid">Логин: </label></td>
					<td><input name="login" type="text" id="uid" style="width:180px;" value="<?  echo htmltext($регистрация_логин); ?>" maxlength="12"><br>
				Логин может состоять из цифр и букв английского алфавита.<br> От трёх до двадцати символов. Пример: JohnDoe54</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td valign="top"><label for="pass1">Пароль: </label></td>
					<td><input name="password" type="password" id="pass1" style="width:180px;" value="<?  echo htmltext($регистрация_пароль); ?>"><br>
				Пароль может состоять из цифр и букв английского алфавита. <br> От трёх до двадцати символов.</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td valign="top"><label for="pass2">Повторите пароль: </label></td>
					<td><input name="password2" type="password" id="pass2" style="width:180px;" value="<?  echo htmltext($регистрация_пароль2); ?>"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td valign="top"><label for="email">Ваш email адрес: </label></td>
					<td><input name="email" type="text" maxLength='30' id="email" style="width:180px;" value="<?  echo htmltext($регистрация_email); ?>"><br>
				Пример: yourname@email.com</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td valign="top"><label for="captcha_code">Код: </label></td>
					<td><img id="captcha" src="/engine/securimage/securimage_show_example.php " alt="CAPTCHA Image" />
				<br>
				<a href="#" onclick="document.getElementById('captcha').src = '/engine/securimage/securimage_show_example.php?' + Math.random(); return false">Обновить изображение</a><br>
				</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Введите Код:<br></td>
					<td><input type="text" name="captcha_code" id="captcha_code" size="10" maxlength="8" value="<?=htmltext($капча)?>" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="checkbox" name="confirm" id="confirm" value="on" checked />
						<label for="confirm" class="confirm">Я принимаю <a href="/{language}/terms">правила и условия казино megastart</a></label>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
							<input type="submit" class="cz_reg_btn2" value="Зарегистрироватся" id="reg_your_details_submit" />
						
					</td>
				</tr>				
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<?php /*<p>
				<label for="uid">Логин: </label>
				<input name="login" type="text" id="uid" style="width:180px;" value="<?  echo htmltext($регистрация_логин); ?>" maxlength="12"><br>
				Логин может стоятять из цифр и букв английского алфавита. От трёх до двадцати символов.<br>Пример: JohnDoe54
			</p>
		    <br>
			<p>
				<label for="pass1">Пароль: </label>
				<input name="password" type="password" id="pass1" style="width:180px;" value="<?  echo htmltext($регистрация_пароль); ?>"><br>
				Пароль может стоятять из цифр и букв английского алфавита. От трёх до двадцати символов.
			</p>
		    <br>
			<p>
				<label for="pass2">Повторите пароль: </label>
				<input name="password2" type="password" id="pass2" style="width:180px;" value="<?  echo htmltext($регистрация_пароль2); ?>">
			</p>
		    <br>
			<p>
				<label for="email">Ваш email адрес: </label>
				<input name="email" type="text" maxLength='30' id="email" style="width:180px;" value="<?  echo htmltext($регистрация_email); ?>"><br>
				Пример: yourname@email.com
			</p>
		    <br>
			<p>
				<label for="captcha_code">Код: </label>
				<img id="captcha" src="/engine/securimage/securimage_show_example.php " alt="CAPTCHA Image" />
				<br>
				<a href="#" onclick="document.getElementById('captcha').src = '/engine/securimage/securimage_show_example.php?' + Math.random(); return false">Обновить изображение</a><br>
				Введите Код:<br>
				<input type="text" name="captcha_code" id="captcha_code" size="10" maxlength="8" value="<?=htmltext($капча)?>" />			
			</p>
		    <br><br>
			<p>
				<input type="submit" value="Зарегестрироватся" id="reg_your_details_submit" />
			</p>*/ ?>
		</form>
	</div>

<?/*if ($page != 'index') { echo '<br>';}*/?>

		
        <div id="content">
			
             <div class="indent-main">
				 <div class="content-top"></div>
                 <div class="box">
                    <div class="corner-top-right1">
                        <div class="corner-top-left1">
                            <div class="corner-bottom-left1">
                                <div class="corner-bottom-right1">
                                    <div class="indent-box">
										<div class="cz_spacer"></div>
                                        <div class="container">
                                            <div class="col-1">
                                                <div class="banner">

													<? include_once(ENGINE_DIR.'/templates/blocks/jp.php'); ?>
												</div>


												<div class="indent">




                                                <div class="box1" <?if ($page != 'index' and $page != 'open_account' and $page != 'support' and $page != 'login' and $page != 'forgot_password' and $page != 'news') { echo 'style="width:900px;"'; }?>>
                                                    <div class="corner-top-right">
                                                        <div class="corner-top-left">
                                                            <div class="corner-bottom-left">
                                                                <div class="corner-bottom-right">
                                                                    <div class="indent-box">
