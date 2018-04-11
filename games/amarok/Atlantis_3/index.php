<?

error_reporting( E_ALL & ~E_NOTICE );
unset( $l );
session_start( );
session_register( $l );
$_SESSION['dur'] = (isset($_GET['dur']) && $_GET['dur'] == 'fun') ? 'fun' : 'wmr';
switch ($_GET['game'])
 {
    default:
           header( "Location: ../../index.php" );
    break;
    
     case (!isset($l));
           header( "Location: ../../login.php" );
      die();
   
     $mxt = array("casino");
     $txt = "Онлайн казино";
   break;
  
    case "atlantis":
     $mxt = array ("Atlantis  v.2");
     $txt = "Игровой автомат";
     $loadswf = "Atlantis.swf" ;
           srand( ( double ) microtime( ) * 1000000 );
           shuffle( &$mxt );
   break;

    case "exit":
         header( "Location: ../../index.php" );
   break;
 }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <head>
  <meta name="robots" content="index, follow">
  <meta name="keywords" content=" ">
  <title><? echo "$txt $mxt[0]";?></title>
  <meta name="keywords" content="Atlantis">
     <script type="text/javascript" src="flashobject.js"></script>
 </head>
 <body bgcolor="#100000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <div id="flashdemo" style="background-color:#12000">
   <object classid="application/x-shockwave-flash" data="/cabs/flash/swflash.cab#version=6,0,29,0" width="100%" height="100%" align="middle">
    <param name="movie" value="<? echo $loadswf; ?>">
    <param name="quality" value="high" />
    <param name="wmode" value="transparent" />
   </object>
  </div>
  <script type="text/javascript">var fo = new FlashObject("<? echo $loadswf; ?>", "", "100%", "100%", "7", "");fo.addParam("wmode", "transparent");fo.addParam("quality", "high");fo.addParam("menu", "false");fo.write("flashdemo");</script>

 </body>
</html> 
