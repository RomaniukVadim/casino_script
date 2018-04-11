[header]<h4><center>Внимание! Деньги на игровой счет зачисляются моментально после оплаты, если Вы оплатили, а деньги на игровой счет не зачислились, незамедлительно свяжитесь с администрацией!</center></h4><br>[/header]
[main]
{a1pay}
{robokassa}
{freekassa}
{interkassa}
{webmoney}
{statistic}
[/main]
[a1pay]
<br>
		<TABLE width="100%">
		<TBODY>
		<tr><td style="padding-bottom:10;"><h4>ПОПОЛНЕНИЕ СЧЁТА ЧЕРЕЗ СИСТЕМУ A1PAY</h4><img align="right" src="/modules/images/a1pay.jpeg">Приём платежей следующих видов: SMS(5% от выплат оператора), WebMoney(2%), Яндекс.Деньги(10%), РБК Money(10%), W1(10%), Наличными через терминал оплаты(15%), Личный кабинет Qiwi(10$). В скобках указан процент комиссии с платежа взимаемым платежной системой.</div><br></td></tr>
		<TR vAlign=top>
		<TD width="100%">

		<form method="POST" action="/{language}/in">
			<input type="input" name="summa" size="5" value="1" style="border: 1px solid rgb(0,0,0);color:#000000;"> R
			<input type="hidden" name="mode" value="pay_a1pay">
			<input type="submit" name="process" value=" Перейти к оплате " style="color:#000000;"> 1 R = <b>1 Кредит</b>
		</form>

		</TD>
		</TR>
		</TABLE>
<br>
[/a1pay]
[a1pay_proccess]
		<form method="POST"  class="application" action="https://partner.a1pay.ru/a1lite/input" id='autoProcessor'>
		  <input type="hidden" name="key" value="eQIhfz/hcZDwzC1FE6ZYRamu97rShtGLGfSy/pi3bvo=" />
		  <input type="hidden" name="cost" value="{a1pay_summa}" />
		  <input type="hidden" name="name" value="Pay for user: {a1pay_login}" />
		  <input type="hidden" name="default_email" value="{a1pay_email}" />
		  <input type="hidden" name="order_id" value="{a1pay_pay_id}" />
		  <input type="submit" style="color:#000000;" value=" Перейти на сайт оплаты a1pay, если не перешло автоматически "> 1 R = <b>1 Кредит</b>
		</form>
		<!-- Авто переход -->
		<script language="JavaScript" type="text/javascript">document.getElementById('autoProcessor').submit();</script>
[/a1pay_proccess]
[webmoney]
<br>
		<TABLE width="100%">
		<TBODY>
		<tr><td style="padding-bottom:10;"><h4>ПОПОЛНЕНИЕ СЧЁТА ЧЕРЕЗ СИСТЕМУ WEBMONEY</h4><img align="right" src="/modules/images/logo_wm.gif"></div>Для оплаты введите сумму. <p><span style="background-color:#FF0000;color:#FFFFFF;font-size:11;padding:3;"><b>По умолчанию указанна минимальная сумма.</b></span></p> Оплаченная сумма поступит на Ваш счет моментально. </td></tr>
		<TR vAlign=top>
		<TD width="100%">

		<form method="POST" action="/{language}/in">
			<input type="input" name="summa" size="5" value="1" style="border: 1px solid rgb(0,0,0);color:#000000;"> R
			<input type="hidden" name="mode" value="pay_webmoney">
			<input type="submit" name="process" value=" Перейти к оплате " style="color:#000000;"> 1 R = <b>1 Кредит</b>
		</form>

		</TD>
		</TR>
		</TABLE>
<br>
[/webmoney]
[webmoney_proccess]
		<form name="R" method="POST" action="https://merchant.webmoney.ru/lmi/payment.asp" id='autoProcessor'>
		<tr><td height="31" width="100%">
			<input name="LMI_PAYMENT_AMOUNT" size="5" value="{summa}" style="border: 1px solid rgb(0,0,0);color:#000000;"> R
			<input type="hidden" name="LMI_PAYMENT_DESC" value="Пополнение счёта, Игрок:{login}">
			<input type="hidden" name="LMI_PAYEE_PURSE" value="{purse}">
			<input type="hidden" name="idl" value="{payid}">
			<input type="hidden" name="idm" value="{email_md5}">
			<input type="hidden" name="ids" value="{login}">
			<input type="hidden" name="ip" value="{ip}">
		    <input type="submit" style="color:#000000;" value=" Перейти на сайт оплаты RoboKassa, если не перешло автоматически "> 1 R = <b>1 Кредит</b>
		</td><td width="100%" align="left"><IMG hspace=2 src="/modules/images/wmr.gif" vspace=2 border=0><br></td></tr>
		</form>
		<!-- Авто переход -->
		<script language="JavaScript" type="text/javascript">document.getElementById('autoProcessor').submit();</script>
