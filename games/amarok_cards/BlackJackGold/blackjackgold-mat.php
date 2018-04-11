<?php
function scorecard( $sc )
{
    $tempcard = array( );
    $asc = explode( "|", $sc );
    $i = 0;
    for ( ; $i < count( $asc ); ++$i )
    {
        if ( $asc[$i] == 0 || $asc[$i] == 13 || $asc[$i] == 26 || $asc[$i] == 39 )
        {
            $vescard = 1;
            $tt = 1;
        }
        if ( $asc[$i] == 1 || $asc[$i] == 14 || $asc[$i] == 27 || $asc[$i] == 40 )
        {
            $vescard = 2;
        }
        if ( $asc[$i] == 2 || $asc[$i] == 15 || $asc[$i] == 28 || $asc[$i] == 41 )
        {
            $vescard = 3;
        }
        if ( $asc[$i] == 3 || $asc[$i] == 16 || $asc[$i] == 29 || $asc[$i] == 42 )
        {
            $vescard = 4;
        }
        if ( $asc[$i] == 4 || $asc[$i] == 17 || $asc[$i] == 30 || $asc[$i] == 43 )
        {
            $vescard = 5;
        }
        if ( $asc[$i] == 5 || $asc[$i] == 18 || $asc[$i] == 31 || $asc[$i] == 44 )
        {
            $vescard = 6;
        }
        if ( $asc[$i] == 6 || $asc[$i] == 19 || $asc[$i] == 32 || $asc[$i] == 45 )
        {
            $vescard = 7;
        }
        if ( $asc[$i] == 7 || $asc[$i] == 20 || $asc[$i] == 33 || $asc[$i] == 46 )
        {
            $vescard = 8;
        }
        if ( $asc[$i] == 8 || $asc[$i] == 21 || $asc[$i] == 34 || $asc[$i] == 47 )
        {
            $vescard = 9;
        }
        if ( $asc[$i] == 9 || $asc[$i] == 22 || $asc[$i] == 35 || $asc[$i] == 48 )
        {
            $vescard = 10;
        }
        if ( $asc[$i] == 10 || $asc[$i] == 23 || $asc[$i] == 36 || $asc[$i] == 49 )
        {
            $vescard = 10;
        }
        if ( $asc[$i] == 11 || $asc[$i] == 24 || $asc[$i] == 37 || $asc[$i] == 50 )
        {
            $vescard = 10;
        }
        if ( $asc[$i] == 12 || $asc[$i] == 25 || $asc[$i] == 38 || $asc[$i] == 51 )
        {
            $vescard = 10;
        }
        $tempcard[$i] = $vescard;
    }
    $tscore = array_sum( $tempcard );
    return $tscore;
}
function scorecard_dealer( $sc )
{
    $tempcard = array( );
    $asc = explode( "|", $sc );
    $tt = 0;
    $i = 0;
    for ( ; $i < count( $asc ); ++$i )
    {
        if ( $asc[$i] == 0 || $asc[$i] == 13 || $asc[$i] == 26 || $asc[$i] == 39 )
        {
            $vescard = 1;
            $tt = 1;
        }
        if ( $asc[$i] == 1 || $asc[$i] == 14 || $asc[$i] == 27 || $asc[$i] == 40 )
        {
            $vescard = 2;
        }
        if ( $asc[$i] == 2 || $asc[$i] == 15 || $asc[$i] == 28 || $asc[$i] == 41 )
        {
            $vescard = 3;
        }
        if ( $asc[$i] == 3 || $asc[$i] == 16 || $asc[$i] == 29 || $asc[$i] == 42 )
        {
            $vescard = 4;
        }
        if ( $asc[$i] == 4 || $asc[$i] == 17 || $asc[$i] == 30 || $asc[$i] == 43 )
        {
            $vescard = 5;
        }
        if ( $asc[$i] == 5 || $asc[$i] == 18 || $asc[$i] == 31 || $asc[$i] == 44 )
        {
            $vescard = 6;
        }
        if ( $asc[$i] == 6 || $asc[$i] == 19 || $asc[$i] == 32 || $asc[$i] == 45 )
        {
            $vescard = 7;
        }
        if ( $asc[$i] == 7 || $asc[$i] == 20 || $asc[$i] == 33 || $asc[$i] == 46 )
        {
            $vescard = 8;
        }
        if ( $asc[$i] == 8 || $asc[$i] == 21 || $asc[$i] == 34 || $asc[$i] == 47 )
        {
            $vescard = 9;
        }
        if ( $asc[$i] == 9 || $asc[$i] == 22 || $asc[$i] == 35 || $asc[$i] == 48 )
        {
            $vescard = 10;
        }
        if ( $asc[$i] == 10 || $asc[$i] == 23 || $asc[$i] == 36 || $asc[$i] == 49 )
        {
            $vescard = 10;
        }
        if ( $asc[$i] == 11 || $asc[$i] == 24 || $asc[$i] == 37 || $asc[$i] == 50 )
        {
            $vescard = 10;
        }
        if ( $asc[$i] == 12 || $asc[$i] == 25 || $asc[$i] == 38 || $asc[$i] == 51 )
        {
            $vescard = 10;
        }
        $tempcard[$i] = $vescard;
    }
    $tscore = array_sum( $tempcard );
    if ( $tscore <= 10 && $tt == 1 )
    {
        $tscore += 10;
    }
    return $tscore;
}
function scorecard2( $sc )
{
    $tempcard = array( );
    $asc = explode( "|", $sc );
    $i = 0;
    for ( ; $i < count( $asc ); ++$i )
    {
        if ( $asc[$i] == 0 || $asc[$i] == 13 || $asc[$i] == 26 || $asc[$i] == 39 )
        {
            $vescard = 11;
        }
        if ( $asc[$i] == 1 || $asc[$i] == 14 || $asc[$i] == 27 || $asc[$i] == 40 )
        {
            $vescard = 2;
        }
        if ( $asc[$i] == 2 || $asc[$i] == 15 || $asc[$i] == 28 || $asc[$i] == 41 )
        {
            $vescard = 3;
        }
        if ( $asc[$i] == 3 || $asc[$i] == 16 || $asc[$i] == 29 || $asc[$i] == 42 )
        {
            $vescard = 4;
        }
        if ( $asc[$i] == 4 || $asc[$i] == 17 || $asc[$i] == 30 || $asc[$i] == 43 )
        {
            $vescard = 5;
        }
        if ( $asc[$i] == 5 || $asc[$i] == 18 || $asc[$i] == 31 || $asc[$i] == 44 )
        {
            $vescard = 6;
        }
        if ( $asc[$i] == 6 || $asc[$i] == 19 || $asc[$i] == 32 || $asc[$i] == 45 )
        {
            $vescard = 7;
        }
        if ( $asc[$i] == 7 || $asc[$i] == 20 || $asc[$i] == 33 || $asc[$i] == 46 )
        {
            $vescard = 8;
        }
        if ( $asc[$i] == 8 || $asc[$i] == 21 || $asc[$i] == 34 || $asc[$i] == 47 )
        {
            $vescard = 9;
        }
        if ( $asc[$i] == 9 || $asc[$i] == 22 || $asc[$i] == 35 || $asc[$i] == 48 )
        {
            $vescard = 10;
        }
        if ( $asc[$i] == 10 || $asc[$i] == 23 || $asc[$i] == 36 || $asc[$i] == 49 )
        {
            $vescard = 10;
        }
        if ( $asc[$i] == 11 || $asc[$i] == 24 || $asc[$i] == 37 || $asc[$i] == 50 )
        {
            $vescard = 10;
        }
        if ( $asc[$i] == 12 || $asc[$i] == 25 || $asc[$i] == 38 || $asc[$i] == 51 )
        {
            $vescard = 10;
        }
        $tempcard[$i] = $vescard;
    }
    $tscore = array_sum( $tempcard );
    return $tscore;
}
function cash( $l )
{
    return user_balance();
}

