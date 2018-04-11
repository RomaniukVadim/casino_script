<script type="text/javascript">
$(document).ready(function(){

	$("#czpp_gif").css('height', '14');
	$("#czpp_flash").css('height', '14');
	$("#czpp_stat").css('height', '14');

	//$(".btn-slide").click(function(){
	$("#czpp_desc").click(function(){
		$(this).css('height', '27');
		//$(this).css('marginTop') = 0;
		//$("#panel").slideToggle("slow");
		$("#cz_pp_tabs_desc_tab").slideToggle("slow");
		$("#cz_pp_tabs_gif_tab").css('display', 'none');		
		$("#czpp_gif").css('height', '14');
		//$("#czpp_gif").css('marginTop') = 13;
		
		$("#cz_pp_tabs_flash_tab").css('display', 'none');
		$("#czpp_flash").css('height', '14');
		//$("#czpp_flash").css('marginTop') = 13;
		//$(this).toggleClass("active");
		$("#cz_pp_tabs_stat_tab").css('display', 'none');
		$("#czpp_stat").css('height', '14');
		return false;
	});
	
	$("#czpp_gif").click(function(){		
		$("#cz_pp_tabs_gif_tab").slideToggle("slow");
		$(this).css('height', '27');
		//$(this).css('marginTop') = 0;
		
		
		$("#cz_pp_tabs_desc_tab").css('display', 'none');
		$("#czpp_desc").css('height', '14');
		//$("#czpp_desc").css('marginTop') = 13;
		
		$("#cz_pp_tabs_flash_tab").css('display', 'none');
		$("#czpp_flash").css('height', '14');
		//$("#czpp_flash").css('marginTop') = 13;
		$("#cz_pp_tabs_stat_tab").css('display', 'none');
		$("#czpp_stat").css('height', '14');
		return false;
	});
	
	$("#czpp_flash").click(function(){		
		$("#cz_pp_tabs_flash_tab").slideToggle("slow");
		$(this).css('height', '27');
		
		$("#cz_pp_tabs_gif_tab").css('display', 'none');
		$("#czpp_gif").css('height', '14');
		$("#cz_pp_tabs_desc_tab").css('display', 'none');
		$("#czpp_desc").css('height', '14');
		$("#cz_pp_tabs_stat_tab").css('display', 'none');
		$("#czpp_stat").css('height', '14');
		return false;
	});
	
	$("#czpp_stat").click(function(){		
		$("#cz_pp_tabs_stat_tab").slideToggle("slow");
		$(this).css('height', '27');
		
		$("#cz_pp_tabs_gif_tab").css('display', 'none');
		$("#czpp_gif").css('height', '14');
		$("#cz_pp_tabs_desc_tab").css('display', 'none');
		$("#czpp_desc").css('height', '14');
		$("#cz_pp_tabs_flash_tab").css('display', 'none');
		$("#czpp_flash").css('height', '14');
		return false;
	});
	
	 
});
</script>
<div class="cz_big_title">Партнёрская программа</div>

