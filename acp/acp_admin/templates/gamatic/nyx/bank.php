<?php #::[ админ панель 25 линейных 3D слотов Компании Nyx R#1304031215v4.63]::# ?>
        <div><a name="1"><!-- Якорь "На верх" --></a></div>
        <div class="bankcontainer">
         <!--
         <div class="slotlist">
          <? foreach ( $slotlist as $i=>$v) { ?>
          <a href="?action=<?=$action?>&setgame=<?=$i?>" class="styleimg"><img src="<?=GAMATIC_DIR?>nyx/img/<?=$i/*?>_275x140.png*/?>.png" alt="X" title="<?=$i?>" class="styleimg" /></a>
          <?}?>
         </div>
         -->
        <form name="setings" action="?action=<?=$action?>&setgame=<?=$game?>" method="post">
               <!-- выбор банка игры-->
          <div class="bankset">Выбор банка с которым взаимодействует слот</div>
           <!-- картинка -->
          <div class="banksetimg"><img src="<?=GAMATIC_DIR?>nyx/img/<?=$game//."_275x140"?>.png" title="Обновить информацию" style="width:150px; height:75px;"/></div>
           <!-- // -->
          <div class="banksetcomm">Слот работает с общим банком казино               <input type="radio" name="<?=$slot?>_bankset" value="0000000001" <?echo $mode['0001'] ; if ( $skip == true ) echo " disabled"?> /></div>
          <div class="banksetcomm">Слот работает с общим банком для 9 линейных слотов<input type="radio" name="<?=$slot?>_bankset" value="0000000002" <?echo $mode['0002'] ; if ( $skip == true ) echo " disabled"?> /></div>
          <div class="banksetcomm">Слот работает с отдельным банком                  <input type="radio" name="<?=$slot?>_bankset" value="0000000004" <?echo $mode['0004'] ; if ( $skip == true ) echo " disabled"?> /></div>
           <!-- // -->
          <div class="bankset">Настройка параметров банка </div>
          <div class="bankname">Общий Банк <input type="text" maxLength="20" size="10" name="game_bank" value="<?=sprintf ("%01.2f",$setpub[MY_BANK_SUMM])?>" readonly /></div>
          <div class="bankvol"><?=VALUTA?>.</div>
          <div class="bankname2"><?=TEXTN1?><input type="text" maxLength="20" size="5" name="game_proc" value="<?=sprintf ("%01.2f",$setterm[MY_BANK_SUMM])?>"<? //if ( $skip != true ) echo " disabled" ;?> readonly /></div>
          <div class="bankvol"><?=VALUTA?>.</div>
          <div class="lineshr"></div><!-- строка -->
          <!-- настройка банка игры-->
          <div class="bankname">Банк игры <?=$gamewid?><input type="text" maxLength="20" size="10" name="<?=$slot;?>_bank" value="<?=sprintf("%01.2f",$setslot[MY_BANK_SUMM])?>" /></div>
          <div class="bankvol"><?=VALUTA?>.</div>
          <div class="bankname2">Процент выдачи на 1 спин<input maxLength="20" size="5" name="<?=$slot?>_proc" value="<?=sprintf("%01.2f",$setslot[MY_BANK_PROC])?>" /></div>
          <div class="bankvol"> %.&nbsp;&nbsp;</div>
          <div class="bankname3">Забираем с каждого спина&nbsp;<input maxLength="5" size="2" name="<?=$slot?>_income" value="<?=sprintf("%01.2f", $setslot[MY_BANK_IN])?>" /></div>
          <div class="bankvol"> %.&nbsp;&nbsp;</div>
          <div class="lineshr"></div>
          <div class="bankname">Изменить Банк игры <?=$gamewid?><input type="checkbox" name="bank_bankmode" value="on" /></div>
          <div class="stub2">если да то ставим галочку</div>             
          <div class="lineshr"></div>
          <div class="bankname">Лимит на 1 спин max.<input maxLength="20" size="10" name="<?=$slot?>_winlimit_1" value="<?=sprintf("%01.2f",$setslot[MY_BANK_MAX])?>" /></div>
          <div class="bankvol"> <?=VALUTA?>.</div>
          <div class="stub3"> Максимальная сумма выигрыша на одну ставку</div>
          <div class="lineshr"></div>