function winlimit() {
     global $game_configs;

    return bank_balance($game_configs['game_bank'])/_AMAROK_DELITEL;
}


define("_GAME_NAME", "BlackJackSilver");

include("common.php");

/*if (!is_user()) {
  header("Location: /");
  die();
}*/

$action = $_POST['ACTION'];
$type = $_POST['TYPE'];
$bet = $_POST['BET'];
$date = date( "d.m.y" );
$time = date( "H:i:s" );
$payout = "0";
$card = $_SESSION['card'];
$cash = cash( $l );
if ( $cash < 1 )
{
    $action == "ENTER";
}
if ( $action == "ENTER" )
{
    $cash = cash( $l );
    print_var("RESULT", "OK");
    print_var("BALANCE", $cash);
}
if ( $action == "MAKEBET" )
{
    if ( $bet == true )
    {
        $_SESSION['bet2'] = $bet;
    }


   if($bet < 0 ){ $bet= $bet * (-1); }


    user_pay($bet);
    $profit=$bet/100;
    $profit*=$game_configs['profit_percent'];
    bank_add($game_configs['profit_bank'], $profit, true);
    bank_add($game_configs['game_bank'], $bet-$profit);

    $casbank = _AMAROK_DELITEL/$bet;
    $casbank = bank_balance($game_configs['game_bank'])/$casbank;


  $win_tmp = $bet * 2;
  //  $win_tmp = 0;


  $win_tmp *= 2;

    if ( $casbank <= $win_tmp )
    {
        $loh = 1;
    }
    else
    {
        $loh = 0;
    }
    $card = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51 );
    srand( ( double )microtime( ) * 1000000 );
    shuffle( $card );
   while ( $loh == 1 && $ams < 100000 )