<div class="cz_main_area">

	<div class="cz_partners_prog_tabs">
	<!-- Начало обычной ссылки -->
	Ваша ссылка:<br /><br />
	<div class="cz_pp_code">http://{base_url}/?ref={login}</div><br />
	
	Код ссылки:<br /><br />
	<div class="cz_pp_code">&lt;a href=&quot;http://{base_url}/?ref={login}&quot; target=&quot;_blank&quot;&gt;Текст ссылки&lt;/a&gt;</div><br />
	<!-- Конец обычной ссылки -->

		
	
		<div class="cz_pp_tabs_area">
			<div class="tabs">
				<div class="open_tab" id="czpp_desc"><a href="#">Описание</a></div>
				<div class="open_tab" id="czpp_gif"><a href="#">GIF баннеры</a></div>
				<div class="open_tab" id="czpp_flash"><a href="#">Flash баннеры</a></div>
				<div class="open_tab" id="czpp_stat"><a href="#">Статистика</a></div>
			</div>
			
			<div id="cz_pp_tabs_desc_tab">
			<br />
				Описание
				
				Здесь можно разместить описание работы с партнеркой<br />
				Здесь можно разместить описание работы с партнеркой<br />Здесь можно разместить описание работы с партнеркой<br />
				Здесь можно разместить описание работы с партнеркой<br />Здесь можно разместить описание работы с партнеркой<br />
			</div>
			
			<div id="cz_pp_tabs_gif_tab">
			<br />
				<!-- Начало баннера -->
			
					
				Баннер 468 Х 60:<br />
				<a href="http://{base_url}/?ref={login}" target="_blank"><img src="/promo/images/468x60.gif" border="0"></a><br /><br />
				Код баннера:<br />
				<div class="cz_pp_code2">&lt;a href=&quot;http://{base_url}/?ref={login}&quot target=&quot;_blank&quot;&gt;&lt;img src=&quot;http://{base_url}/promo/images/468x60.gif&quot; border=&quot;0&quot;&gt;&lt;/a&gt;</div>
				<br /><br /><br />

				<!-- Конец баннера -->
				
				<!-- Начало баннера -->
			
					
				Баннер 125 Х 125:<br />
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td width="110"><a href="http://{base_url}/?ref={login}" target="_blank"><img src="/promo/images/125x125.gif" border="0"></a><br />
					</td>
					<td>Код баннера:<br />
				
				<span class="cz_pp_code2">&lt;a href=&quot;http://{base_url}/?ref={login}&quot target=&quot;_blank&quot;&gt;&lt;img src=&quot;http://{base_url}/promo/images/125x125.gif&quot; border=&quot;0&quot;&gt;&lt;/a&gt;</span>
					</td>
				</tr>
				</table>

				<!-- Конец баннера -->
			</div>
			
			<div id="cz_pp_tabs_flash_tab">
			<br />
				Flash баннеры<br />
				<!-- Начало баннера -->
			
					
				Баннер 600 Х 200:<br />

				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="600px" height="200px">
					<param name="movie" value="http://{base_url}/promo/banner600x200.swf">
					<param name="flashvars" value="link=http://{base_url}/?ref={login}">
					<param name="quality" value="high">
					<embed src="http://{base_url}/promo/banner600x200.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="600px" height="200px" flashvars="link=http://{base_url}/?ref={login}" menu="false">
					</embed>
				</object>					
 
 <br />
				Код баннера:<br />
				<div class="cz_pp_code2">
					&lt;object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="600px" height="200px"&gt;
					&lt;param name="movie" value="http://{base_url}/promo/banner600x200.swf"&gt;
					&lt;param name="flashvars" value="link=http://{base_url}/?ref={login}"&gt;
					&lt;param name="quality" value="high"&gt;
					&lt;embed src="http://{base_url}/promo/banner600x200.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="600px" height="200px" flashvars="link=http://{base_url}/?ref={login}" menu="false"&gt;
					&lt;/embed&gt;
					&lt;/object&gt; 				
				</div>
				<br /><br /><br />

				<!-- Конец баннера -->
				
				<!-- Начало баннера -->
			
					
				Баннер 200 Х 200:<br />
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td width="210">

						<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="200px" height="200px">
							<param name="movie" value="http://{base_url}/promo/banner200x200.swf">
							<param name="flashvars" value="link=http://{base_url}/?ref={login}">
							<param name="quality" value="high">
							<embed src="http://{base_url}/promo/banner200x200.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="200px" height="200px" flashvars="link=http://{base_url}/?ref={login}" menu="false">
							</embed>
						</object>					
					</td>
					<td>Код баннера:<br />
				
						<span class="cz_pp_code3">
							&lt;object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="200px" height="200px"&gt;
								&lt;param name="movie" value="http://{base_url}/promo/banner200x200.swf"&gt;
								&lt;param name="flashvars" value="link=http://{base_url}/?ref={login}"&gt;
								&lt;param name="quality" value="high"&gt;
								&lt;embed src="http://{base_url}/promo/banner200x200.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="200px" height="200px" flashvars="link=http://{base_url}/?ref={login}" menu="false"&gt;
								&lt;/embed&gt;
							&lt;/object&gt;	 			
						</span>
					</td>
				</tr>
				</table>

				<!-- Конец баннера -->
			</div>
			
			<div id="cz_pp_tabs_stat_tab">
				<br />
<h4 align="center">Статистика</h4><br />

<div align="center">

<table width="40%">
<tr class="colheader">
	<td>
	Всего заработано:
	</td>
	<td>
	{part_total}
	</td>
</tr>
<tr>
	<td>
	Выплачено:
	</td>
	<td>
	{part_withdrawn}
	</td>
</tr>
<tr>
	<td>
	Ожидает выплаты:
	</td>
	<td>
	{part_pending}
	</td>
</tr>
<tr>
	<td>
	Текущий баланс:
	</td>
	<td>
	{part_balance}
	</td>
</tr>
<tr>
	<td>
	Переходов по ссылке:
	</td>
	<td>
	{part_hits}
	</td>
</tr>
<tr>
	<td>
	Привлечено рефералов:
	</td>
	<td>
	{part_refs}
	</td>
</tr>
</table>
</div>
<br />
<div align="center">
<form method="post">
<h4 align="center">Заказать выплату</h4><br />
<b style="color: red">{validation}</b><br />
<b style="color: green">{approve}</b><br />
Сумма: 
<input type="text" class="input" name="withdraw_summ" value="{part_balance}">
<input type="hidden" name="user" value="{login}">
<input type="submit" value="Заказать" class="input">
</form>
</div>
<br /><br />
<h4 align="center">Статистика за последние 12 месяцев</h4><br />
<div align="center">
{refstats}
</div>


			</div>
			
			
			




		
			
		</div>
		
	</div>
	<div class="cz_partners_prog_top20">
		{top20}		
	</div>
	

</div>

