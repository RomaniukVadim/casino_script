<?php #::[ модуль статистики админпанели R#1304031215v4.63]::#?>
          <div class="statmenu">
           <div class="bankset">Общая Статистика по Видеослоту</div>
<?stat_table ( $colbet, $betall, $winall, $winbon, $dohod, $setslot[MY_BANK_INCASH] )?>          
           <hr class="lineshr1" />
           <!-- Статистика по дате-->
           <form name="dateselect" action="index.php?action=<?=$action?>&setgame=<?=$game?>" method="post"> 
            <div class="bankset">Выборка статистики по дате
             <br />
<?DateDropDown ( $dropdate ) ?>
             <input type="submit" class="button" value="смотреть" />
            </div>
<?stat_table ( $colbet2, $betall2, $winall2, $winbon2, $dohod2, $incash )?>
            <hr class="lineshr1" />
           </form> 
           <div class="bankset"><!-- -->&nbsp;<!-- //-->
            <!-- навигатр--> 
            <?/*<div class="navigator1" onclick="window.open('<?=ADMIN?>');"><!-- <a href="/<?=ADMIN?>">-->На главную<!-- </a> --></div> */?>
            <div class="banknavigator linkblock" onclick="location.href='<?=ADMIN?>';">На главную</div>
            <div class="bankdelitel "> | </div>
            <div class="banknavigator linkblock" onclick="location.href='<?="#1"?>';">В начало</div>
            <div class="bankdelitel"> | </div>
            <div class="banknavigator linkblock" onclick="window.open('<?="http://gamatic.ru"?>')">Поддержка</div>
           </div>
          </div>