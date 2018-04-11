<?php #::[ модуль доп. функций админпанели R#1304031215v4.63]::#

function DateDropDown($def)//Календарь
 {     
   $deff = explode(".", $def);
   echo "<select name='dropdate_d'>\n";
   for ($i_d = 1; $i_d <= 31; $i_d++)
    {
      $i_d = sprintf ("%02d", $i_d);
     if ($i_d == $deff[0]) $selected="SELECTED";
     else $selected="";
     $c = 0 ;  
     echo "<option value='".$i_d."' ". $selected.">".$i_d."</option>\n";
    }
   $c = 0 ;  
   echo "</select>.\n";
   $c = 0 ;  
   echo "<select name='dropdate_m' >\n";
   for ($i_m = 1; $i_m <= 12; $i_m++)
    {
      $i_m = sprintf ("%02d", $i_m);
      if ($i_m == $deff[1]) $selected="SELECTED";
      else $selected="";
     $c = 0 ;  
     echo "<option value='".$i_m."' ". $selected.">".$i_m."</option>\n";
    }
   $c = 0 ;  
   echo "</select>.\n";
   $c = 0 ;  
   echo "<select name='dropdate_y' >\n";
   for ( $i_y = 2009; $i_y <= 2020; $i_y++ ) 
    {
     if ( $i_y == "20".$deff[2] )$selected="SELECTED"; 
     else $selected="";
     $c = 0 ;  
     echo "<option value='".$i_y."' ". $selected.">".$i_y."</option>\n";
    }    
   $c = 0 ;  
   echo "</select>\n";
  }

function stat_table ( $colbet, $betall, $winall, $winbon, $dohod, $incash )
 {
print <<<SPIT
             <div class="banksstats1">Сыграно игр</div>
             <div class="banksstats2">Сделано ставок</div>
             <div class="banksstats3">Выигрышей всего</div>
             <div class="banksstats4">Из них получено бонусом</div>
             <div class="banksstats5">Оборот Прибыли по слоту</div>
             <div class="banksstats6">Фактически доход Казино</div>
             <div class="banksstats1 ststs">$colbet</div>
             <div class="banksstats2 ststs">$betall</div>
             <div class="banksstats3 ststs">$winall</div>
             <div class="banksstats4 ststs">$winbon</div>
             <div class="banksstats5 ststs">$dohod</div> 
             <div class="banksstats6 ststs">$incash</div>
SPIT;
  } 
?> 
