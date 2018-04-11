<?php
if ( !defined( "CASINOENGINE" ) )
{
    exit( "Нет доступа!<script>location.href='/';</script>" );
}
$page = $_GET['ppage'];
if ( !isset( $page ) || $page == "" )
{
    $page = "index";
}
$page_filter = preg_match( "/^[A-Za-z0-9_=]{2,20}\$/", $page );
$header = file_get_contents( TEMPLATE_DIR."/header.tpl" );
$news = intval( $_GET['news'] );
$news_query = @mysql_fetch_array( @mysql_query( "SELECT date,title,full_story,descr,keywords FROM casino_news WHERE id='{$news}' LIMIT 1" ) );
if ( $news_query != "" && $page == "news" )
{
    $header = str_replace( "{title}", $news_query['title'], $header );
    $header = str_replace( "{description}", $news_query['descr'], $header );
    $header = str_replace( "{keywords}", $news_query['keywords'], $header );
    $header = str_replace( "{theme}", "/templates/".$template."/".$_SESSION['language'], $header );
    echo $header;
}
else
{
    require_once( ENGINE_DIR."config/title.php" );
    $header = str_replace( "{title}", $title, $header );
    $header = str_replace( "{description}", $title, $header );
    $header = str_replace( "{keywords}", $title, $header );
    $header = str_replace( "{theme}", "/templates/".$template."/".$_SESSION['language'], $header );
    echo $header;
}
if ( $page_filter == true )
{
    $inc = ENGINE_DIR."/templates/page.".$page.".php";
    if ( file_exists( $inc ) )
    {
        if ( $_SESSION['login'] != "" )
        {
            $id_session = "CASINOSOFT".$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_ACCEPT_CHARSET'];
            $id_session = md5( $id_session.session_id( ) );
            if ( $_SESSION['sid'] == $id_session )
            {
                $user_status_query = mysql_fetch_array( mysql_query( "select status from clients where login='".$_SESSION['login']."'" ) );
                if ( $user_status_query['status'] != 0 )
                {
                    include_once( ENGINE_DIR."/templates/header_nomain.php" );
                    include_once( ENGINE_DIR."/templates/page.".$page.".php" );
                    include_once( ENGINE_DIR."/templates/footer_nomain.php" );
                }
                else
                {
                    include_once( ROOT_DIR."/templates/block.php" );
                    session_destroy( );
                    exit( );
                }
            }
            else
            {
                $_SESSION['sid'] = "";
                $_SESSION['login'] = "";
                if ( DEBUG )
                {
                    echo "Сессия после входа изменена <script>location.href=\"/\";</script>";
                }
            }
        }
        else
        {
            include_once( ENGINE_DIR."/templates/header_nomain.php" );
            include_once( ENGINE_DIR."/templates/page.".$page.".php" );
            include_once( ENGINE_DIR."/templates/footer_nomain.php" );
        }
    }
    else
    {
        include_once( ROOT_DIR."/templates/404.php" );
        exit( );
    }
}
else
{
    include_once( ROOT_DIR."/templates/404.php" );
    exit( );
}
$footer = file_get_contents( TEMPLATE_DIR."/footer.tpl" );
$footer = str_replace( "{THEME}", "/templates/".$template."/".$language, $footer );
echo $footer;
?>
