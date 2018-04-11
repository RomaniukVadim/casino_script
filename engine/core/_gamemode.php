<?php
if ( !defined( "CASINOENGINE" ) )
{
    exit( "Ќет доступа!<script>location.href='/';</script>" );
}
if ( $_SESSION['login'] )
{
    $game_mode = $_GET['mode'];
    $gane_mode = filter( $game_mode );
    if ( $game_mode != $_SESSION['mode'] )
    {
        $mode_old = 0;
        $login_old = 0;
        $mode_old = $_SESSION['mode'];
        $login_old = $_SESSION['login'];
        $_SESSION['mode'] = "";
        $_SESSION['login'] = "";
        session_destroy( );
        session_start( );
        $id_session = "CASINOSOFT".$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_ACCEPT_CHARSET'];
        $id_session = md5( $id_session.session_id( ) );
        $_SESSION['sid'] = $id_session;
        $_SESSION['login'] = $login_old;
        if ( $game_mode == "fun" )
        {
            $_SESSION['mode'] = "fun";
        }
        if ( $game_mode == "wmr" )
        {
            $_SESSION['mode'] = "wmr";
        }
    }
    $_SESSION['double_win'] = 0;
    $_SESSION['bet2'] = 0;
    $_SESSION['win'] = 0;
    $_SESSION['\$double_card_new'] = 0;
    $_SESSION['double_card'] = 0;
    $_SESSION['double_card'] = 0;
    $_SESSION['double_card2'] = 0;
    $_SESSION['double_win'] = 0;
    $_SESSION['bettall'] = 0;
    $_SESSION['vp1_win'] = 0;
    $_SESSION['vp1_wc'] = 0;
    $_SESSION['vp1_card_d1'] = 0;
    $_SESSION['vp1_kard2'] = 0;
    $_SESSION['vp1_bet2'] = 0;
    $_SESSION['vp1_mas_win2s'] = 0;
    $_SESSION['card'] = 0;
    $_SESSION['bet2'] = 0;
    $_SESSION['cardsplayer'] = 0;
    $_SESSION['cardsdealer'] = 0;
    $_SESSION['sk'] = 0;
    if ( $_SESSION['mode'] == "" )
    {
        $have_money_query = @mysql_fetch_array( @mysql_query( "select login,cash from clients where login='".@filter( $_SESSION['login'] )."' limit 1" ) );
        $money = $have_money_query['cash'];
        if ( $money != 0 )
        {
            $_SESSION['mode'] = "wmr";
        }
        else
        {
            $_SESSION['mode'] = "fun";
        }
    }
    if ( $game_mode == "funup" )
    {
        $date = date( "Y-m-d" );
        $user_fun_date_query = mysql_fetch_array( mysql_query( "select login,fun_date from clients where login='".filter( $_SESSION['login'] )."' limit 1" ) );
        if ( $user_fun_date_query['fun_date'] == $date )
        {
            echo "<script>alert(\"»гровой счет можно пополнить через каждый день,\\n но сегодн€ вы уже пополнили свой игровой счет!\");</script>";
            echo "<script>location.href=\"/ru/games\";</script>";
            exit( );
        }
        else
        {
            $fun_day_query = @mysql_fetch_array( @mysql_query( "select fun_day from casino_settings" ) );
            $fun_day_query = $fun_day_query['fun_day'];
            @mysql_query( "UPDATE clients SET cashfun=cashfun+'".$fun_day_query."' WHERE login='".@filter( $_SESSION['login'] )."'" );
            @mysql_query( "UPDATE clients SET fun_date='".$date."' WHERE login='".@filter( $_SESSION['login'] )."'" );
            echo "<script>alert(\"»гровой счет пополненн на ".$fun_day_query." Fun!\");</script>";
            echo "<script>location.href=\"/ru/games\";</script>";
            exit( );
        }
    }
}
?>