<?if ( $skip <> true ) :?>
          <!-- настройка Бонуса игры-->
          <div class="bankname">Банк Бонуса <input maxLength="20" size="10" name="<?=$slot?>_bonus_bank" value="<?=sprintf("%01.2f",$setslot[MY_BANK_BONUS])?>" /></div>
          <div class="bankvol"><?=VALUTA?>.</div>
          <div class="bankname2">Сума готовности выдачи  <input maxLength="10" size="5" name="<?=$slot?>_bonus_out" value="<?=sprintf("%01.2f",$setslot[MY_BANK_BONREADY])?>" /></div>
          <div class="bankvol"><?=VALUTA?>.</div>
          <div class="bankname3">Забираем с каждого спина<input maxLength="5" size="2" name="<?=$slot?>_bonus_proc" value="<?=sprintf("%01.2f",$setslot[MY_BANK_BONPROC])?>" /></div>
          <div class="bankvol"> %.&nbsp;&nbsp;</div>
          <div class="lineshr"></div>
          <div class="bankname">Изменить Банк Бонуса<input type="checkbox" maxLength="20" size="10" name="bank_bonusmode" value="on" /></div>
          <div class="stub2">если да то ставим галочку</div>             
          <!-- Настройка игровых параметров -->
          <div class="bankset">Настройка игровых параметров</div>
          <!--
          <div class="banksetg">Кол-во спинов до выигрыша больше ставки от&nbsp;&nbsp;<input maxLength="3" size="5" name="<?=$slot?>_limitwin" value="<?=$stav_array[6]?>" />&nbsp;Min.&nbsp;до&nbsp;<input maxLength="3" size="5" name="<?=$slot?>_limitwin_up" value="<?=$stav_array[15]?>" />&nbsp;Min.&nbsp;</div>
          -->
          <div class="bankparam1">Кол-во спинов до выигрыша больше ставки от&nbsp;&nbsp;<input maxLength="3" size="5" name="<?=$slot?>_limitwin" value="<?=$stav_array[6]?>" />&nbsp;Min.&nbsp;</div>
          <div class="bankparam2">Включить компенсатор проигрыша <input type="checkbox"  name="<?=$slot?>_disable_lobet" value="0000100000" <?=$mode['1010']?>></div>
          <div class="bankparam2">сбрасывать счетчик при смене ставки<input type="checkbox"  name="<?=$slot?>_clear_spinwin" value="0000200000" <?=$mode['1020']?>></div>
          <!-- 
          <div class="banksets">отключить лимит, для игры по одной линии <input type="checkbox" maxLength="20" size="10" name=<?=$slot?>_lin_limit value="0000010000" <?=$mode['1001']?> disabled /></div>
          -->
          <div class="lineshr"></div>
          <div class="bankparam1">&nbsp;</div>
          <div class="bankparam2"> Запретить выигрыш на последней ставке<input type="checkbox"  name="<?=$slot?>_lastcourse_win" value="0000020000" <?=$mode['1002']?> /></div>
          <div class="bankparam2"> Запретить бонус на последней ставке  <input type="checkbox"  name="<?=$slot?>_lastcourse_bon" value="0000040000" <?=$mode['1004']?> /></div>
          <!-- <div class="lineshr"></div> -->
          <!--
<?if ( include ( "addition/".$game.".php" ) ) echo'<div class="bankset">модуль успешно подключен</div>';?>
          -->
          <!-- настройка бонус-игры Novomatic -->
          <div class="bankset">Настройка бонус-игры</div>
          <div class="bankbonus"><a class="h_tooltip" href="#">Спин. до бонуса&nbsp;<input maxLength="3" size="4" name="<?=$slot?>_bonus_figure" value="<?=$stav_array[0] ?>" /> <span class="h_classic">Колво спинов до запуска бонусной игры - не менее указаного</span></a></div>
          <div class="bankbonus1">&nbsp;Мin. общee для всех игроков</div> 
          <div class="bankbonus2">Текущее состояния бонуса <input class="1_input" maxLength="4" size="5" name="<?=$slot?>_bonus_curset" value="<?=$setslot[MY_BANK_MODE2] ?>" /></div>
          <div class="bankbonus3">изменить состояние <input type="checkbox" maxLength="20" size="10" name="bank_bonus_spin" value="on" /></div>
          <div class="lineshr"></div>
          <div class="bankbonus">Бонус в бонус-игре&nbsp;<input maxLength="1" size="4" name="<?=$slot;?>_bonus_number" value="<?=$stav_array[2] ?>" /></div>
          <div class="bankvol">&nbsp;Max.</div>
          <div class="stub4">&nbsp;<span style=" color:#990033;" >*</span><span style=" color:#3399FF;" > максимально возможное кол-во выпадения "Freegame" в бонус-игре.</span></div> 
          <div class="lineshr"></div>
          <div class="bankbonus">Кол-во мoнет&nbsp;<input maxLength="3" size="4" name="<?=$slot?>_limitmonet_bonus" value="<?=$stav_array[7] ?>" /></div>
          <div class="bankvol">&nbsp;Min.</div>
          <div class="stub4">&nbsp;&nbsp;минимальная сумма банка для запуска бонус-игры </div>
          <div class="lineshr"></div>
          <div class="bankbonus"><a class="h_tooltip" href="#">Сумма бонуса&nbsp;<span class="h_classic">Максимально возможная сумма выигрыша в бонусной игре, общая сумма для одного цикла</span></a><input maxLength="5" size="4" name="<?=$slot?>_bonus_creditmax" value="<?=$stav_array[1] ?>" /></div>
          <div class="bankvol">Max.</div> 
          <div class="stub4"><a class="h_tooltip" href="#"> &nbsp;Сумма указывается в монетах<span class="h_classic">1 монета равна одной минимальной ставки, например 1 фишка = 1USD, мин ставка 0.1 фишка.Соответствено 1 монета будет равна 0.1 USD</span></a></div> 
          <div class="lineshr"></div>