[/webmoney_proccess]
[interkassa]
<br>
		<TABLE width="100%">
		<TBODY>
		<tr><td style="padding-bottom:10;"><h4>ПОПОЛНЕНИЕ СЧЁТА ЧЕРЕЗ СИСТЕМУ INTERKASSA</h4><img align="right" src="/modules/images/interkassa.png">В настоящий момент к системе подключено 16 видов электронных платежных систем: VISA, MasterCard, LigPay, MoneyMail, RBK Money, Liberty Reserve, Perfect Money, WebCreds, Ukash, ZPayment и другие. Для оплаты введите сумму. Обратите внимание, что система interkassa берет небольшой процент, а это 3% за перевод. Оплаченная сумма поступит на Ваш счет моментально.</td></tr>
		<TR vAlign=top>
		<TD width="100%">

		<form method="POST" action="/{language}/in">
			<input type="input" name="summa" size="5" value="1" style="border: 1px solid rgb(0,0,0);color:#000000;"> R
			<input type="hidden" name="mode" value="pay_interkassa">
			<input type="submit" name="process" value=" Перейти к оплате " style="color:#000000;"> 1 R = <b>1 Кредит</b>
		</form>

		</TD>
		</TR>
		</TABLE>
<br>
[/interkassa]
[interkassa_proccess]
		<form name="payment" action="https://interkassa.com/lib/payment.php" method="post" enctype="application/x-www-form-urlencoded" accept-charset="cp1251" id='autoProcessor'>
			<input type="hidden" name="ik_shop_id" value="{interkassa_shop_id}">
			<input type="input"  name="ik_payment_amount" size="5" value="{interkassa_summa}" style="border: 1px solid rgb(0,0,0);color:#000000;"> R
			<input type="hidden" name="ik_payment_id" value="{interkassa_pay_id}">
			<input type="hidden" name="ik_payment_desc" value="Пополение баланса пользователю {interkassa_login}, id платежа {interkassa_pay_id}">
			<input type="submit" name="process" value=" Перейти на сайт оплаты InterKassa, если не перешло автоматически " style="color:#000000;"> 1 R = <b>1 Кредит</b>
		</form>
		<!-- Авто переход -->
		<script language="JavaScript" type="text/javascript">document.getElementById('autoProcessor').submit();</script>
[/interkassa_proccess]
[robokassa]
<br>
		<TABLE width="100%">
		<TBODY>
		<tr><td style="padding-bottom:10;"><h4>ПОПОЛНЕНИЕ СЧЁТА ЧЕРЕЗ СИСТЕМУ ROBOKASSA</h4><img align="right" src="/modules/images/robokassa.jpg">В настоящий момент к системе подключено 30 видов вариантов приема платежей: Яндекс.Деньги, Webmoney, RUR MoneyMail, RBK Money, RUR Единый Кошелек, EasyPay, Деньги@Mail.Ru, Z-Payment, Переводом в системе CONTACT, Наличными в терминалах оплаты и другие. Для оплаты введите сумму. Обратите внимание, что система robokassa берет небольшой процент, а это 5% за перевод. Оплаченная сумма поступит на Ваш счет моментально.
		</td></tr>
		<TR vAlign=top>
		<TD width="100%">

		<form method="POST" action="/{language}/in">
			<input type="input" name="summa" size="5" value="1" style="border: 1px solid rgb(0,0,0);color:#000000;"> R
			<input type="hidden" name="mode" value="pay_robox">
			<input type="submit" name="process" value=" Перейти к оплате " style="color:#000000;"> 1 R = <b>1 Кредит</b>
		</form>
		</TD>
		</TR>
		</TABLE>
