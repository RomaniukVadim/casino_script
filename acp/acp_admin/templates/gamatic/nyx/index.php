<?php #::[ модуль админ панели ]::#
/*#############################################||
||------------=  5 Reels 3D Slot  =------------||
||------------------- *NYX* -------------------||
|| автор "timur & K MEDIA"developer@gamatic.ru ||
|| R#1304031215v4.63                           ||
||---------------------------------------------||
||#############################################*/
define ( "GROUPBANK", "Lines_9") ;
define ( "TEXTN1",    "Банк 9 линеек ") ;
include ( GAMATIC_DIR."functions.php" ) ;
include ( GAMATIC_DIR."nyx/function.php" ) ;
$slot = $action ;
$bonus = false ; 
if ( isset ( $_POST['options'] ) )  if ( $_POST['options'] == 'apply' ) include ( GAMATIC_DIR."nyx/options.php" ) ;

//if ( isset ( $_GET['setgame'] ) ) $game = $_GET['setgame'] ;
elseif ( !isset ( $_SESSION['slot_set'] ) ) $game = GROUPBANK ;
elseif (  isset ( $_SESSION['slot_set'] ) ) $game =  $_SESSION['slot_set'] ;
if ( isset ( $_POST['dropdate_d'] ) ) $dropdate_d =  $_POST['dropdate_d'] ; else $dropdate_d = date ( "d") ;
if ( isset ( $_POST['dropdate_m'] ) ) $dropdate_m =  $_POST['dropdate_m'] ; else $dropdate_m = date ( "m") ;
if ( isset ( $_POST['dropdate_y'] ) ) $dropdate_y =  substr ( $_POST['dropdate_y'], 2, 3 ) ; else $dropdate_y = date ( "y") ;
 $bankalert = $_SESSION['allert']  ;
 unset ( $_SESSION['allert'] )     ;
 $_SESSION['slot_set']  = $game ;
  //selector
