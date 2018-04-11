[main]
{webmoney}
{statistic}
[/main]
[webmoney]
Ваш баланс:<br>
{cash} RUR или с учетом процента WebMoney(0,8%): {cash_wmpr} RUR<br>
{tariff_wmz} WMZ с учетом процента WebMoney(0,8%): {tariff_wmzpr} WMZ или (1WMZ = {tariff_onewmz} RUR)<br>
{tariff_wme} WME с учетом процента WebMoney(0,8%): {tariff_wmepr} WME (1WME = {tariff_onewme} RUR)<br>
{tariff_wmu} WMU с учетом процента WebMoney(0,8%): {tariff_wmupr} WMU (1WMU = {tariff_onewmu} RUR)<br>


<form method="POST" action="/{language}/out">
	<br>Введите сумму которую желаете снять:<br>
	<input type="input" name="summa" class='input' size="10"><br>
	<input type="hidden" name="action" value="1"><br>
	А также кошелёк в соответствующей валюте:<br>
	<SELECT NAME="type" style="border:1px solid #2d2d2d;background:#000000;color:#FFFFFF;">
		<OPTION VALUE="WMR"> WMR
	</SELECT>
	<input type="input" name="purse" class='input' size="16"> : Пример R325816022000<br><br>
	<input type="hidden" name="mode" value="out">
	<input type="submit" class="submit" style="float:left; width:200px;color:#000000;" value="Снять средства">
</form>
<br><br>
* Комиссия WebMoney при выводе, <strong><font color=red>0,8%</font></strong> от суммы вывода<br>
* Выплаты осуществляются нашими операторами в течении 2х часов.
[/webmoney]

[statistic_header]
<br /><br /><br /><br />

<script>
function updateHistory() {
	document.frm_pagenav.submit();
}

function navigateToPage(number) {
	document.getElementById("hidden_pageno").value = number;
	document.frm_pagenav.submit();
}
</script>
<div class="popup_h2">Платежи в обработке:</div><br />
<form method="post" name="frm_pagenav">
<div style="display: inline; float: left">
Показать:
</div>
<div class="select_table_in_out_checkbox">
<input type="radio" name="radio_table_select" value="in" id="radio_table_select_in" onchange="updateHistory()"{radio_in}>
<label for="radio_table_select_in">Внесённые деньги</label>
</div>

<div class="select_table_in_out_checkbox">
<input type="radio" name="radio_table_select" value="out" id="radio_table_select_out" onchange="updateHistory()"{radio_out}>
<label for="radio_table_select_out">Выведенные деньги</label>
</div>

<br />


							<table cellspacing=0 cellpadding=0 width="100%">
								<tbody>
									<tr>
										<td height="33" class="cell_1" width="25%"><div align="center">Дата</div></td>
										<td class="cell_2" width="50%"><div align="center">Платежная система</div></td>
										<td class="cell_2" width="10%"><div align="center">Сумма</div></td>
										<td class="cell_3" width="15%"><div align="center">Статус</div></td>
									</tr>
[/statistic_header]
[statistic_list]
  									<tr>
										<td class="cell_empty" height="23px">{date} {time}</td>
										<td class="cell_empty" height="23px">{notes}</td>
										<td class="cell_empty" height="23px">{amount} {type}</td>
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