[/robokassa]
[robokassa_proccess]
		<TABLE width="100%">
		<TBODY>
		<tr><td style="padding-bottom:10;"><h4>ПОПОЛНЕНИЕ СЧЁТА ЧЕРЕЗ СИСТЕМУ ROBOKASSA</h4><img align="right" src="/modules/images/robokassa.jpg"></td></tr>
		<TR vAlign=top>
		<TD width="100%">
			<form action='{robokssa_url}' method='POST' id='autoProcessor'>
			<input type=hidden name='MrchLogin' value='{robokssa_mrh_login}'>
			<input type=hidden name='OutSum' value='{robokssa_out_summ}'>
			<input type=hidden name='InvId' value='{robokssa_inv_id}'>
			<input type=hidden name='Desc' value='{robokssa_inv_desc}'>
			<input type=hidden name='SignatureValue' value='{robokssa_crc}'>
			<input type=hidden name='Shp_item' value='{robokssa_shp_item}'>
			<input type=hidden name='IncCurrLabel' value='{robokssa_in_curr}'>
			<input type=hidden name='Culture' value='{robokssa_culture}'>
			<input type=hidden name='login' value='{robokssa_login}'>
			<input type=submit value=' Перейти на сайт оплаты RoboKassa, если не перешло автоматически ' style='color:#000000;'>
		</form>
		</TD>
		</TR>
		</TABLE>
		<!-- Авто переход -->
		<script language="JavaScript" type="text/javascript">document.getElementById('autoProcessor').submit();</script>
[/robokassa_proccess]
[freekassa]
<br>
		<TABLE width="100%">
		<TBODY>
		<tr><td style="padding-bottom:10;"><h4>ПОПОЛНЕНИЕ СЧЁТА ЧЕРЕЗ СИСТЕМУ Payeer</h4><br>
<a href="http://payeer.com/?partner=1837" target="_blank">
<img src="http://payeer.com/images/468.jpg" width="468" height="60" border="0" alt="http://payeer.com/"></a><br>
Payeer - сервис позволяет владельцам интернет – магазинов и поставщикам услуг в сфере онлайн - коммерции организовать приём платежей от клиентов во всех популярных электронных валютах. В настоящий момент доступны платежи в Webmoney, Яндекс.Деньги, RBKMoney, QIWI, OKPAY, Cash4WM, LiqPay, MoneyBookers, W1, MoneyMail, LibertyReserve, PerfectMoney, Деньги@Mail.Ru, а также способы приема платежей, такие как оплата через смс (SMS) сообщения, банковские карты Visa/Master Card и переводы Альфа-Клик, Телебанк.ВТБ24, Сбербанк Онлайн, Contact и Терминалы QIWI. Оплаченная сумма поступит на Ваш счет моментально.
		</td></tr>
		<TR vAlign=top>
		<TD width="100%">

		<form method="POST" action="/{language}/in">
			<input type="input" name="summa" size="5" value="1" style="border: 1px solid rgb(0,0,0);color:#000000;"> R
			<input type="hidden" name="mode" value="pay_freekassa">
			<input type="submit" name="process" value=" Перейти к оплате " style="color:#000000;"> 1 R = <b>1 Кредит</b>
		</form>
		</TD>
		</TR>
		</TABLE>
[/freekassa]
[freekassa_proccess]
		<!--
		<script src="http://yandex.st/jquery/1.6.0/jquery.min.js"></script>
		<script type="text/javascript">
		var min = 1;
		function calculate() {
			var re = /[^0-9\.]/gi;
			var url = window.location.href;
			var desc = $('#desc').val();
			var sum = $('#sum').val();
			if (re.test(sum)) {
				sum = sum.replace(re, '');
				$('#oa').val(sum);
			}
			if (sum < min) {
				$('#error').html('Сумма должна быть больше '+min);
				$('#submit').attr("disabled", "disabled");
				return false;
			} else {
				$('#error').html('');
			}
			if (desc.length < 1) {
				$('#error').html('Необходимо ввести номер заявки');
				return false;
			}
			$.get(url+'?prepare_once=1&l='+desc+'&oa='+sum, function(data) {
				 var re_anwer = /<hash>([0-9a-z]+)<\/hash>/gi;
				 $('#s').val(re_anwer.exec(data)[1]);
				 $('#submit').removeAttr("disabled");
			});
		}
		</script>
		-->



		<TABLE width="100%">
		<TBODY>
		<tr><td style="padding-bottom:10;"><h4>ПОПОЛНЕНИЕ СЧЁТА ЧЕРЕЗ СИСТЕМУ Payeer</h4><br><br>