$slotlist = array (
           "Geniewild" => array ( "Дикий джин",        ""  ), //1
            GROUPBANK  => array ( " для 3D слотов", "skip" )
                   ) ;
  # / end selector
 $valutarray = array ( 'RUR','USD','EUR','UAH','CRE','DRA','FUN' ) ;
 $valutcomm  = array ( 'RUR' => 'копейках','USD' => 'центах','EUR' => 'евроцентах','UAH' => 'копийках' ) ;
 $valutalt   = 'сотых фишки' ;
 if ( !isset ( $slotlist[$game][0] ) ) $game = GROUPBANK ;

 $gamewid  = $slotlist[$game][0] ;
 $skip     = $slotlist[$game][1] ;
 $_SESSION['games'] = $game ;
 $setpub  = _my_game_set ( MY_PUBLIC ) ;// выборка параметров общего банка расширенная 
 $setslot = _my_game_set ( $game )     ;// выборка параметров слота расширенная 
 $setterm = _my_game_set ( GROUPBANK ) ;// выборка параметров терминального банка 
 $mode    = mode ( $game, $setslot, 'checked' ) ; //настройки слота
 $stav_array = explode( "|" , $setslot ["mode3"] ) ;
 $valu_array = explode( "|" , $setslot ["mode2"] ) ;
  // 9 линейка, сутки = 86400 сек.
 $dateend   = strtotime ( $dropdate_y."-".$dropdate_m."-".$dropdate_d." ".date ( "H:i:s" ) ) ;// преобразуем дату в штамп времени
 $datestart = $dateend - 86400 ;// сутки назад
 $dropdate = $dropdate_d.".".$dropdate_m.".".$dropdate_y;
 $trigerspin    = MY_STATGAME_GAME."='".$game."-BET' "   ;
 $trigerbonus1  = MY_STATGAME_GAME."='".$game."-GAMBLE_PICK' " ;
 //$trigerspin    = MY_STATGAME_GAME." LIKE '".$gamestat."-spin%' "   ;
 
 $trigerbonus2  = MY_STATGAME_GAME."='".$game."-spin-free' " ;
 $trigersetdate = MY_STATGAME_DATA.">='".$datestart."' and ".MY_STATGAME_DATA."<='".$dateend."' " ;
  
  list($betall)  = mysql_fetch_row ( mysql_query ( " SELECT SUM(".MY_STATGAME_BET.") FROM ".MY_TABLE_STATGAME." WHERE ".$trigerspin." or ".$trigerbonus1." or ".$trigerbonus2 ) ) ; // ставок всего
  list($winall)  = mysql_fetch_row ( mysql_query ( " SELECT SUM(".MY_STATGAME_WIN.") FROM ".MY_TABLE_STATGAME." WHERE ".$trigerspin." or ".$trigerbonus1." or ".$trigerbonus2 ) ) ; // выигрыш общий
  list($winbon)  = mysql_fetch_row ( mysql_query ( " SELECT SUM(".MY_STATGAME_WIN.") FROM ".MY_TABLE_STATGAME." WHERE "/*.$trigerbonus1." or "*/.$trigerbonus2  ) ) ; // из них бонусом
  
  list($betall2) = mysql_fetch_row ( mysql_query ( " SELECT SUM(".MY_STATGAME_BET.") FROM ".MY_TABLE_STATGAME." WHERE ".$trigerspin." and " .$trigersetdate." or ".$trigerbonus1." and " .$trigersetdate." or ".$trigerbonus2." and " .$trigersetdate ) ) ;
  list($winall2) = mysql_fetch_row ( mysql_query ( " SELECT SUM(".MY_STATGAME_WIN.") FROM ".MY_TABLE_STATGAME." WHERE ".$trigerspin." and " .$trigersetdate." or ".$trigerbonus1." and " .$trigersetdate." or ".$trigerbonus2." and " .$trigersetdate ) ) ;
  list($winbon2) = mysql_fetch_row ( mysql_query ( " SELECT SUM(".MY_STATGAME_WIN.") FROM ".MY_TABLE_STATGAME." WHERE "/*.$trigerbonus1." and " .$trigersetdate." or "*/.$trigerbonus2." and ".$trigersetdate ) ) ;
  $colbet  = mysql_num_rows ( mysql_query ( " SELECT * FROM ".MY_TABLE_STATGAME." WHERE ".$trigerspin." or ".$trigerbonus1." or ".$trigerbonus2 ) ) ;
  $colbet2 = mysql_num_rows ( mysql_query ( " SELECT * FROM ".MY_TABLE_STATGAME." WHERE ".$trigerspin." and " .$trigersetdate." or ".$trigerbonus1." and " .$trigersetdate." or ".$trigerbonus2." and " .$trigersetdate ) ) ;
  $dohod   = $betall  - $winall          ;
  $dohod2  = $betall2 - $winall2         ;
  $betall  = sprintf ("%01.2f", $betall ); 
  $winall  = sprintf ("%01.2f", $winall );
  $winbon  = sprintf ("%01.2f", $winbon );
  $dohod   = sprintf ("%01.2f", $dohod  );
  $betall2 = sprintf ("%01.2f", $betall2); 
  $winall2 = sprintf ("%01.2f", $winall2);
  $winbon2 = sprintf ("%01.2f", $winbon2);
  $dohod2  = sprintf ("%01.2f", $dohod2 );
  $incash  = sprintf ("%01.2f", $betall2 / 100 * $setslot[MY_BANK_IN]) ;
?>
<?// include ( GAMATIC_DIR."nyx/css/modiv.css"  )  cs\acp\acp_admin\gamatic\nyx\css?>
     <link rel="stylesheet" type="text/css" href="/acp/acp_admin/<?=GAMATIC_DIR?>nyx/css/modiv.css" />
     <div class="Geniewild">
<? include ( GAMATIC_DIR."nyx/bank.php"  ) ?>
        <!-- Статистика -->
<?// include ( GAMATIC_DIR."nyx/state.php" ) ?> 
     </div>