//while ( !( $loh == 1 ) || !( $ams < 100000 ) )

    {
        shuffle( $card );
        $cardsdealer21 = $card['25']."|{$card['26']}";
        $cardsdealer22 = $card['25']."|{$card['26']}|{$card['27']}";
        $scd444 = scorecard_dealer( $cardsdealer22 );
        $scd555 = scorecard_dealer( $cardsdealer21 );
     //  if ( ( $scd444 != 21 ) or ( $scd555 > 17 ) )
if ( ( $scd444 != 21 ) or ( $scd555 > 17 ) )

        {
            continue;
        }
        $ams = 120000;
    }


/*
while ( $loh == 1 && $ams < 100000 )
    {
        shuffle( $card );
        $cardsdealer21 = $card['25']."|{$card['26']}";
        $cardsdealer22 = $card['25']."|{$card['26']}|{$card['27']}";
        $scd444 = scorecard( $cardsdealer22 );
        $scd555 = scorecard( $cardsdealer21 );
        $ams = 120000;
    }


*/
/*
 while ( $loh == 1 && $ams < 100000 )
    {
        shuffle( $card );
        $cardsdealer21 = $card['25']."|$card['26']";
        $cardsdealer22 = $card['25']."|$card['26']|$card['27']";
        $scd444 = scorecard( $cardsdealer22 );
        $scd555 = scorecard( $cardsdealer21 );
        if ( !( $scd444 == 21 ) || !( $scd555 < 17 ) )
        {
continue;
        }
        else
        {
            $ams = 120000;
        }
    }


*/




    $_SESSION['card'] = $card;
    $cardsdealer = $card['25']."|52";
    $cardsplayer = $card['1']."|{$card['2']}";
    $_SESSION['cardsplayer'] = $cardsplayer;
    $sc = scorecard( $cardsplayer );
    $sc2 = scorecard2( $cardsplayer );
    if(($sc!=$sc2)&&($sc2<=21))
    	$scoresplayer = "$sc2"."|"."$sc";//$sc."|{$sc}";
    else
    	$scoresplayer = "$sc";//$sc;
    if($sc2<=21) $sc = $sc2;
    $state = "0|7|0|0|0|0";
    if($card['25']==0 || $card['25']==13 || $card['25']==26 || $card['25']==39 )
    	$state = "0|16|0|0|0|0";
    $cash = cash( $l );
    $bet = $_SESSION['bet2'];
    $bet3 = $bet.".0|{$bet}.0|0.0|{$bet}.0|0.0";

    print_var("STATE", $state);
    print_var("CARDSDEALER", $cardsdealer);
    print_var("SCORESPLAYER", $scoresplayer);
    print_var("CARDSPLAYER", $cardsplayer);
    print_var("BET", $bet3);
    print_var("RESULT", "OK");
    print_var("BALANCE", $cash);
}