<?endif;?>
           <!-- модуль "ДжекПот -->   
          <div class="bankset">Настройки взаимодействия с модулем &quot;ДжекПот&quot;</div>
          <div class="bankbonus"><!-- Текущий --> Банк ДжекПота&nbsp;<input maxLength="20" size="5" name="bank_jpot" value="<?=sprintf("%01.2f",$setpub[MY_BANK_JP])?>" readonly /></div>
          <div class="bankvol"><?=VALUTA?>.</div>
          <div class="banksetj">Забираем с каждого спина в банк &quot;ДжекПота&quot;<input maxLength="5" size="3" name="<?=$slot?>_jpotproc" value="<?=sprintf("%01.2f",$setslot[MY_BANK_JPPROC])?>" /></div>
          <div class="bankvol">%.</div>
          <div class="stub5">Слот участвует в &quot;ДжекПоте&quot;<input type="checkbox" name="<?=$slot?>_jpotyes" value="0000000010" <?=$mode['0010']?> /></div>
            <? if ( $skip != true ) { ?>  
          <!-- настройка Валюты -->
          <div class="bankset">Настройка отображаемой валюты и стоимости ставок</div>
          <div class="banksetval">Выбор валюты
           <span class="bankalloc">
<?$c = 0 ; foreach ( $valutarray as $k=>$s ){?>           
            <?=$s?><input type="radio" name="<?=$slot?>_valuta" value="<?=$s//Ru?>" <? if ( $stav_array[5] == $valutarray[$c] ) echo 'checked';?> />
<?$c++;}?>
           </span>
          </div>
          <div class="banksetotr"><a class="h_tooltip" href="#"> валюта отображаемая в слоте&nbsp;<input maxLength="3" size="2" name="<?=$slot?>_valutaset" value="<?=$stav_array[5]?>" /><span class="h_classic">Некоторые типы валют могут заменятся на соответствующий знак валюты</span> </a></div>
          <div class="bankpayset"><input type="radio" name="<?=$slot?>_valuta" <?if ( !in_array ( $stav_array[5],$valutarray )  ) echo 'checked' ;?> />Произвольный тип</div>
          <div class="lineshr"></div>
          <div class="bankpayset">Определяем величины ставок&nbsp;</div>
<?$c=10; while ( $c < 13 ){?>
          <div class="banksetmin">#<?=$c-9?><input maxLength="4" size="2" name="<?=$slot?>_vol<?=$c-9?>" value="<?=$stav_array[$c]?>" /></div>
<?$c++;}?>
          <div class="banksetyes">Разрешить выбор ставки пользователями<input type="checkbox" name="<?=$slot;?>_useron" value="1" <?if ( $stav_array[9] == true ) echo 'checked';?> /></div>
          <div class="lineshr"></div>
          <div class="bankpayset"><a class="h_tooltip" href="#">Определяем шаг ставки&nbsp;<span class="h_classic"> Указываем  "сетку" ставок которые игрок сможет выбирать в слоте.Значения могут иметь произвольный характер например 100, 250, 500, 1000 5000.Следует учитывать что номинал должен быть не менее 0.01 кредита на самой минимальной ставке </span> </a></div>
<?$c=16; while ( $c < 21 ){?>
          <div class="banksetmin">#<?=$c-15?><input maxLength="4" size="2" name="<?=$slot?>_stake_<?=$c-15?>" value="<?=$stav_array[$c]?>" /></div>
<?$c++;}?>
          <div class="bankcomment"><a class="h_tooltip" href="#">Сумма в <?if ( isset ( $valutcomm[$stav_array[5]] ) ) echo $valutcomm[$stav_array[5]] ; else echo $valutalt ;?><span class="h_classic">Сумма указывается в сотых долях номинала 1&nbsp;кредита. 100 = 1 кредиту.Если указать к примеру 250 то при мин.ставке 0.01 кредита слот будет играть по 0.02 кредита, произойдет округление до 1 сотой.при мин.ставке 0.10 кредита слот будет играть по 0.25 кредита</span> </a></div>
          <!-- фронт флеш -->   
           <hr class="lineshr2" />
          <div class="bankset">Фронт флеш </div>
          <div class="banksetf1">Маштабирование&nbsp;<input type="checkbox" maxLength="20" size="10" name="<?=$slot?>_scale" value="1" <?if ( $stav_array[8] == "1" ) echo"checked" ;// маштабирование?> /></div>
          <div class="banksetf">&nbsp;Разрешить полный экран</div>  
           <? }// end skip?>
          <!-- кнопка--> 
           <hr class="lineshr2" />
          <div class="bankset"><!--......:::::::::::&#9758;[----------------------------------------------------]:::::::::::.....-->&nbsp;</div>
          <div class="bankbtn">
            <input type="hidden" value="apply" name="options" />
            <input type="submit" value="Сохранить настройки"  class="button" style="margin-top:5px" />
          </div>
        </form>   
       </div>
<?php #::[ t&k MEDIA 2011 ]::# ?>