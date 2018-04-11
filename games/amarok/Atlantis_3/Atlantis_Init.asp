<? 



 error_reporting(0);
 unset($l);
 session_start();
 session_register($l);
 $dur = (isset($_SESSION['dur'])) ? $_SESSION['dur'] : 'wmr';
 
 if(!isset($l))
  {
   header( "Location: ../../login.php" );
   exit;
  }
 include ( "../../../setup.php" );
 $date = date( "d.m.y" );
 $time = date( "H:i:s" );


    //==================-настройки-=================================
   $row_cash = 3;  // порядковый номер строки в мускуле для баланса
   $result = "OK";
   $jpots = "0.00";
   $game = "Atlantis";
   $st = 1;
   $reporterr = "1"; 
   $coinsize = 1;
   $gamegb = "atlantis"; 
    //==============================================================
if ($dur == 'wmr') {	
   $result = mysql_query("select * from users where login='$l'");
   $row = mysql_fetch_array( $result );
   $balans = $row[$row_cash];
} else
    $_SESSION['balans'] = $balans = 10000; 
   $result = mysql_query("select * from game_bank where name='$gamegb'");
   $rowg = mysql_fetch_array( $result );
   $data_array = explode("|" , $rowg["mode2"]);



/*";
echo "
*/
$wheel1 = array("45","33","K","E","G","C","H","F","D","H","C","E","G","J","I","G","K","D","G","J","I","G","L","J","G","D","E","H","F","C","G","J","B","I","G","L","E","G","F","E","H","C","D","G","L","I","G");
$wheel2 = array("45","45","G","E","C","G","E","C","G","B","F","D","G","F","D","G","E","C","A","D","E","I","L","H","K","I","G","L","J","H","K","J","H","L","I","H","J","K","H","I","F","G","J","F","G","I","C");
$wheel3 = array("45","11","C","I","G","K","E","G","C","L","G","F","D","G","C","I","G","J","E","G","J","D","G","F","D","H","F","E","K","G","C","J","G","K","J","G","D","I","G","L","B","F","I","G","E","D","L");
$wheel4 = array("45","17","G","I","H","G","I","B","G","H","L","G","B","F","G","K","H","G","J","E","G","D","F","G","C","D","A","E","C","G","E","D","G","C","F","G","K","H","L","J","G","I","H","J","G","D","E");
$wheel5 = array("45","24","L","B","G","D","J","G","C","H","G","E","F","G","L","J","G","H","D","G","E","K","G","H","E","G","C","H","G","D","J","G","F","K","G","I","C","G","J","F","G","K","I","G","E","J","G");


echo "&currency=$data_array[1]";
echo "&lng=EN";
echo "&cas_log=YC";
echo "&pop_use=0";
echo "&pop_1disp=30";
echo "&pop_url=";
echo "&pop_var1=Do you want to play in real mode ?";
echo "&pop_var2=Yes";
echo "&pop_var3=No";
echo "&pop_var4=";
echo "&pop_var=";
echo "&pop_nextdisp=60";
echo "&pop_url=";
echo "&pop_var1=Do you want to play in real mode ?";
echo "&pop_var2=Yes";
echo "&pop_var3=No";
echo "&pop_var4=";
echo "&pop_var=";
echo "&rules=./index.php";
echo "&help=./index.php";
echo "&bank=/lobby/in.php";
echo "&casino=../../index.php";
echo "&t_alert1=Not enough credit, please check your account.";
echo "&t_alert2=Your session has expired, please log-in.";
echo "&t_alert3=Only play in one window.";
echo "&bonus_1=0";
echo "&bonus_2=0";
echo "&rebuild=0";
echo "&credit=$balans";
echo "&coinsize=$data_array[0]";
echo "&session_jeu=69225457";
echo "&error=0";


    echo "&wheelsize1=45";
    echo "&wheelpos1=33";
  for ( $nump = 2; $nump <= 45 ; $nump++)
  {
    echo "&wheel1_$nump=$wheel1[$nump]";
  }
  
    echo "&wheelsize2=45";
    echo "&wheelpos2=45";
  for ( $nump = 2; $nump <= 45 ; $nump++)
  {
    echo "&wheel2_$nump=$wheel2[$nump]";
  }

    echo "&wheelsize3=45";
    echo "&wheelpos3=11";
  for ( $nump = 2; $nump <= 45 ; $nump++)
  {
    echo "&wheel3_$nump=$wheel3[$nump]";
  }
    echo "&wheelsize4=45";
    echo "&wheelpos4=17";
  for ( $nump = 2; $nump <= 45 ; $nump++)
  {
    echo "&wheel4_$nump=$wheel4[$nump]";
  }
    echo "&wheelsize5=45";
    echo "&wheelpos5=24";
  for ( $nump = 2; $nump <= 45 ; $nump++)
  {
    echo "&wheel5_$nump=$wheel5[$nump]";
  }
