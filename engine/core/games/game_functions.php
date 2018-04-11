<?php
function game_bet( $_obfuscate_DREOKSMjETUaARw_Jj9cDCQKKioiLjIÿ, $_obfuscate_DRYcLSYxJx42MBIxCAMyAyQzEjYCBAEÿ, $_obfuscate_DRUDFxAJGCkTGx4MEBQCGR4qNjgjIyIÿ )
{
    $_obfuscate_DSU9EwowJT0iCg04Fx0JKxU2JigRJjIÿ = @mysql_fetch_array( @mysql_query( "select equalize,cashbonus,cash from clients where login='{$_obfuscate_DRUDFxAJGCkTGx4MEBQCGR4qNjgjIyIÿ}' limit 1" ) );
    if ( $_SESSION['mode'] == "wmr" )
    {
        $_obfuscate_DQ8qJQwJMSQhLycUJCgLHwIiBRUdAwEÿ = mysql_fetch_array( mysql_query( "select cash from clients where login='{$_obfuscate_DRUDFxAJGCkTGx4MEBQCGR4qNjgjIyIÿ}'" ) );
        $_obfuscate_DTsMFBQoDRgIGSEtHSZcBTwQBg0HBQEÿ = $_obfuscate_DQ8qJQwJMSQhLycUJCgLHwIiBRUdAwEÿ['cash'];
    }
    if ( $_SESSION['mode'] == "fun" )
    {
        $_obfuscate_DQ8qJQwJMSQhLycUJCgLHwIiBRUdAwEÿ = mysql_fetch_array( mysql_query( "select cashfun from clients where login='{$_obfuscate_DRUDFxAJGCkTGx4MEBQCGR4qNjgjIyIÿ}'" ) );
        $_obfuscate_DTsMFBQoDRgIGSEtHSZcBTwQBg0HBQEÿ = $_obfuscate_DQ8qJQwJMSQhLycUJCgLHwIiBRUdAwEÿ['cashfun'];
    }
    $_obfuscate_DRUnPigDPzQXJSMZBCNcLRELLBsfDwEÿ = $_obfuscate_DTsMFBQoDRgIGSEtHSZcBTwQBg0HBQEÿ;
    if ( $_SESSION['mode'] == "wmr" )
    {
        $_obfuscate_DQUKPTcUQBsTKAowHzQtNCozJxwEGREÿ = $_obfuscate_DREOKSMjETUaARw_Jj9cDCQKKioiLjIÿ;
    }
    if ( $_SESSION['mode'] == "fun" )
    {
        $_obfuscate_DQUKPTcUQBsTKAowHzQtNCozJxwEGREÿ = $_obfuscate_DREOKSMjETUaARw_Jj9cDCQKKioiLjIÿ;
    }
    $_obfuscate_DREqGzMfASgLOAYaCgQKIR0aHx8IPjIÿ = $_obfuscate_DRUnPigDPzQXJSMZBCNcLRELLBsfDwEÿ - $_obfuscate_DQUKPTcUQBsTKAowHzQtNCozJxwEGREÿ;
    if ( 0 < $_obfuscate_DREqGzMfASgLOAYaCgQKIR0aHx8IPjIÿ )
    {
        if ( $_SESSION['mode'] == "wmr" )
        {
            $_obfuscate_DQ8rLDA3HjUyGhMyGTYCDTIYJRkDDCIÿ = $_obfuscate_DSU9EwowJT0iCg04Fx0JKxU2JigRJjIÿ['equalize'];
            if ( $_obfuscate_DQ8rLDA3HjUyGhMyGTYCDTIYJRkDDCIÿ == "0" )
            {
                @mysql_query( "update clients set cash=cash-{$_obfuscate_DQUKPTcUQBsTKAowHzQtNCozJxwEGREÿ} where login='{$_obfuscate_DRUDFxAJGCkTGx4MEBQCGR4qNjgjIyIÿ}'" );
                $_obfuscate_DTUNEQoVKw0TETw4LQUmMRc2QBofHSIÿ = mysql_fetch_array( mysql_query( "select * from games where name='{$_obfuscate_DRYcLSYxJx42MBIxCAMyAyQzEjYCBAEÿ}'" ) );
                $_obfuscate_DSwIPA8KCUA3EwozKjMDGw83ExIMXCIÿ = $_obfuscate_DTUNEQoVKw0TETw4LQUmMRc2QBofHSIÿ['id_bank'];
                @mysql_query( "update games_bank set bank=bank+{$_obfuscate_DQUKPTcUQBsTKAowHzQtNCozJxwEGREÿ} where id='{$_obfuscate_DSwIPA8KCUA3EwozKjMDGw83ExIMXCIÿ}'" );
                $_obfuscate_DQoyLBMrXDknCjs_AiMSEg8qGzQ0CiIÿ = $_obfuscate_DSU9EwowJT0iCg04Fx0JKxU2JigRJjIÿ['cashbonus'];
                if ( 0 < $_obfuscate_DQoyLBMrXDknCjs_AiMSEg8qGzQ0CiIÿ )
                {
                    @mysql_query( "update clients set equalize=1 where login='{$_obfuscate_DRUDFxAJGCkTGx4MEBQCGR4qNjgjIyIÿ}'" );
                }
            }
            if ( $_obfuscate_DQ8rLDA3HjUyGhMyGTYCDTIYJRkDDCIÿ == "1" )
            {
                @mysql_query( "update clients set cashbonus=cashbonus-{$_obfuscate_DQUKPTcUQBsTKAowHzQtNCozJxwEGREÿ} where login='{$_obfuscate_DRUDFxAJGCkTGx4MEBQCGR4qNjgjIyIÿ}'" );
                $_obfuscate_DSsUDxkuCQM4CzwOIg4CQCsjFwgZIyIÿ = $_obfuscate_DSU9EwowJT0iCg04Fx0JKxU2JigRJjIÿ['cash'];
                if ( 0 < $_obfuscate_DSsUDxkuCQM4CzwOIg4CQCsjFwgZIyIÿ )
                {
                    @mysql_query( "update clients set equalize=0 where login='{$_obfuscate_DRUDFxAJGCkTGx4MEBQCGR4qNjgjIyIÿ}'" );
                }
            }
        }
        $_obfuscate_DSoRGhgeBgU2MSM0DRgWJQgIIiMBKREÿ = "true";
    }
    else
    {
        $_obfuscate_DSoRGhgeBgU2MSM0DRgWJQgIIiMBKREÿ = 0;
        @log_reporting( "Èãðîê: ".$_SESSION['login']." õî÷åò ñûãðàòü, íî ïîñëå èãðû áàëàíñ ñòàíåò ìèíóñîâûì :client_balance_check:".$_obfuscate_DREqGzMfASgLOAYaCgQKIR0aHx8IPjIÿ.":client_balance:".$_obfuscate_DRUnPigDPzQXJSMZBCNcLRELLBsfDwEÿ.":betall_real:".$_obfuscate_DQUKPTcUQBsTKAowHzQtNCozJxwEGREÿ, 0 );
    }
    return $_obfuscate_DSoRGhgeBgU2MSM0DRgWJQgIIiMBKREÿ;
}

function log_reporting( $_obfuscate_DTMIxYCLTMtHik2CFwnLQtbFBESOCIÿ, $_obfuscate_DQ0kPyEkCzgwHBlAGjAhLAwXWzk4PgEÿ )
{
    $_obfuscate_DQoGEA8HJ1wGEw8wLAsyMxYxPiwkMREÿ = $_SESSION['login'];
    echo $_obfuscate_DTMIxYCLTMtHik2CFwnLQtbFBESOCIÿ;
}

?>
