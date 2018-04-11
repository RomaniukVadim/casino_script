<?php #::[ админ панель :: настройка бонус-игры 9 линейных слотов Igrosoft R#1201161515v4.62]::# ?>
          -->
          <!-- настройка бонус-игры Скалолаз-->
          <div class="bankset">Настройка бонус-игры</div>
          <div class="bankadd1">Спинов до бонус игры <input maxLength="3" size="4" name="<?=$slot?>_bonus_figure" value="<?=$stav_array[0]?>" /></div>
          <div class="bankvol">Мin.&nbsp;</div>
          <div class="bankadd2">общее для всех игроков</div> 
          <div class="bankadd3">Текущее состояния бонуса<input maxLength="4" size="5" name="<?=$slot?>_bonus_curset" value="<?=$setslot[MY_BANK_MODE2] ?>" /> .</div>
          <div class="bankadd3">изменить состояние<input type="checkbox" maxLength="20" size="10" name="<?=$slot?>_bonus_spin" value="on" /></div>
          <div class="lineshr"></div>
          <div class="bankadd1">кол-во бонусов 0-<?=$stepbonus?><input maxLength="1" size="4" name="<?=$slot;?>_bonus_number" value="<?=$stav_array[2]?>" /></div>
          <div class="bankvol">Max.</div>
          <div class="stub6"><span class="snosko">&nbsp;* </span><span class="snoskotext">Если выставить меньше 5-ти игроку не дойти до супербонус-игры(вершина) </span></div>
          <div class="lineshr"></div>
          <div class="bankadd1">Сумма умножения ставки<input maxLength="8" size="4" name="<?=$slot?>_bonus_creditmax" value="<?=$stav_array[1]?>" /></div>
          <div class="bankvol"> Max.</div>
          <div class="stub6">&nbsp;для всех бонусов <span class="snosko">* </span><span class="snoskotext"> на супер бонус-игру не влияет. <!--Слот отображает <?//=$vidbonus?> --></span></div> 
          <div class="lineshr"></div>
          <div class="bankadd1">бонус сверх лимита<input maxLength="3" size="4" name="<?=$slot?>_bonus_limits" value="<?=$stav_array[4] ?>" /></div>
          <div class="bankvol">Max.</div>
          <div class="stub6"><span class="snosko">&nbsp;* </span><span class="snoskotext">разрешенное умножение ставки в диапазоне 0-<?=50?>, можем дать шанс до указанного умножения</span></div>
          <div class="lineshr"></div>
          <div class="bankadd1"> Шанс проигрыша в бонусе <input maxLength="3" size="4" name="<?=$slot?>_bonus_sh_zero" value="<?=$stav_array[14]?>" /></div>
          <div class="bankvol">310. </div>
          <div class="stub6"><span class="snosko">&nbsp;* </span><span class="snoskotext">соотношение проигрышных символов  (нулей) к другим символам </span></div>
          <!--