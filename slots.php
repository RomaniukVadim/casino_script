<?php
define( "CASINOENGINE", true );
session_start( );
include_once( "engine/core/games/game_secure.php" );
include_once( "engine/config/config.php" );
include_once( "engine/core/games/game_functions.php" );
include_once( "engine/core/games/jackpots.php" );
define( "ROOT_DIR", $_SERVER['DOCUMENT_ROOT'] );
$settings_game = array(
    "attila" => array( "bet" => "900", "lines" => "9", "betall" => "900" ),
    "ramsesII" => array( "bet" => "900", "lines" => "9", "betall" => "900" ),
    "aztectreasure" => array( "bet" => "900", "lines" => "9", "betall" => "900" ),
    "kingofcards" => array( "bet" => "900", "lines" => "9", "betall" => "900" )
);
$login = $_SESSION['login'];
$mode = $_SESSION['mode'];
$action = $_POST['action'];
$bet = $_POST['bet'];
$lines = $_POST['lines'];
$game = $_POST['game'];
$betall = $bet * $lines;
$error = "";
$game = preg_replace( "/[^a-zA-Z]/i", "", substr( $game, 0, 50 ) );
if ( $action == "state" )
{
    $_SESSION['freegame_number'] = 0;
    $_SESSION['freegame_win'] = 0;
    if ( $mode == "wmr" )
    {
        $row = mysql_fetch_array( mysql_query( "select * from clients where login='".$login."'" ) );
        $user_balance = $row['cash'];
    }
    if ( $mode == "fun" )
    {
        $row = mysql_fetch_array( mysql_query( "select * from clients where login='".$login."'" ) );
        $user_balance = $row['cashfun'];
    }
    $user_balance = floor( $user_balance );
    echo "result=ok&state=0&min=1&id={$login}&balance={$user_balance}";
    $_SESSION['state_ok'] = 1;
}
if ( $action == "spin" || $action == "finish" || $action == "double" || $action == "freegame" )
{
    if ( $_SESSION['state_ok'] == 1 )
    {
        if ( $mode == "wmr" )
        {
            $row = mysql_fetch_array( mysql_query( "select * from clients where login='".$login."'" ) );
            $user_balance = $row['cash'];
        }
        if ( $mode == "fun" )
        {
            $row = mysql_fetch_array( mysql_query( "select * from clients where login='".$login."'" ) );
            $user_balance = $row['cashfun'];
        }
        $user_balance = floor( $user_balance );
        if ( $user_balance < $bet )
        {
            @log_reporting( "¬ игре: ".$game." игрок: ".$login." хочет поставить ставку:".$bet." больше его баланса".$user_balance, 1 );
            $error = "error|error";
        }
        if ( $bet < 0 || 900 < $bet )
        {
            @log_reporting( "¬ игре: ".$game." игрок: ".$login." хочет поставить недопустимую ставку:".$bet, 1 );
            $error = "error|error";
        }
        if ( $lines < 1 && 9 < $lines )
        {
            @log_reporting( "¬ игре: ".$game." игрок: ".$login." хочет поставить недопустимую линию:".$lines, 1 );
            $error = "error|error";
        }
        if ( $user_balance < 0 )
        {
            @log_reporting( "¬ игре: ".$game." у игрока: ".$login." баланс ушел в минус:".$lines, 0 );
            $user_balance = 0;
            $error = "error|error";
        }
        if ( $user_balance == 0 )
        {
            @log_reporting( "¬ игре: ".$game." игрок: ".$login." хочет сыграть c нулевым балансом: ".$user_balance, 1 );
            $error = "error|error";
        }
        if ( $error != "" )
        {
            echo $error;
            $_SESSION['state_ok'] = 0;
            exit( );
        }
        if ( $game == "attila" )
        {
            include( ROOT_DIR."/games/novomatic/math/attila.php" );
        }
        if ( $game == "aztectreasure" )
        {
            include( ROOT_DIR."/games/novomatic/math/aztectreasure.php" );
        }
        if ( $game == "dolphins" )
        {
            include( ROOT_DIR."/games/novomatic/math/dolphins.php" );
        }
        if ( $game == "kingofcards" )
        {
            include( ROOT_DIR."/games/novomatic/math/kingofcards.php" );
        }
        if ( $game == "luckylady" )
        {
            include( ROOT_DIR."/games/novomatic/math/luckylady.php" );
        }
        if ( $game == "moneygame" )
        {
            include( ROOT_DIR."/games/novomatic/math/moneygame.php" );
        }
        if ( $game == "wonderful" )
        {
            include( ROOT_DIR."/games/novomatic/math/wonderfulflute.php" );
        }
        if ( $game == "ramsesII" )
        {
            include( ROOT_DIR."/games/novomatic/math/ramsesII.php" );
        }
        if ( $game == "unicorn" )
        {
            include( ROOT_DIR."/games/novomatic/math/unicorn.php" );
        }
        if ( $game == "secretforest" )
        {
            include( ROOT_DIR."/games/novomatic/math/secretforest.php" );
        }
        if ( $game == "columbus" )
        {
            include( ROOT_DIR."/games/novomatic/math/columbus.php" );
        }
        if ( $game == "columbusdelux" )
        {
            include( ROOT_DIR."/games/novomatic/math/columbusdelux.php" );
        }
        if ( $game == "markopolo" )
        {
            include( ROOT_DIR."/games/novomatic/math/markopolo.php" );
        }
        if ( $game == "bananas" )
        {
            include( ROOT_DIR."/games/novomatic/math/bananas.php" );
        }
        if ( $game == "bananasplash" )
        {
            include( ROOT_DIR."/games/novomatic/math/bananasplash.php" );
        }
        if ( $game == "bookofra" )
        {
            include( ROOT_DIR."/games/novomatic/math/bookofra.php" );
        }
        if ( $game == "dynasty" )
        {
            include( ROOT_DIR."/games/novomatic/math/dynasty.php" );
        }
        if ( $game == "goldenplanet" )
        {
            include( ROOT_DIR."/games/novomatic/math/goldenplanet.php" );
        }
        if ( $game == "gryphonsgold" )
        {
            include( ROOT_DIR."/games/novomatic/math/gryphonsgold.php" );
        }
        if ( $game == "magicprincess" )
        {
            include( ROOT_DIR."/games/novomatic/math/magicprincess.php" );
        }
        if ( $game == "mermaidspearl" )
        {
            include( ROOT_DIR."/games/novomatic/math/mermaidspearl.php" );
        }
        if ( $game == "panteron" )
        {
            include( ROOT_DIR."/games/novomatic/math/panteron.php" );
        }
        if ( $game == "pharaohsgoldll" )
        {
            include( ROOT_DIR."/games/novomatic/math/pharaohsgoldll.php" );
        }
        if ( $game == "pharaohsgoldlll" )
        {
            include( ROOT_DIR."/games/novomatic/math/pharaohsgoldlll.php" );
        }
        if ( $game == "polarfox" )
        {
            include( ROOT_DIR."/games/novomatic/math/polarfox.php" );
        }
        if ( $game == "queenof" )
        {
            include( ROOT_DIR."/games/novomatic/math/queenof.php" );
        }
        if ( $game == "royaltreasures" )
        {
            include( ROOT_DIR."/games/novomatic/math/royaltreasures.php" );
        }
        if ( $game == "safariheat" )
        {
            include( ROOT_DIR."/games/novomatic/math/safariheat.php" );
        }
        if ( $game == "sharky" )
        {
            include( ROOT_DIR."/games/novomatic/math/sharky.php" );
        }
        if ( $game == "sparta" )
        {
            include( ROOT_DIR."/games/novomatic/math/sparta.php" );
        }
    }
    else
    {
        @log_reporting( "¬ игре: ".$game." игрок: ".$login." хочет запустить игру без инициализации", 1 );
        exit( );
    }
}
?>