<a href="http://payeer.com/?partner=1837" target="_blank">
<img src="http://payeer.com/images/468.jpg" width="468" height="60" border="0" alt="http://payeer.com/"></a><br>
</td></tr>
		<TR vAlign=top>
		<TD width="100%">
			<!--<form action='{freekssa_url}' method='POST' id='autoProcessor'>
			<input type=hidden name='MrchLogin' value='{freekssa_mrh_login}'>
			<input type=hidden name='OutSum' value='{freekssa_out_summ}'>
			<input type=hidden name='InvId' value='{freekssa_inv_id}'>
			<input type=hidden name='Desc' value='{freekssa_inv_desc}'>
			<input type=hidden name='SignatureValue' value='{freekssa_crc}'>
			<input type=hidden name='Shp_item' value='{freekssa_shp_item}'>
			<input type=hidden name='IncCurrLabel' value='{freekssa_in_curr}'>
			<input type=hidden name='Culture' value='{freekssa_culture}'>
			<input type=hidden name='login' value='{freekssa_login}'>
			<input type=submit value=' Перейти на сайт оплаты FreeKassa, если не перешло автоматически ' style='color:#000000;'>
			</form>
			-->
			<!--{fk_hash}
			
			<form method=GET action='{freekssa_url}' id='autoProcessor'>
				<input type='hidden' name='m' value='{fk_merchant_id}'>
				<input type='text' name='oa' id='sum' id='oa' onchange='calculate()' onkeyup='calculate()' onfocusout='calculate()' onactivate='calculate()' ondeactivate='calculate()'> Введите сумму для оплаты
				<input type='hidden' name='s' id='s' value='0'>
				<br>
				<input type='text' name='o' id='desc' value='' onchange='calculate()' onkeyup='calculate()' onfocusout='calculate()' onactivate='calculate()' ondeactivate='calculate()'> Номер заявки*
				<br>
				<input type='submit' id='submit' value=' Перейти на сайт оплаты FreeKassa, если не перешло автоматически ' disabled style='color:#000000;'>
			</form>-->
			
<form method="GET" action="//payeer.com/api/merchant/m.php" id='autoProcessor'>
<input type="hidden" name="m_shop" value='{fk_merchant_id}'>
<input type="hidden" name="m_orderid" value='{fk_inv_id}'>
<input type="hidden" name="m_amount" value='{fk_outsum_oa}'>
<input type="hidden" name="m_curr" value="RUB">
<input type="hidden" name="m_desc" value='{freekssa_inv_desc}'>
<input type="hidden" name="m_sign" value='{fk_hash}'>
<input type="submit" name="m_process" value="Оплатить" />
</form>




			<!--form method=GET action='{freekssa_url}' id='autoProcessor'>
				<input type='hidden' name="m" value='{fk_merchant_id}'>
				<input type='hidden' name='oa' value='{fk_outsum_oa}'>
				<input type='hidden' name='s' value='{fk_hash}'>
				<input type='hidden' name='o' value='{fk_inv_id}'>
				<input type='submit' value='Оплатить'>
			</form-->
		
		</TD>
		</TR>
		</TABLE>
		<div id="error"></div>
		<!-- Авто переход -->
		<script language="JavaScript" type="text/javascript">document.getElementById('autoProcessor').submit();</script>
[/freekassa_proccess]
[statistic_header]
<br /><br />

<script>
function updateHistory() {
	document.frm_pagenav.submit();
}

function navigateToPage(number) {
	document.getElementById("hidden_pageno").value = number;
	document.frm_pagenav.submit();
}
</script>
<div class="popup_h2">История операций</div><br />
<form method="post" name="frm_pagenav">
<div style="display: inline; float: left">
Показать:
</div>
<div class="select_table_in_out_checkbox">
<input type="radio" name="radio_table_select" value="in" id="radio_table_select_in" onchange="updateHistory()"{radio_in}>
<label for="radio_table_select_in">Внесённые средства</label>
</div>

<div class="select_table_in_out_checkbox">
<input type="radio" name="radio_table_select" value="out" id="radio_table_select_out" onchange="updateHistory()"{radio_out}>
<label for="radio_table_select_out">Выведенные средства</label>
</div>

<br />

							<table cellspacing=0 cellpadding=0 width="100%">
								<tbody>
									<tr>
										<td height="33" class="cell_1" width="20%"><div align="center">Дата</div></td>
										<td class="cell_2" width="60%"><div align="center">Платежная система</div></td>
										<td class="cell_2" width="10%"><div align="center">Сумма</div></td>
										<td class="cell_3" width="15%"><div align="center">Статус</div></td>
									</tr>
[/statistic_header]
[statistic_list]
									<tr>
										<td class="cell_empty" height="23px">{date} {time}</td>
										<td class="cell_empty" height="23px">{notes}</td>
										<td class="cell_empty" height="23px">{amount} {type_money}</td>
										<td class="cell_empty" height="23px">{status}</td>
									</tr>
[/statistic_list]
[statistic_footer]
								</tbody>
							</table>
							<br /><br />
								<input id="hidden_pageno" type="hidden" name="pageno">
								Страницы: {tbl_pager}
</form>							
[/statistic_footer]