if ( $action == "MOVE" )
{
	if($type=="INSURANCENO")
	{
		$cardsplayer = $_SESSION['cardsplayer'];
		$cardsdealer = $card['25']."|52";
		$sc = scorecard( $cardsplayer );
 	   	$sc2 = scorecard2( $cardsplayer );
 	   	$_SESSION['insurance'] = 0;
  	  	if(($sc!=$sc2)&&($sc2<=21))
    		$scoresplayer = "$sc2"."|"."$sc";//$sc."|{$sc}";
    	else
    		$scoresplayer = "$sc";//$sc;
    	if($sc2<=21) $sc = $sc2;
    	$cash = cash( $l );
    	$bet = $_SESSION['bet2'];
    	$bet3 = $bet.".0|{$bet}.0|0.0|{$bet}.0|0.0";
		$state = "0|7|0|0|0|0";
        print_var("STATE", $state);
        print_var("CARDSDEALER", $cardsdealer);
        print_var("SCORESPLAYER", $scoresplayer);
        print_var("CARDSPLAYER", $cardsplayer);
        print_var("BET", $bet3);
        print_var("RESULT", "OK");
        print_var("BALANCE", $cash);
    }
	if($type=="INSURANCEYES")
	{
		$cardsplayer = $_SESSION['cardsplayer'];
		$cardsdealer = $card['25']."|52";
		$sc = scorecard( $cardsplayer );
    	$sc2 = scorecard2( $cardsplayer );
    	if(($sc!=$sc2)&&($sc2<=21))
    		$scoresplayer = "$sc2"."|"."$sc";//$sc."|{$sc}";
    	else
    		$scoresplayer = "$sc";//$sc;
    	if($sc2<=21) $sc = $sc2;
    	$bet = $_SESSION['bet2'];
    	$bet_insurance = $bet/2;
    	$_SESSION['insurance'] = $bet_insurance;
		user_pay($bet_insurance);
		$profit=$bet_insurance/100;
        $profit*=$game_configs['profit_percent'];
        bank_add($game_configs['profit_bank'], $profit, true);
        bank_add($game_configs['game_bank'], $bet_insurance-$profit);
		$cash = cash( $l );
    	$bet3 = $bet.".0|{$bet}.0|{$bet_insurance}|{$bet}.0|0.0";
		$state = "0|7|0|0|0|0";
        print_var("STATE", $state);
        print_var("CARDSDEALER", $cardsdealer);
        print_var("SCORESPLAYER", $scoresplayer);
        print_var("CARDSPLAYER", $cardsplayer);
        print_var("BET", $bet3);
        print_var("RESULT", "OK");
        print_var("BALANCE", $cash);
    }
    if ( $type == "HIT" )
    {
        $cardsplayer3 = $_SESSION['cardsplayer'];
        $cardsplayer4 = explode( "|", $cardsplayer3 );
        $count = count( $cardsplayer4 );
        $count += 1;
        $cardsplayer = $cardsplayer3."|".$card[$count];
        $sc = scorecard( $cardsplayer );
        $sc2 = scorecard2( $cardsplayer );
        if(($sc!=$sc2)&&($sc2<=21))
    		$scoresplayer = "$sc2"."|"."$sc";//$sc."|{$sc}";
    	else
    		$scoresplayer = "$sc";//$sc;
    	if($sc2<=21) $sc = $sc2;
        $cash = cash( $l );
        if ( 21 < $sc )
        {
            $cardsdealer = $card[25]."|".$card[26];
            $scoresdealer = scorecard_dealer( $cardsdealer );
            $state = "1|0|1|0|1|0";
            $bet = $_SESSION['bet2'];
            $bet3 = $bet.".0|{$bet}.0|0.0|{$bet}.0|0.0";
            $payout = "0.0|0.0|0.0|0.0";
            unset( $_SESSION['cardsdealer'] );
            unset( $_SESSION['cardsplayer'] );
            write_stat($bet, 0);
            print_var("STATE", $state);
            print_var("CARDSDEALER", $cardsdealer);
            print_var("SCORESPLAYER", $scoresplayer);
            print_var("SCORESDEALER", $scoresdealer);
            print_var("CARDSPLAYER", $cardsplayer);
            print_var("BET", $bet3);
            print_var("RESULT", "OK");
            print_var("BALANCE", $cash);
            print_var("PAYOUT", $payout);
        }
        else
        {
            $cardsdealer = $card['25']."|52";
            $state = "0|3|0|0|0|0";
            print_var("STATE", $state);
            print_var("CARDSDEALER", $cardsdealer);
            print_var("SCORESPLAYER", $scoresplayer);
            print_var("CARDSPLAYER", $cardsplayer);
            print_var("BET", $bet3);
            print_var("RESULT", "OK");
            print_var("BALANCE", $cash);
        }
    }
    if ( $type == "DOUBLE" )
    {
        $bet = $_SESSION['bet2'];


   if($bet < 0 ){ $bet= $bet * (-1); }

        user_pay($bet);
        $profit=$bet/100;
        $profit*=$game_configs['profit_percent'];
        bank_add($game_configs['profit_bank'], $profit, true);
        bank_add($game_configs['game_bank'], $bet-$profit);
        $cardsplayer3 = $_SESSION['cardsplayer'];
        $cardsplayer4 = explode( "|", $cardsplayer3 );
        $count = count( $cardsplayer4 );
        $count += 1;
        $cardsplayer = $cardsplayer3."|".$card[$count];
        $sc = scorecard( $cardsplayer );
        $sc2 = scorecard2( $cardsplayer );
        if(($sc!=$sc2)&&($sc2<=21))
    		$scoresplayer = "$sc2"."|"."$sc";//$sc."|{$sc}";
    	else
    		$scoresplayer = "$sc";//$sc;
    	if($sc2<=21) $sc = $sc2;
        $cash = cash( $l );
        if ( 21 < $sc )
        {
            $cardsdealer = $card[25]."|".$card[26];
            $scoresdealer = scorecard_dealer( $cardsdealer );
            $state = "1|0|1|0|1|2";
            $bet = $_SESSION['bet2'];
            $bet3 = $bet.".0|{$bet}.0|0.0|{$bet}.0|0.0";
            $payout = "0.0|0.0|0.0|0.0";
            unset( $_SESSION['cardsdealer'] );
            unset( $_SESSION['cardsplayer'] );
			write_stat($bet, 0);
            print_var("STATE", $state);
            print_var("CARDSDEALER", $cardsdealer);
            print_var("SCORESPLAYER", $scoresplayer);
            print_var("SCORESDEALER", $scoresdealer);
            print_var("CARDSPLAYER", $cardsplayer);
            print_var("BET", $bet3);
            print_var("RESULT", "OK");
            print_var("BALANCE", $cash);
            print_var("PAYOUT", $payout);
        }
        else
        {
            $type = "STAND";
            $mydouble = "Ok";
        }
    }
    if ( $type == "STAND" )
    {
        $win = 0;
        $cardsplayer = $_SESSION['cardsplayer'];
        $cardsdealer = $card[25]."|".$card[26];
        $scd1 = scorecard_dealer( $cardsdealer );
        if ( $scd1 <= 16 )
        {
            $cardsdealer = $card[25]."|".$card[26]."|".$card[27];
        }
        $scd2 = scorecard_dealer( $cardsdealer );
        if ( $scd2 <= 16 )
        {
            $cardsdealer = $card[25]."|".$card[26]."|".$card[27]."|".$card[28];
        }
        $scd3 = scorecard_dealer( $cardsdealer );
        if ( $scd3 <= 16 )
        {
            $cardsdealer = $card[25]."|".$card[26]."|".$card[27]."|".$card[28]."|".$card[29];
        }
        $scd4 = scorecard_dealer( $cardsdealer );
        if ( $scd4 <= 16 )
        {
            $cardsdealer = $card[25]."|".$card[26]."|".$card[27]."|".$card[28]."|".$card[29]."|".$card[30];
        }
        $scd5 = scorecard_dealer( $cardsdealer );
        $scp = scorecard( $cardsplayer );
        $scp2 = scorecard2( $cardsplayer );
        if(($scp!=$scp2)&&($scp2<=21))
    		$scoresplayer = "$scp2"."|"."$scp";//$sc."|{$sc}";
    	else
    		$scoresplayer = "$scp";//$sc;
    	if($scp2<=21) $scp = $scp2;
        $scd = scorecard_dealer( $cardsdealer );
        $bet = $_SESSION['bet2'];
        if ( $scp < $scd )
        {
            $win = 0;
            if ( $mydouble == "Ok" )
            {
                $state = "1|0|1|0|1|2";
            }
            else
            {
                $state = "1|0|1|0|1|0";
            }
        }
        else
        {
            $win = $bet * 2;
            if ( $mydouble == "Ok" )
            {
                $win *= 2;
                $state = "1|0|1|0|1|6";
            }
            else
            {
                $state = "1|0|1|0|1|4";
            }
        }
        if ( 21 < $scd )
        {
            $win = $bet * 2;
            if ( $mydouble == "Ok" )
            {
                $win *= 2;
                $state = "1|0|1|0|1|6";
            }
            else
            {
                $state = "1|0|1|0|1|4";
            }
        }
        if ( $scd == $scp )
        {
            $win = $bet;
            if ( $mydouble == "Ok" )
            {
                $win *= 2;
            }
            $state = "1|0|1|0|1|8";
        }
        //$scoresplayer = "0|0,".$scp."|{$scp}";
        $scoresdealer = "0|0,".$scd1."|{$scd1},{$scd2}|{$scd2},{$scd3}|{$scd3},{$scd4}|{$scd4},{$scd5}|{$scd5}";
        $payout = "0.0|".$win."|0.0|{$win}";
        if(($_SESSION['insurance']>0)&&($scd1==21))
        {
        	$insurance_payout = $_SESSION['insurance']+$bet;
        	$payout = "0.0|".$win."|{$insurance_payout}|{$win}";

            user_add($insurance_payout);
            bank_pay($game_configs['game_bank'], $insurance_payout);
        }
        if ($win>0 )
        {
            user_add($win);
            bank_pay($game_configs['game_bank'], $win);
        }
        $cash = cash( $l );
        write_stat($bet, $win);
        $bet3 = $bet.".0|{$bet}.0|0.0|{$bet}.0|0.0";
        print_var("STATE", $state);
            print_var("CARDSDEALER", $cardsdealer);
            print_var("SCORESPLAYER", $scoresplayer);
            print_var("SCORESDEALER", $scoresdealer);
            print_var("CARDSPLAYER", $cardsplayer);
            print_var("BET", $bet3);
            print_var("RESULT", "OK");
            print_var("BALANCE", $cash);
            print_var("PAYOUT", $payout);
        unset( $_SESSION['cardsdealer'] );
        unset( $_SESSION['cardsplayer'] );
        unset( $_SESSION['insurance'] );
     }
}
?>
