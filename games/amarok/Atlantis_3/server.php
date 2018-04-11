<?


 error_reporting(0);
 unset($l);
 session_start();
 session_register($l);
 if(!isset($l))
  {
   header( "Location: ../../login.php" );
   exit;
  }
  
$dur = (isset($_SESSION['dur'])) ? $_SESSION['dur'] : 'wmr';
$multiplier = 100;
$bon1multiplier = 100;
  
//$test = 2;  
  
  /*
  
cлот

  */  
 include ( "../../../setup.php" );
 $date = date( "d.m.y" );
 $time = date( "H:i:s" );
 $gamegb = "atlantis";

 if ( isset ( $_POST["nb_coins"] ) )
  {
    $coins = $_POST["nb_coins"];
  }
 if ( isset ( $_POST["nb_lines"] ) )
  {
    $lines = $_POST["nb_lines"];
  }
 if ( isset ( $_POST["choix_case"]  ) )
  {
    $cxcase = $_POST["choix_case"];
  }
 if ( isset ( $_POST["choix_cactus"]  ) )
  {
    $cxcactus = $_POST["choix_cactus"];
  }
 if ( isset ( $_POST["cacheKiller"] ) )
  {
    $cacheKiller = $_POST["cacheKiller"];
  }
   $result = mysql_query("select * from users where login='$l'");
   $row = mysql_fetch_array( $result );
   $result = mysql_query("select * from game_bank where name='$gamegb'");
   
   $rowg = mysql_fetch_array( $result );
   //winlimit
   include ("function.php");
   
   $data_array = explode("|" , $rowg ["mode2"]);//game_bank
   $limit = $rowg['winmax'];
   $coinsmode = $data_array[0];
   $valuemode = $data_array[1];
   $usersmode = $data_array[2];
   $row_cash = 3              ;
   $result = "OK"             ;
   $jpots = "0.00"            ;
   //$game = "Atlantis"       ;
   $valuta = $data_array [1]  ;
   $coinsize = 1              ;
   $st = 1                    ;
   $errorcode = "1"           ;
   $bonus_1 = 0               ;
   $bonus_1_line = 0          ;
   $bonus_2 = 0               ;
   $wild2 = 0                 ;
   $wild4 = 0                 ;
   $maxcoins = 10             ;
   $maxbet = 250              ;
   $mapmin = 0                ;  
   $mapmax = $maxbet / 10     ;
   $queue = "X"               ;
   $mode0001 = "off"          ;
   $mode0002 = "off"          ;
   $mode0004 = "off"          ;
   $mode0010 = "off"          ;
   $startpos = 3              ;
   $seconpos = 2              ;
   $thirdpos = 1              ;
   $bonusend = 0              ;
   $bonuswin = 0              ;
   $btype = 0                 ;
   $bscatter = 0              ;
   $sessionj = 69225457       ;
   // $wildon=1;
   // mode
  $trim_mode=mysql_fetch_array(mysql_query( "SELECT *, substring(cast(mode as char),10,1) as mode1, substring(cast(mode as char),9,1) as mode2, substring(cast(mode as char),8,1) as mode3, substring(cast(mode as char),7,1) as mode4 FROM `game_bank` WHERE name = '$gamegb' "));
   mysql_query($sqls);
   
   $user_balance = ($dur == 'wmr') ? $row[$row_cash] : $_SESSION['balans'];
   
   if ($trim_mode[mode1]==1 or $trim_mode[mode1]==3 or $trim_mode[mode1]==5 or $trim_mode[mode1]==7)
    { // общий банк
      $mode0001="on";
      $segment = 0;
    } 
   if ($trim_mode[mode1]==2 or $trim_mode[mode1]==3 or $trim_mode[mode1]==6 or $trim_mode[mode1]==7)
    { // 25 линий банк
      $mode0002="on";
      $segment = 3;
    } 
   if ($trim_mode[mode1]==4 or $trim_mode[mode1]==5 or $trim_mode[mode1]==6 or $trim_mode[mode1]==7)
    {// слотовый банк 
      $mode0004="on";
      $segment = 6;
    } 

   if ($trim_mode[mode2]==1 or $trim_mode[mode2]==3 or $trim_mode[mode2]==5 or $trim_mode[mode2]==7)
    {// забираем в джек пот
      $mode0010="on";
    } 
   if ($trim_mode[mode2]==2 or $trim_mode[mode2]==3 or $trim_mode[mode2]==6 or $trim_mode[mode2]==7)
    {
      $mode0020="on";
    }
   if ($trim_mode[mode2]==4 or $trim_mode[mode2]==5 or $trim_mode[mode2]==6 or $trim_mode[mode2]==7)
    {
      $mode0040="on";
    }

   if ($trim_mode[mode3]==1 or $trim_mode[mode3]==3 or $trim_mode[mode3]==5 or $trim_mode[mode3]==7)
    {
      $mode0100="on";
    }
   if ($trim_mode[mode3]==2 or $trim_mode[mode3]==3 or $trim_mode[mode3]==6 or $trim_mode[mode3]==7)
    {
      $mode0200="on";
    }
   if ($trim_mode[mode3]==4 or $trim_mode[mode3]==5 or $trim_mode[mode3]==6 or $trim_mode[mode3]==7)
    { 
      $mode0400="on";
    }

   if ($trim_mode[mode4]==1 or $trim_mode[mode4]==3 or $trim_mode[mode4]==5 or $trim_mode[mode4]==7)
    {
      $mode1000="on";
    }
   if ($trim_mode[mode4]==2 or $trim_mode[mode4]==3 or $trim_mode[mode4]==6 or $trim_mode[mode4]==7)
    {
      $mode2000="on";
    }
   if ($trim_mode[mode4]==4 or $trim_mode[mode4]==5 or $trim_mode[mode4]==6 or $trim_mode[mode4]==7)
    {
      $mode4000="on";
    }
   $qwert = limiterr($segment );
   $segment1 = $segment + 1;// сумма бонус- банка
   $segment2 = $segment + 2;// сумма бонус "готов"

	/*
	расшифровка опции соответствено для каждой символьной позиции
 	0001 =1
 	0002 =2
 	0004 =3
	0003 =1,2
 	0005 =1,3
 	0006 =2,3
 	0007 =1,2,3

 	0010 =10
 	0020 =20
 	.... и т.д.

	*/
    //====== end mode

   //$statgame = "spin";
   $data_array=explode("|" , $row["holdset"]);//инфа о предыдущей ставке, для бонус игр
   // рисуем матрицу ставок
   for ( $set_line = $mapmin; $set_line <= $mapmax ; $set_line++)
     {
        $mapbet[$set_line] = $set_line;
     }
   //==============================================================
       // СТАРТУЕМ
       //----- проверяем входные даные
  if ($cxcase > $mapmin && $cxcase <=24 )
   {
	//     $statgame = "case";
     $errorcode = "0";
   }
  if ($cxcactus > $mapmin && $cxcactus <=20 )
   {
	//     $statgame = "case" ;
     $errorcode = $mapmin;
   }
  if ( $coins >= 1 )
   {
     $errorcode = $mapmin;
   }
  if ( $lines >= 1 )
   {
    $errorcode = $mapmin;
   }
   // баланс не меньше нуля
  if ( $user_balance < $mapmin )
   {
    $errorcode = "3";
   }
  $coinson = $mapbet[$coins];// ставка в монетах
  $linebet = $mapbet[$coins] * $coinsmode ; // ставка на линию в валюте 1 * 0.01 = 0.01
  $linecon = $mapbet[$lines]; // линий всего
  // ставка в допустимых пределах
  if ( 0 > $linebet or $linebet > $maxcoins or $mapmin > $linebet  or $linebet > 25)
   {
     $errorcode = 1;
   }
  $allbet = $linebet * $linecon;
  // ставка не больше баланса и не больше максимально возможной
  if ( $user_balance < $allbet or $allbet > $maxbet )
   {
    $errorcode = "2";
   }

   // обрабатываем ошибку
  if ( $errorcode <> "0"  )
   {
     $statgame = "error";
     echo "$statgame=$errorcode ";
     echo "&row=$user_balance";
     echo "&allbet=$allbet ";
     echo "&l=$l ";

   }


    $bonustype = explode( "|", $row['mode2'] );// определяем "А был ли бонус"
   // бонус игра

   if ( ($bonustype[0] == "btype") && ( $statgame == "Bonus1" or $statgame == "Bonus2") )
    {
         // бонус 2 ========================================================================
     if ( $cxcactus >= 1 && $cxcactus <= 20 && $bonustype[1] == "2"  && $bonustype[2] == "bscatter")
      {
      $bonusxr = "2_result";
      $bonusxwc = "2_win_coins";
      $bonusxwm = "2_win_money";
      $bonusxwg = "2_winning_comment";
      $sessionj = "nb_scatter";
      $endbon = 0 ;
      $scatter = $bonustype[3];

      $mqwdbl = "not";

         // для бонус 2 
      $data_array = explode("|" , $row["holdset"]);
       // бет на линию
      $coinsbet = $data_array[1];// ставка в монетах
      $coinsvol = $coinsbet * $coinsmode;// переводим в текущую валюту 
      //echo "CB$coinsbet";
      //echo "Vol$coinsvol";
      //echo "MMM$data_array[2]";
      
       // всего линий
      $linesbet = $data_array[2];
      $bon2abet = $coinsvol * $linesbet ;//Ставка в валюте
      $bon2bbet = $coinsbet * $linesbet ;//ставка в монетах 
      // матрица велечин 
      $bon2arra[0] = array( 0, 0, 0, 0, 0, 0 );
      $bon2arra[1] = array( 0, 0, 1, 2, 4, 7 );
      $bon2arra[2] = array( 0, 1, 2, 4, 8, 9 );
      $bon2arra[3] = array( 0, 2, 4, 5, 8,10 );
      $bon2arra[4] = array( 0, 4, 8,10,12,20 );
      //$bon2arra[5] = array( 0,10,12,20,30,40 ); //для флеш тип 1
      $bon2arra[5] = array( 0,10,12,12,20,40 ); //для флеш тип 2
      $bon2arrb = $bon2arra[$scatter];
      // запускаем генератор бонуса
      for ( $set_line = 0; $set_line < 1; )
        { $set_line++ ;
           //  echo "setttt=$set_line +++++"; //only for tester
          srand ((double) microtime()*1000000);
          $bon2result = rand( 1,5 );
          $bon2reswin = $bon2arrb[$bon2result] ;// выигрыш в монетах $coinsmode 
          //$bon2win = $bon2result * $coinsbet * $linesbet ;
          $bon2win = $bon2abet * $bon2reswin;
          $bonbwin = $bon2bbet * $bon2reswin;
          
          //проверяем можем ли заплатить если нет тогда заканчиваем бонус-игру
          $cashlimit = limiterr( $segment  );// сумма в банке
          // $caswin  = 49;//only for tester
          if ( ( $bon2win >= $cashlimit ) && ( $bon2result <> 1 ) )
            {
              $set_line = 0;
              $bon2win = 0;
              $den++;
              //echo "rrrr=$den"; //only for tester

              if ($den > 25 ) // допустмое количество циклов чтоб не грузить  пхп движок
                {
                  $set_line = 1;
                  $errorcode = 1;
                }
            }

         }
         $bonuscur = $bon2win;// текущий выигрыш
         $bonuscup = $bon2win;

         echo "&nb_scatter=$scatter";
         echo "&bonus$bonusxr=$bon2result";//&bonus2_result=$bon2result
         echo "&bonus$bonusxwc=$bonbwin";//&bonus2_win_coins=$bon2win
         echo "&bonus$bonusxwm=$bon2win";//bonus2_win_money=$bon2win
         echo "&bonus$bonusxwg=You wins : $bon2reswin  x $coinsbet (coins bet) x $linesbet (lines bet) = $bonbwin coins = $bon2win $valuta ";//&bonus2_winning_comment
         echo "&end_bonus=1";




        }

     if (  $cxcase >= 1  && $bonustype[1] == "1" )
      {
           $coinsbet = $data_array[1];// ставка в монетах

          $coinsvol = $coinsbet * $coinsmode;// переводим в текущую валюту 
            echo  "&CB===$coinsbet";
              echo  "CM===$coinsmode";
              echo  "CV===$coinsvol";
           
           //                        |мин ставка 0.01

          $bonusxr  = "1_result";
          $bonusxwc = "1_win_coins";
          $bonusxwm = "1_win_money";
          $bonusxwg = "1_winning_comment";
          $sessionj = "nb_scatter";
          $endbon = 1;
           // бет на линию
          $coinsbet = $data_array[1];

          srand ((double) microtime()*1000000);
          $bon2result  = rand( 1,4 );// simbol
          $bon2result2 = rand( 1,5 );// summ
         // $bon2result = 6;
          $bon2result1 = $bon2result2 * $coinsmode;
          $bon2win = $bon2result1 * $coinsbet * $bon1multiplier; // кол-во монет
          $bonuscur = $bon2win ; // текущий общий вин
          $bonuscup = $bon2win ; // постоянный вин

          //проверяем можем ли заплатить если нет тогда заканчиваем бонус-игру
          $cashlimit = limiterr( $segment  );// сумма в банке
          $cashbonus = limiterr( $segment1 );// сумма в бонус-банке
          $readbonus = limiterr( $segment2 );// сумма выдачи бонуса
          $bonusnod  = 0                    ;

          //$cashlimit  = 10;//only for tester
          if ($cashbonus >= $readbonus)
           {
             $bon2win = $cashbonus  * $bon1multiplier;//*************************************
             $bonusnod = 1         ;
             $bonusend = 1         ;
             $bon2result = 5       ;
             $bonuscur = 0         ; // текущий общий вин
             $bonuscup = $bon2win  ; // постоянный вин
             $bonuswin = $bon2win  ; // банк-вин
           }
         //  echo "BWN==$bon2win";
         // типа так
          if ( ( $bon2win >= $cashlimit ) && ( $bon2result1 <> 1 ) && ( $bonusnod <> 1 ) )//******************************************
            {
            
              $set_line = 0;
              $bon2win = 0;//*********************************************************************************************************
              $den++;
              //echo "rrrr=$den"; //only for tester
              $bonusend = 1;
              $bon2result  = 1;
              $bon2result1 = 1;
              $bon2win = $bon2result1 * $coinsbet * $bon1result;//*******************************************************************
              $bonuscur = $bon2win ;//для записи, текущий бонус
              $bonuscup = $bon2win ;//для записи, основной бонус

            }

          $bonusqo1 = 0;
          $bonusqo2 = 0;
          $bonusqo3 = 0;
          $bonusqo4 = 0;
          $bonusqo5 = 0;

          if ( $bon2result == 1 ) 
           {
            $bonusqo1 = 1;
           }
          if ( $bon2result == 2 )
           {
             $bonusqo2 = 1;
           }
          if ( $bon2result == 3 ) 
           { 
             $bonusqo3 = 1;
           }
          if ( $bon2result == 4 )
           {
             $bonusqo4 = 1;
           }
          if ( $bon2result == 5 )
           {
            $bonusqo5 = 1;
           }

          // парсим строку моде
          $bonusmode = explode( "|", $row['mode'] );// спины
          $bonuswrit = $bonusmode[0]+1;// кол-во бонус игр

          $count = 1;
         if ($bonusmode[0] >= 1)
          {
           // парсим результат раскладываем позиции, призы и суммы по местам
           for ($count = 1; $count <= $bonusmode[0]; $count++)
             {
               $bonusasc = explode( ":", $bonusmode[$count] );// инфа о спинах
               $bonuspos[$count] = $bonusasc[0] ; //выбранная позиция
               $bonustyp[$count] = $bonusasc[1] ; // тип приза на выбранной позиции
               $bonussum[$count] = $bonusasc[2] ; // сумма приза на выбранной позиции
               // ищем 3 одинаковых символа
               if ( $bonustyp[$count] == 1 )
                {
                  $bonusqo1++;
                }
               if ( $bonustyp[$count] == 2 )
                {
                  $bonusqo2++;
                }
               if ( $bonustyp[$count] == 3 )
                {
                  $bonusqo3++;
                }
               if ( $bonustyp[$count] == 4 )
                {
                  $bonusqo4++;
                }
               if ( $bonustyp[$count] == 5 )
                {
                  $bonusqo5++;
                }


               // для прошедших бонус-спинов
               echo "&case_pos_$count=$bonuspos[$count]"          ;     // выбранная позиция №
               echo "&case_type_$count=$bonustyp[$count]"         ;    // тип приза на выбранной позиции
               echo "&case_amount_$count=$bonussum[$count]"       ;  // сумма приза на выбранной позиции
              }
          }    // для первого бонус-спина и последующих "верхних"

         $count1 = $count - 1                                     ;
         $bonuspos[$bonuswrit] = $cxcase                          ;
         $bonustyp[$bonuswrit] = $bon2result                      ;
         $bonussum[$bonuswrit] = $bon2result1 + $bonussum[$count1];
         echo "&case_pos_$count=$cxcase"                          ;    // выбранная позиция №
         echo "&case_type_$count=$bon2result"                     ;    // тип приза на выбранной позиции
         echo "&case_amount_$count=$bonussum[$bonuswrit]"         ;    // сумма приза на выбранной позиции
         $bonusnum = $bonusmode[0] + 1                            ;    // прибавляем еше одну игру
         if ( $bonusqo1 >= 3 or $bonusqo2 >= 3 or $bonusqo3 >= 3 or $bonusqo4 >= 3 or $bonusqo5 >= 3)
          {
         	$bonusend = 1;
          }
               if ( $bonusnum == 6 )
                {
                 $bonusnum = 0;
                 $bonusend = 1;
                }
         // вставляем результат бонус-спина
        // 1 - casino
		//if ($dur == "wmr")
         mysql_query("update users set mode='$bonusnum|$bonuspos[1]:$bonustyp[1]:$bonussum[1]|$bonuspos[2]:$bonustyp[2]:$bonussum[2]|$bonuspos[3]:$bonustyp[3]:$bonussum[3]|$bonuspos[4]:$bonustyp[4]:$bonussum[4]|$bonuspos[5]:$bonustyp[5]:$bonussum[5]|$bonuspos[6]:$bonustyp[6]:$bonussum[6]|' where login='$l'");

       $bon2win = $bonussum[$bonuswrit] * $coinsbet * $bon1multiplier; //*******************************************************
	   if($bon2win > $cashbonus) $bon2win = $cashbonus;
       if ($bonusend == 1 )
        {
         $bonswin = $bon2win / $coinsmode ;
         echo "&bonus1_win_coins=$bon2win"; //** выигрыш в  монетах $bonswin = $bon2win / $coinsmode ;
         echo "&bonus1_win_money=$bon2win"; //** выигрыш в валюте $allcoi = $bon2win / $coinsmode ;
         
         
         if ( $bonusnod <> 1 )
          {
            echo "&bonus1_winning_comment=You wins : $bonussum[$bonuswrit] x $coinsbet (coins bet)  coins = $bon2win $valuta ";//***********
          }
         else
          {
            echo "&bonus1_winning_comment=Congratulate You have won a super bonus !!!  coins = $bon2win $valuta ";//***********
            //congratulate you have won a super bonus
          }
        }
        echo "&end_bonus=$bonusend";
       //9232 9299
      }// end bonus1
     // echo "#&BP&$bonuscup";
     // echo "#&BR&$bonuscur";
    //  echo "#&BN&$bon2win";
     if ( $bon2win > 0 )//****************************************************************************************************************************
      {
               //   echo "&BWN1==$bon2win";
               //   echo "&BCP==$bonuscup";
		if ($dur == "wmr") 
			mysql_query("update users set cash=cash+'$bon2win' where login='$l'");//**********************************************************************
		else 
			$_SESSION['balans']+=$bon2win; //virtual cash (fun)

        // cash mode
		if ($dur == "wmr") {
			if ( $mode0001 == "on" )// mode public cash
			 {
			   mysql_query("update game_bank set bank=bank-'$bon2win'
	where name='ttuz'");//**************************************************************
			 }
			if ( $mode0002 == "on" )//mode public 25 lines cash
			 {
			   mysql_query("update game_bank set bank=bank-'$bon2win'
	where name='25linb2'");//**********************************
			 }
			if ( $mode0004 == "on" )//mode private slot cash
			 {
			   mysql_query("update game_bank set bonus=bonus-'$bon2win'
	where name='$gamegb'");//**********************************
			 }
       // end cash mode 
	   }
	   //                                           | 1 игра  | 2 игра  | 3 игра  | 4 игра  | 5 игра  |//
       //                                                           1 десяток|2 десяток|3 десяток|4 десяток|5 десяток|6 десяток	
       //                                                           1234567890123456789012345678901234567890123456789012
       // mysql_query("update users set cash=cash+'$bon2win', mode='1|xx:xx:xxx|xx:xx:xxx|xx:xx:xxx|xx:xx:xxx|xx:xx:xxx|' where login='$l'");//*********
       //                                           номер бонус игры|  |  |   |
       //                                                     позиция  |  |   |
       //                                   тип приза на выбранной позиции|   |
       //                                     сумма приза на выбранной позиции|
      }
      // вставляем статистику
      mysql_query("INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$user_balance','$allbet','$bon2win','$game-$statgame')");//************//менеем аллвин на вин в текущем интервале
      $rowd = mysql_fetch_array(mysql_query("select * from users where login='$l'"));
	  $balans = ($dur == 'fun') ? $_SESSION['balans'] : $rowd[$row_cash];
       echo "&error=$errorcode";
       echo "&credit=$balans";
       echo "&session_jeu=$sessionj";

   } //end bonus

  if ( $statgame == "spin" )
   {
   // при проверке надо учесть чтобы $allbet был равен $incoins * $inlines !!! важно
    $betjp = 0 ;
    $betbn = 0 ;
    $betout = 0;
    $bankin = 0;
    if ($mode0010 == "on")
     {
      $betjp  = $allbet / 100 * $rowg['jpotproc']   ;   //забираем в джек пот
     }
     $betbn  = $allbet / 100 * $rowg['bonusproc']   ; //забираем в бонус игры
     $betin  = $allbet / 100 * $rowg['income']      ; //забираем в кассу заведения
     $betout = $betbn + $betjp + $betin             ;
     $bankin = $allbet - $betout                    ;
        // 2 - casino                                                              // 250|   10    |   25   |  10х25=250
     //mysql_query("update users set cash=cash-'$allbet', win_double='not', holdset='$allbet| $linebet|$linecon|' where login='$l'");
	 if ($dur == "wmr") {
       mysql_query("update users set cash=cash-'$allbet', win_double='not', holdset='$allbet|$coinson |$linecon|' where login='$l'");

  		// cash mode
    if ( $mode0001 == "on" )// mode public cash
     {         // 3 - casino
         mysql_query("update game_bank set bank=bank+'$bankin ',jackpot=jackpot+'$betjp' where name='ttuz'");
         mysql_query("update users set bonus=bonus+'$betbn',incash=incash+'$betin' where name='$gamegb'");
     }
         if ($mode0002 == "on")//mode public 9 lines cash
     {
         mysql_query("update game_bank set jackpot=jackpot+'$betjp' where name='ttuz'");
         mysql_query("update game_bank set bank=bank+'$bankin',incash=incash+'$betin' where name='25linb2'");
         mysql_query("update users set bonus=bonus+'$betbn' where name='$gamegb'");
     }
    if ($mode0004 == "on")//mode private slot cash
     {
         mysql_query("update game_bank set jackpot=jackpot+'$betjp' where name='ttuz'");
         mysql_query("update game_bank set bank=bank+'$bankin', bonus=bonus+'$betbn',incash=incash+'$betin' where name='$gamegb'");
     }// end cash mode
    } else { //virtual cash (fun)
        $_SESSION['balans'] -= $allbet;
    } 

        // Запускаем генератор (временный)
      srand ((double) microtime()*1000000);
      $sim1 = rand( 4,45 );//4,32
      $sim2 = rand( 4,45 );//3,43
      $sim3 = rand( 4,45 );//3,49
      $sim4 = rand( 4,45 );//3,47
      $sim5 = rand( 4,45 );//3,45
     if ( $test == 2 )
       {

      //bon2
       $sim1 = 6;
       $sim2 = 23;
       $sim3 = 25;
       $sim4 = 16;
       $sim5 = 9;
      }
      //bon1
      
     if ( $test == 1)
      {
       $sim1 = 5;
       $sim2 = 6;
       $sim3 = 8;
       $sim4 = 9;
       $sim5 = 11;
      }
 		$wheel1[$startpos] = array("45","33","K","E","G","C","H","F","D","H","C","E","G","J","I","G","K","D","G","J","I","G","L","J","G","D","E","H","F","C","G","J","B","I","G","L","E","G","F","E","H","C","D","G","L","I","G");
		$wheel2[$startpos] = array("45","45","G","E","C","G","E","C","G","B","F","D","G","F","D","G","E","C","A","D","E","I","L","H","K","I","G","L","J","H","K","J","H","L","I","H","J","K","H","I","F","G","J","F","G","I","C");
		$wheel3[$startpos] = array("45","11","C","I","G","K","E","G","C","L","G","F","D","G","C","I","G","J","E","G","J","D","G","F","D","H","F","E","K","G","C","J","G","K","J","G","D","I","G","L","B","F","I","G","E","D","L");
		$wheel4[$startpos] = array("45","17","G","I","H","G","I","B","G","H","L","G","B","F","G","K","H","G","J","E","G","D","F","G","C","D","A","E","C","G","E","D","G","C","F","G","K","H","L","J","G","I","H","J","G","D","E");
		$wheel5[$startpos] = array("45","24","L","B","G","D","J","G","C","H","G","E","F","G","L","J","G","H","D","G","E","K","G","H","E","G","C","H","G","D","J","G","F","K","G","I","C","G","J","F","G","K","I","G","E","J","G");
    if ( $wildon == "1" )
    {
		 $sim2=18;
		 $sim4=28;
		}

	          // 2                        3
	   $wheel1[$seconpos] =   $wheel1[$startpos];
	   array_unshift ($wheel1[$seconpos], $queue);
	            //1                         2
	   $wheel1[$thirdpos] =   $wheel1[$seconpos];
	   array_unshift ($wheel1[$thirdpos], $queue);
	    //----
	   $wheel2[$seconpos] =   $wheel2[$startpos];
	   array_unshift ($wheel2[$seconpos], $queue);

	   $wheel2[$thirdpos] =   $wheel2[$seconpos];
	   array_unshift ($wheel2[$thirdpos], $queue);
	    //----
	   $wheel3[$seconpos] =   $wheel3[$startpos];
	   array_unshift ($wheel3[$seconpos], $queue);

	   $wheel3[$thirdpos] =   $wheel3[$seconpos];
	   array_unshift ($wheel3[$thirdpos], $queue);
	    //----
	   $wheel4[$seconpos] =   $wheel4[$startpos];
	   array_unshift ($wheel4[$seconpos], $queue);

	   $wheel4[$thirdpos] =   $wheel4[$seconpos];
	   array_unshift ($wheel4[$thirdpos], $queue);
	    //----
	   $wheel5[$seconpos] =   $wheel5[$startpos];
	   array_unshift ($wheel5[$seconpos], $queue);

	   $wheel5[$thirdpos] =   $wheel5[$seconpos];
	   array_unshift ($wheel5[$thirdpos], $queue);
	  	//матрица линий от 1 до 25

                      //  Первый 0 9         | Второй 10 - 19    | 20 - 25  |
       	              //(0 1 2 3 4 5 6 7 8 9 0 1 2 3 4 5 6 7 8 9 0 1 2 3 4 5);
		$set_wheel1 = array (0,2,1,3,1,3,1,3,2,2,1,3,1,3,2,2,1,3,1,3,1,3,1,3,1,3);
		$set_wheel2 = array (0,2,1,3,2,2,1,3,1,3,1,3,2,2,1,3,1,3,2,2,3,1,1,3,3,1);
		$set_wheel3 = array (0,2,1,3,3,1,2,2,1,3,1,3,3,1,2,2,2,2,2,2,1,3,3,1,3,1);
		$set_wheel4 = array (0,2,1,3,2,2,1,3,1,3,2,2,3,1,1,3,3,1,2,2,3,1,1,3,3,1);
		$set_wheel5 = array (0,2,1,3,1,3,1,3,2,2,3,1,3,1,2,2,3,1,1,3,1,3,1,3,1,3);

  	$den = $mapmin;
   	$set_win = $mapmin;

     for ( $set_line = $set_wheel1[2]; $set_line <= $linecon ; $set_line++)
      {
        if ( $sim2 == 18 or $sim2 == 19 or $sim2 == 20 )
         {
         	$wild_2 = "A";
         }
        if ( $sim4 == 26 or $sim4 == 27 or $sim4 == 28 )
         {
         	$wild_4 = "A";
         }
         

        $set_win++;
        $win_line_[$set_line] = $mapmin ;
        $display_line_[$set_line] = "$set_wheel1[$mapmin]$set_wheel2[$mapmin]$set_wheel3[$mapmin]$set_wheel4[$mapmin]$set_wheel5[$mapmin]";

             $varsl1 =  $wheel1[$set_wheel1[$set_line]];
             $varsl2 =  $wheel2[$set_wheel2[$set_line]];
             $varsl3 =  $wheel3[$set_wheel3[$set_line]];
             $varsl4 =  $wheel4[$set_wheel4[$set_line]];
             $varsl5 =  $wheel5[$set_wheel5[$set_line]];

           //Символы 
       if ( ( $varsl1[$sim1] == "I" && $varsl2[$sim2] == "I" && $varsl3[$sim3] == "I" )
         or ( $varsl1[$sim1] == "J" && $varsl2[$sim2] == "J" && $varsl3[$sim3] == "J" )
         or ( $varsl1[$sim1] == "K" && $varsl2[$sim2] == "K" && $varsl3[$sim3] == "K" )
         or ( $varsl1[$sim1] == "L" && $varsl2[$sim2] == "L" && $varsl3[$sim3] == "L" ) )
           {
             $wins[$set_win] = $linebet * 5;
             $win_line_[$set_line] = "$wins[$set_win]";
             $display_line_[$set_line] = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]00";
           }
           //.. с права
       if ( ( $varsl3[$sim3] == "I" && $varsl4[$sim4] == "I" && $varsl5[$sim5] == "I" )
         or ( $varsl3[$sim3] == "J" && $varsl4[$sim4] == "J" && $varsl5[$sim5] == "J" )
         or ( $varsl3[$sim3] == "K" && $varsl4[$sim4] == "K" && $varsl5[$sim5] == "K" )
         or ( $varsl3[$sim3] == "L" && $varsl4[$sim4] == "L" && $varsl5[$sim5] == "L" ) )
           {
             $wins[$set_win] = $linebet * 5;
             $win_line_[$set_line] = "$wins[$set_win]";
             $display_line_[$set_line] = "00$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";
           }
           // 4 символа с лева
       if ( ( $varsl1[$sim1] == "I" && $varsl2[$sim2] == "I" && $varsl3[$sim3] == "I" && $varsl4[$sim4] == "I" )
         or ( $varsl1[$sim1] == "J" && $varsl2[$sim2] == "J" && $varsl3[$sim3] == "J" && $varsl4[$sim4] == "J" )
         or ( $varsl1[$sim1] == "K" && $varsl2[$sim2] == "K" && $varsl3[$sim3] == "K" && $varsl4[$sim4] == "K" )
         or ( $varsl1[$sim1] == "L" && $varsl2[$sim2] == "L" && $varsl3[$sim3] == "L" && $varsl4[$sim4] == "L" ) )
          {
            $wins[$set_win] = $linebet * 25;
            $win_line_[$set_line] = "$wins[$set_win]";
            $display_line_[$set_line] = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]$varsl4[$sim4]0";
          }
           // .. с права
       if ( ( $varsl2[$sim2] == "I" && $varsl3[$sim3] == "I" && $varsl4[$sim4] == "I" && $varsl5[$sim5] == "I" )
         or ( $varsl2[$sim2] == "J" && $varsl3[$sim3] == "J" && $varsl4[$sim4] == "J" && $varsl5[$sim5] == "J" )
         or ( $varsl2[$sim2] == "K" && $varsl3[$sim3] == "K" && $varsl4[$sim4] == "K" && $varsl5[$sim5] == "K" )
         or ( $varsl2[$sim2] == "L" && $varsl3[$sim3] == "L" && $varsl4[$sim4] == "L" && $varsl5[$sim5] == "L" ) )
          {
            $wins[$set_win] = $linebet * 25;
            $win_line_[$set_line] = "$wins[$set_win]";
            $display_line_[$set_line] = "0$varsl2[$sim2]$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";
          }
           // 5 символа
       if ( ( $varsl1[$sim1] == "I" && $varsl2[$sim2] == "I" && $varsl3[$sim3] == "I" && $varsl4[$sim4] == "I"  && $varsl5[$sim5] == "I" )
         or ( $varsl1[$sim1] == "J" && $varsl2[$sim2] == "J" && $varsl3[$sim2] == "J" && $varsl4[$sim2] == "J"  && $varsl5[$sim2] == "J" )
         or ( $varsl1[$sim1] == "K" && $varsl2[$sim2] == "K" && $varsl3[$sim2] == "K" && $varsl4[$sim2] == "K"  && $varsl5[$sim2] == "K" )
         or ( $varsl1[$sim1] == "L" && $varsl2[$sim2] == "L" && $varsl3[$sim2] == "L" && $varsl4[$sim2] == "L"  && $varsl5[$sim2] == "L" ) )
          {
           $wins[$set_win] = $linebet * 100;
           $win_line_[$set_line] = "$wins[$set_win]";
           $display_line_[$set_line] = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";
          }

           //Символы 
       if ( ( $varsl1[$sim1] == "E" ) && ( $varsl2[$sim2] == "E" or $wild_2 == "A" )
         or ( $varsl1[$sim1] == "F" ) && ( $varsl2[$sim2] == "F" or $wild_2 == "A" ) )
          {
           $wins[$set_win] = $linebet * 2;
           $win_line_[$set_line]  = $wins[$set_win];

           if ($wild_2 == "A")
            {
             $display_line_[$set_line]  = "$varsl1[$sim1]$varsl1[$sim1]000";
             $wild2 = 1;
            }
           else
            {
             $display_line_[$set_line]  = "$varsl1[$sim1]$varsl2[$sim2]000";
            }
          }
           // ... с права
       if ( ( $varsl4[$sim4] == "E" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "E" )
         or ( $varsl4[$sim4] == "F" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "F" ) )
          {
           $wins[$set_win] = $linebet * 2;
           $win_line_[$set_line]  = $wins[$set_win];

           if ($wild_4 == "A")
            {
             $display_line_[$set_line]  = "000$varsl5[$sim5]$varsl5[$sim5]";
             $wild4 = 1;
             $wild2 = 0;
            }
           else
            {
             $display_line_[$set_line]  = "000$varsl4[$sim4]$varsl5[$sim5]";
            }
          }

           // 3 символа ...с лева
       if ( ( $varsl1[$sim1] == "E" ) && ( $varsl2[$sim2] == "E" or $wild_2 == "A" ) && ( $varsl3[$sim3] == "E" )
         or ( $varsl1[$sim1] == "F" ) && ( $varsl2[$sim2] == "F" or $wild_2 == "A" ) && ( $varsl3[$sim3] == "F" ) )
          {
            $wins[$set_win] = $linebet * 20;
            $win_line_[$set_line]  = $wins[$set_win];

           if ($wild_2 == "A")
            {
             $display_line_[$set_line]  = "$varsl1[$sim1]$varsl1[$sim1]$varsl3[$sim3]00";
             $wild2 = 1;
            }
           else
            {
             $display_line_[$set_line]  = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]00";
            }
          }

           // ... с права
       if ( ( $varsl3[$sim3] == "E" ) && ( $varsl4[$sim4] == "E" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "E" )
         or ( $varsl3[$sim3] == "F" ) && ( $varsl4[$sim4] == "F" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "F" ) )
         {
           $wins[$set_win] = $linebet * 20;
           $win_line_[$set_line]  = $wins[$set_win];

           if ($wild_4 == "A")
            {
             $display_line_[$set_line]  = "00$varsl3[$sim3]$varsl5[$sim5]$varsl5[$sim5]";
             $wild4 = 1;
             $wild2 = 0;
            }
           else
            {
             $display_line_[$set_line]  = "00$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";
            }
          }

           // 4 символа ...с лева
       if ( ( $varsl1[$sim1] == "E" ) && ( $varsl2[$sim2] == "E" or $wild_2 == "A" ) && ( $varsl3[$sim3] == "E" ) && ( $varsl4[$sim4] == "E" )
         or ( $varsl1[$sim1] == "F" ) && ( $varsl2[$sim2] == "F" or $wild_2 == "A" ) && ( $varsl3[$sim3] == "F" ) && ( $varsl4[$sim4] == "F" ) )
          {
           $wins[$set_win] = $linebet * 75;
           $win_line_[$set_line]  = $wins[$set_win];

           if ($wild_2 == "A")
            {
             $display_line_[$set_line]  = "$varsl1[$sim1]$varsl1[$sim1]$varsl3[$sim3]$varsl4[$sim4]0";
             $wild2 = 1;
            }
           else
            {
             $display_line_[$set_line]  = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]$varsl4[$sim4]0";
            }
          }

           // ... с права
       if ( ( $varsl2[$sim2] == "E" ) && ( $varsl3[$sim3] == "E" ) && ( $varsl4[$sim4] == "E" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "E" )
         or ( $varsl2[$sim2] == "F" ) && ( $varsl3[$sim3] == "F" ) && ( $varsl4[$sim4] == "F" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "F" ) )
          {
           $wins[$set_win] = $linebet * 75;
           $win_line_[$set_line]  = $wins[$set_win];

           if ($wild_4 == "A")
            {
             $display_line_[$set_line]  = "0$varsl2[$sim2]$varsl3[$sim3]$varsl5[$sim5]$varsl5[$sim5]";
             $wild4 = 1;
             $wild2 = 0;
            }
           else
            {
             $display_line_[$set_line]  = "0$varsl2[$sim2]$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";
            }
          }

           // 5 символа
       if ( ( $varsl1[$sim1] == "E" ) && ( $varsl2[$sim2] == "E" or $wild_2 == "A" ) && ( $varsl3[$sim3] == "E" ) && ( $varsl4[$sim4] == "E" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "E" )
         or ( $varsl1[$sim1] == "F" ) && ( $varsl2[$sim2] == "F" or $wild_2 == "A" ) && ( $varsl3[$sim3] == "F" ) && ( $varsl4[$sim4] == "F" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "F" ) )
          {
           $wins[$set_win] = $linebet * 250;
           $win_line_[$set_line]  = $wins[$set_win];
           $display_line_[$set_line]  = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";

           if ( $wild_2 == "A" )
            {
             $display_line_[$set_line]  = "$varsl1[$sim1]$varsl1[$sim1]$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";
             $wild2 = 1;
            }
           if ( $wild_4 == "A" )
            {
             $display_line_[$set_line]  = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]$varsl5[$sim5]$varsl5[$sim5]";
             $wild4 = 1;
             $wild2 = 0;
            }
           if ( $wild_2 == "A" && $wild_4 == "A" )
            {
             $display_line_[$set_line]  = "$varsl1[$sim1]$varsl1[$sim1]$varsl3[$sim3]$varsl5[$sim5]$varsl5[$sim5]";
             $wild2 = 1;
             $wild4 = 1;
            }
          }

       if ( ( $varsl1[$sim1] == "C" ) && ( $varsl2[$sim2] == "C" or $wild_2 == "A" )
         or ( $varsl1[$sim1] == "D" ) && ( $varsl2[$sim2] == "D" or $wild_2 == "A" ) )
         {
           $wins[$set_win] = $linebet * 5;
           $win_line_[$set_line] = $wins[$set_win];

          if ( $wild_2 == "A" )
           {
            $display_line_[$set_line]  = "$varsl1[$sim1]$varsl1[$sim1]000";
            $wild2 = 1;
           }
          else
           {
            $display_line_[$set_line]  = "$varsl1[$sim1]$varsl2[$sim2]000";
           }
         }
           // ... с права
       if ( ( $varsl4[$sim4] == "C" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "C" )
         or ( $varsl4[$sim4] == "D" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "D" ) )
          {
           $wins[$set_win] = $linebet * 5;
           $win_line_[$set_line] = $wins[$set_win];

          if ( $wild_4 == "A" )
           {
            $display_line_[$set_line] = "000$varsl5[$sim5]$varsl5[$sim5]";
            $wild4 = 1;
            $wild2 = 0;
           }
          else
           {
            $display_line_[$set_line] = "000$varsl4[$sim4]$varsl5[$sim5]";
           }
          }
           // 3 символа ...с лева
       if ( ( $varsl1[$sim1] == "C" ) && ( $varsl2[$sim2] == "C" or $wild_2 == "A" ) && ( $varsl3[$sim3] == "C" )
        or  ( $varsl1[$sim1] == "D" ) && ( $varsl2[$sim2] == "D" or $wild_2 == "A" ) && ( $varsl3[$sim3] == "D" ) )
         {
           $wins[$set_win] = $linebet * 40;
           $win_line_[$set_line] = $wins[$set_win];

          if ( $wild_2 == "A" )
           {
            $display_line_[$set_line] = "$varsl1[$sim1]$varsl1[$sim1]$varsl3[$sim3]00";
            $wild2 = 1;
           }
          else
           {
            $display_line_[$set_line] = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]00";
           }
         }
        // ... с права
       if ( ( $varsl3[$sim3] == "C" ) && ( $varsl4[$sim4] == "C" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "C" )
         or ( $varsl3[$sim3] == "D" ) && ( $varsl4[$sim4] == "D" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "D" ) )
          {
           $wins[$set_win] = $linebet * 40;
           $win_line_[$set_line] = $wins[$set_win];

           if ( $wild_4 == "A" )
            {
             $display_line_[$set_line] = "00$varsl3[$sim3]$varsl5[$sim5]$varsl5[$sim5]";
             $wild4 = 1;
             $wild2 = 0;
            }
           else
            {
             $display_line_[$set_line] = "00$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";
            }
          }
          // 4 символа ...с лева
       if ( ( $varsl1[$sim1] == "C" ) && ( $varsl2[$sim2] == "C" or $wild_2 == "A" ) && ( $varsl3[$sim3] == "C" ) && ( $varsl4[$sim4] == "C" )
         or ( $varsl1[$sim1] == "D" ) && ( $varsl2[$sim2] == "D" or $wild_2 == "A" ) && ( $varsl3[$sim3] == "D" ) && ( $varsl4[$sim4] == "D" ) )
          {
           $wins[$set_win] = $linebet * 100;
           $win_line_[$set_line] = $wins[$set_win];

           if ( $wild_2 == "A" )
            {
             $display_line_[$set_line] = "$varsl1[$sim1]$varsl1[$sim1]$varsl3[$sim3]$varsl4[$sim4]0";
             $wild2 = 1;
            }
           else
            {
             $display_line_[$set_line] = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]$varsl4[$sim4]0";
            }
          }
         // ... с права
       if ( ( $varsl2[$sim2] == "C" ) && ( $varsl3[$sim3] == "C" ) && ( $varsl4[$sim4] == "C" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "C" )
         or ( $varsl2[$sim2] == "D" ) && ( $varsl3[$sim3] == "D" ) && ( $varsl4[$sim4] == "D" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "D" ) )
          {
           $wins[$set_win] = $linebet * 100;
           $win_line_[$set_line] = $wins[$set_win];

           if ( $wild_4 == "A" )
            {
             $display_line_[$set_line] = "0$varsl2[$sim2]$varsl3[$sim3]$varsl5[$sim5]$varsl5[$sim5]";
             $wild4 = 1;
             $wild2 = 0;
            }
           else
            {
             $display_line_[$set_line] = "0$varsl2[$sim2]$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";
            }
          }
         // 5 символа
       if ( ( $varsl1[$sim1] == "C" ) && ( $varsl2[$sim2] == "C" or $wild_2 == "A" ) && ( $varsl3[$sim3] == "C" ) && ( $varsl4[$sim4] == "C" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "C" )
         or ( $varsl1[$sim1] == "D" ) && ( $varsl2[$sim2] == "D" or $wild_2 == "A" ) && ( $varsl3[$sim3] == "D" ) && ( $varsl4[$sim4] == "D" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "D" ) )
          {
           $wins[$set_win] = $linebet * 500;
           $win_line_[$set_line] = $wins[$set_win];
           $display_line_[$set_line] = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";

           if ($wild_2 == "A")
            {
             $display_line_[$set_line]  = "$varsl1[$sim1]$varsl1[$sim1]$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";
             $wild2 = 1;
            }
           if ($wild_4 == "A")
            {
             $display_line_[$set_line]  = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]$varsl5[$sim5]$varsl5[$sim5]";
             $wild4 = 1;
             $wild2 = 0;
            }
           if ( $wild_2 == "A" && $wild_4 == "A")
            {
             $display_line_[$set_line]  = "$varsl1[$sim1]$varsl1[$sim1]$varsl3[$sim3]$varsl5[$sim5]$varsl5[$sim5]";
             $wild2 = 1;
             $wild4 = 1;
            }
          }




       if ( ( $varsl1[$sim1] == "B" ) && ( $varsl2[$sim2] == "B" or $wild_2 == "A" ) )
         {
           $wins[$set_win] = $linebet * 10;
           $win_line_[$set_line] = $wins[$set_win];

          if ( $wild_2 == "A" )
           {
            $display_line_[$set_line] = "$varsl1[$sim1]$varsl1[$sim1]000";
            $wild2 = 1;
           }
          else
           {
            $display_line_[$set_line] = "$varsl1[$sim1]$varsl2[$sim2]000";
           }
         }
         // ... с права
       if ( ( $varsl4[$sim4] == "B" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "B" ) )
         {
           $wins[$set_win] = $linebet * 10;
           $win_line_[$set_line] = $wins[$set_win];
           $display_line_[$set_line] = "000$varsl4[$sim4]$varsl5[$sim5]";

          if ( $wild_4 == "A" )
           {
            $display_line_[$set_line] = "000$varsl5[$sim5]$varsl5[$sim5]";
            $wild4 = 1;
            $wild2 = 0;
           }
          else
           {
            $display_line_[$set_line] = "000$varsl4[$sim4]$varsl5[$sim5]";
           }
         }
         // 3 символа ...с лева
       if ( ( $varsl1[$sim1] == "B" ) && ( $varsl2[$sim2] == "B"  or $wild_2 == "A" ) && ( $varsl3[$sim3] == "B" ) )
         {
           $wins[$set_win] = $linebet * 75;
           $win_line_[$set_line] = $wins[$set_win];

          if ( $wild_2 == "A" )
           {
            $display_line_[$set_line] = "$varsl1[$sim1]$varsl1[$sim1]$varsl3[$sim3]00";
            $wild2 = 1;
           }
          else
           {
            $display_line_[$set_line] = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]00";
           }
         }
         // ... с права
       if ( ( $varsl3[$sim3] == "B" ) && ( $varsl4[$sim4] == "B" or $wild_4 == "A" ) && ( $varsl5[$sim5] == "B" ) )
         {
           $wins[$set_win] = $linebet * 75;
           $win_line_[$set_line] = $wins[$set_win];

          if ( $wild_4 == "A" )
           {
            $display_line_[$set_line] = "00$varsl3[$sim3]$varsl5[$sim5]$varsl5[$sim5]";
            $wild4 = 1;
            $wild2 = 0;
           }
          else
           {
            $display_line_[$set_line] = "00$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";
           }
         }
         // 4 символа ...с лева
       if ( ( $varsl1[$sim1] == "B" ) && ( $varsl2[$sim2] == "B"  or $wild_2 == "A" ) && ( $varsl3[$sim3] == "B" ) && ( $varsl4[$sim4] == "B" ) )
         {
           $wins[$set_win] = $linebet * 500;
           $win_line_[$set_line] = $wins[$set_win];

          if ( $wild_2 == "A" )
           {
            $display_line_[$set_line] = "$varsl1[$sim1]$varsl1[$sim1]$varsl3[$sim3]$varsl4[$sim4]0";
            $wild2 = 1;
           }
          else
           {
            $display_line_[$set_line] = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]$varsl4[$sim4]0";
           }
         }
         // ... с права
      if ( ( $varsl2[$sim2] == "B" ) && ( $varsl3[$sim3] == "B" ) && ( $varsl4[$sim4] == "B"  or $wild_4 == "A" ) && ( $varsl5[$sim5] == "B" ) )
         {
           $wins[$set_win] = $linebet * 500;
           $win_line_[$set_line] = $wins[$set_win];

          if ( $wild_4 == "A" )
           {
            $display_line_[$set_line] = "0$varsl2[$sim2]$varsl3[$sim3]$varsl5[$sim5]$varsl5[$sim5]";
            $wild4 = 1;
            $wild2 = 0;
           }
          else
           {
            $display_line_[$set_line] = "0$varsl2[$sim2]$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";
           }
         }
         // 5 символа
      if ( ( $varsl1[$sim1] == "B" ) && ( $varsl2[$sim2] == "B" or $wild_2 == "A" ) && ( $varsl3[$sim3] == "B" ) && ( $varsl4[$sim4] == "B" or $wild_4 == "A" )  && ( $varsl5[$sim5] == "B" ) )
         {
           $wins[$set_win] = $linebet * 5000;
           $win_line_[$set_line] = $wins[$set_win];
           $display_line_[$set_line] = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";

          if ( $wild_2 == "A" )
           {
            $display_line_[$set_line]  = "$varsl1[$sim1]$varsl1[$sim1]$varsl3[$sim3]$varsl4[$sim4]$varsl5[$sim5]";
            $wild2 = 1;
           }
          if ( $wild_4 == "A" )
           {
            $display_line_[$set_line]  = "$varsl1[$sim1]$varsl2[$sim2]$varsl3[$sim3]$varsl5[$sim5]$varsl5[$sim5]";
            $wild4 = 1;
            //$wild2 = 0;
           }

          if ( $wild_2 == "A" && $wild_4 == "A" )
           {
            $display_line_[$set_line]  = "$varsl1[$sim1]$varsl1[$sim1]$varsl3[$sim3]$varsl5[$sim5]$varsl5[$sim5]";
            $wild2 = 1;
            $wild4 = 1;
           }
         }
           $allwin = $allwin + $wins[$set_win];
         // бонус 2
       if ( ( $varsl1[$sim1] == "H" && $varsl2[$sim2] == "H" && $varsl3[$sim3] == "H" && $bscatter < 3 )
         or ( $varsl2[$sim2] == "H" && $varsl3[$sim3] == "H" && $varsl4[$sim4] == "H" && $bscatter < 3 )
         or ( $varsl3[$sim3] == "H" && $varsl4[$sim4] == "H" && $varsl5[$sim5] == "H" && $bscatter < 3 ) )

         {
           $btype = 2; // запоминаем тип бонуса
           $bscatter = 3; // запоминаем количество символов
           $bonus_2 = 1;
           $bonwin = $allwin + $allbet * 2;
         }
       if ( ( $varsl1[$sim1] == "H" && $varsl2[$sim2] == "H" && $varsl3[$sim3] == "H" && $varsl4[$sim4] == "H" && $bscatter < 4 )
         or ( $varsl2[$sim2] == "H" && $varsl3[$sim3] == "H" && $varsl4[$sim4] == "H"  && $varsl5[$sim5] == "H"  && $bscatter < 4) )
         {
           $btype = 2; // запоминаем тип бонуса
           $bscatter = 4; // запоминаем количество символов
           $bonus_2 = 1;
           $bonwin = $allwin + $allbet * 4;
         }

       if (  $varsl1[$sim1] == "H" && $varsl2[$sim2] == "H" &&  $varsl3[$sim3] == "H" && $varsl4[$sim4] == "H" && $varsl5[$sim5] == "H" )
         {
           $btype = 2; // запоминаем тип бонуса
           $bscatter = 5; // запоминаем количество символов
           $bonus_2 = 1;
           $bonwin = $allwin + $allbet * 10;
         }

         // бонус 1
       if ( $varsl1[$sim1] == "G" && $varsl2[$sim2] == "G" && $varsl3[$sim3] == "G" && $varsl4[$sim4] == "G"  && $varsl5[$sim5] == "G" )
         {
           $btype = 1;// запоминаем тип бонуса
           $bonus_1 = 1;
           $bonus_2 = 0;
           $bonwin = $allwin + $allbet * 2;
         }
           //если выпало два wilds          
         if ( $wild_2 == "A" && $wild_4 == "A" )
          {
            $wild2a[$set_line] = $wild2;   
            $wild4a[$set_line] = $wild4;   
          }
        //=============================

      if ($set_line == $linecon )
        { 
         if ( $wild_2 == "A" && $wild_4 == "A" )// если выпало два wilds ищем комбинацию слева
          {
            
          for ( $set_wild = 1; $set_wild <= $linecon ; $set_wild++)
            {
               $wild2b = $wild2a[$set_wild];   
               $wild4b = $wild4a[$set_wild];   
             if ( $wild2b == 1 && $wild4b == 0 )
              {
               $wild2 = 1;// если находим то включаем левый (wild2)
              }
            
            }
          }  
          //$limit=0; //only for tester
          //проверяем можем ли заплатить если нет тогда все сначало

          $cashlimit = limiterr( $segment );
		  $allwin *= $multiplier; //---
         if ( ( $allwin >= $cashlimit ) or ( $allwin > $limit ) or ( $bonwin >= $cashlimit )  or ( $bonwin > $limit ) )
          {
              srand ((double) microtime()*1000000);
            $sim1 = rand( 5,45 );
            $sim2 = rand( 5,45 );
            $sim3 = rand( 5,45 );
            $sim4 = rand( 5,45 );
            $sim5 = rand( 5,45 );
            $set_line = 0       ;
            $allwin   = 0       ;
            $bonus_2  = 0       ;
            $bonus_1  = 0       ;
            $bonwin   = 0       ;
            $btype    = 0       ; // забываем тип бонуса
            $bscatter = 0       ; // забываем количество символов
            $wild_2   = "NO"    ;
            $wild2    = 0       ;
            $wild_4   = "NO"    ;
            $wild4    = 0       ;
            $den++;
            if ($den > 99 )       // допустмое количество циклов
             {
                  $set_line = $linecon;
                  echo "error=1";
             }
          }
        }

       }//end for





    if ( $allwin > 0 && $dur == 'wmr')
    {

        mysql_query("update users set cash=cash+'$allwin' where login='$l'");

        // cash mode
        if ($mode0001 == "on")// mode public cash
         {
           mysql_query("update game_bank set bank=bank-'$allwin' where name='ttuz'");
         }
        if ($mode0002 == "on")//mode public 25 lines cash
         {
           mysql_query("update game_bank set bank=bank-'$allwin' where name='25linb2'");
         }
        if ($mode0004 == "on")//mode private slot cash
         {
           mysql_query("update game_bank set bank=bank-'$allwin' where name='$gamegb'");
         }
        // end cash mode
    } else { //virtual cash (fun)
        $_SESSION['balans'] += $allwin;
    }

      //-----------------
              // 4 - casino
	//if ($dur == "wmr")
      mysql_query("update users set mode2='btype|$btype|bscatter|$bscatter', mode='$bonusnum|$bonuspos[1]:$bonustyp[1]:$bonussum[1]|$bonuspos[2]:$bonustyp[2]:$bonussum[2]|$bonuspos[3]:$bonustyp[3]:$bonussum[3]|$bonuspos[4]:$bonustyp[4]:$bonussum[4]|$bonuspos[5]:$bonustyp[5]:$bonussum[5]|$bonuspos[6]:$bonustyp[6]:$bonussum[6]|' where login='$l'");
      mysql_query("INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$user_balance','$allbet','$allwin','$game-$statgame')");
      $rowd = mysql_fetch_array(mysql_query("select * from users where login='$l'"));
      $allcoi = $allwin / $coinsmode ; 
	  $balans = ($dur == 'fun') ? $_SESSION['balans'] : $rowd[$row_cash];
     $set_line = 1;
     echo                       "&GEN=$den";
     echo          "&varsl1=$varsl1[$sim1]";
     echo                  "&wild_2=$wild2";
     echo                  "&wild_4=$wild4";
     echo               "&error=$errorcode";//=0
     echo               "&bonus_1=$bonus_1";
     echo     "&bonus_1_line=$bonus_1_line";
     echo               "&bonus_2=$bonus_2";
     echo        "&credit=$balans";
     echo             "&coinsize=$coinsize";
     echo        "&total_win_money=$allwin";
     echo        "&total_win_coins=$allcoi";
     echo           "&session_jeu=69225457";
     echo   "&wheelsize1=1&wheelpos1=$sim1";
     echo   "&wheelsize2=1&wheelpos2=$sim2";
     echo   "&wheelsize3=1&wheelpos3=$sim3";
     echo   "&wheelsize4=1&wheelpos4=$sim4";
     echo   "&wheelsize5=1&wheelpos5=$sim5";


     for ( $win_line = 0; $win_line < $linecon ; $win_line++)
      {
        echo "&win_line_$set_line=$win_line_[$set_line]&display_line_$set_line=$display_line_[$set_line]";
       $set_line++;
      }
   }


?>