<?
error_reporting(0);
session_start();
//$l=$_SESSION['l'];
if ($_SESSION['mode'] == "fun")
{
    $_SESSION['dur'] = "fun";
}
else
{
    $_SESSION['dur'] = "wmr";
}
$l = $_SESSION['login'];
$path_root=$_SERVER['DOCUMENT_ROOT'];

//include ($path_root."/setup.php");
include_once ("../../../engine/config/config_db.php");

$temp_action=$_POST['action'];

$temp_action = str_replace("-","", $temp_action);

$temp_action = str_replace("`","", $temp_action);
$temp_action = str_replace("'","", $temp_action);

$temp_action = mysql_real_escape_string($temp_action);

$row = mysql_fetch_array( mysql_query( "select * from clients where login='$l'" ) );
$user_balance =floor($row['cash']);

$cl_asc = explode( "|", $temp_action );
$test_bet = str_replace( "bet=", "", $cl_asc[1] );
$test_lines = str_replace( "lines=", "", $cl_asc[2] );
$test_allbet = $test_bet * $test_lines;

$chk_balance = $user_balance - $test_allbet;
if ($chk_balance<0){exit();}


if ( $user_balance < $test_allbet )
{
    echo "error|".$user_balance;
    die();
}
if ( $user_balance < 0 )
{
    echo "error|".$user_balance;
    die();
}

$_POST['action']=$temp_action;


include "mathaztectreasure.php";
?>