echo "&t_close=CLOSE";
echo "&t_payouts=Payout";
echo "&t_nblines=Lines";
echo "&t_coinsperline=Coins/Line";
echo "&t_coinsize=Coin Value";
echo "&t_credit=Credit";
echo "&t_betvalue=Total Bet";
echo "&t_winpaid=Winpaid";
echo "&t_coins=Coins";
echo "&t_spin=Spin";
echo "&t_betmax=Max.Bet/SPIN";
echo "&t_play=SPIN";
echo "&t_backtogame=Back To Game";
echo "&t_help=Help";
echo "&t_exit=Exit";
echo "&t_rules=Rules";
echo "&t_info=Info.";
echo "&t_bank=Bank";

echo "&t_gameover1=Game";
echo "&t_gameover2=Over";


//Атлантис: Joker Rules
echo "&t_bonus2_a=THE GIANT SQUID";
echo "&t_bg2txt1_a=The giant squid is after Stéphanie. But sometimes, Stéphanie would like to have a quiet shower...";
echo "&t_bg2txt2_a=To help Stéphanie, select in the stockroom a box containing a weapon to get rid of the squid.";

echo "&t_info1_a=ATLANTIS";
echo "&t_info2_a=A good way to avoid pressure...";
echo "&t_info3_a=The Giant Squid !";
echo "&t_info4_a=Discover the Bonus N° 1 !";
echo "&t_info5_a=Play under the sea...";
echo "&t_info6_a=Up to 50.000 coins per line !";
echo "&t_info7_a=Bonus 2 tastes like Fish And Chips...";
echo "&t_previous=Previous";

echo "&t_bonus1_a=DINER'S READY !";
echo "&t_bg1txt1_a=7000 feet deep, nothing's better than a good Fish And Chips...";
echo "&t_bg1txt2_a=Go fishing until 3 identical creatures appear. Only these creatures pay. If the chips appears, the total reward is doubled.";

echo "&t_payoutstxt1_a=The Atlantis symbol is a Joker (It only appears on the second and fourth wheels). When a Joker symbol appears, it spreads across the whole wheel. It is then a Joker for the 3 positions of the wheel. The Joker can only replace the following symbols :";
echo "&t_payoutstxt3_a=start THE GIANT SQUID Bonus Game.";
echo "&t_payoutstxt4_a=5 Whale symbols on a line played start the DINER'S READY Bonus Game.";
echo "&t_payoutstxt5_a=The DINER'S READY Bonus Game start when 5 Whale symbols appear on a line played.";
echo "&t_payoutstxt6_a=Here we are in the deep sea. Each of the 24 fish hooks can catch a creature :";
echo "&t_payoutstxt7_a=The player selects fish hooks that will show the captured creature and its corresponding reward, until 3 identical creatures appear. Different rewards can be associated to a same creature, depending on the hook where it's located.";
echo "&t_payoutstxt8_a=As soon as 3 identical creatures have appeared, the game ends. If the Chips appear before 3 identical creatures appear, the total winning is doubled.";
echo "&t_payoutstxt9_a=At the end, the player wins the total of the 3 rewards associated to the identical creatures, doubled if the Chips were revealed, multiplied by the number of coins bet per line.";
echo "&t_payoutstxt10_a=The THE GIANT SQUID Bonus Game starts when 3, 4 or 5 Squid symbols show up on at least 3 adjacent wheels anywhere on screen as indicated on the diagram of the payout table.";
echo "&t_payoutstxt11_a=The Giant Squid is getting on Stéphanie's nerves. Help her to get rid of it...";
echo "&t_payoutstxt12_a=There are 5 different values of reward corresponding to the different weapons that will help Stéphanie to get rid of the squid.";
echo "&t_payoutstxt13_a=The reward varies, depending on how many Squid symbols have started the Bonus Games :";
echo "&t_payoutstxt19_a=The player wins the reward multiplied by the number of coins bet, multiplied by the number of lines played.";

echo "&t_previous=Previous";
echo "&t_next=Next";
echo "&t_paylines=Paylines";
echo "&t_family1=Family 1";
echo "&t_family2=Family 2";
echo "&t_specials=Specials";
echo "&t_bonusgame1=Bonus Game 1";
echo "&t_bonusgame2=Bonus Game 2";
echo "&t_copyright=Copyright";
echo "&t_payoutstxt0=The winning combinations are to be read from left to right and from the right to the left. Only the highest winning combination pays out per line.";
?>