<?php
//Запрещаем прямой доступ
defined('CASINOENGINE') or die('Доступ запрещен');

//Вывод списка приоритетности
function GetPrioritySelect($priority = "0") {
	echo "<select name=priority>";
	foreach(array(0=>"низкая", 1=>"средняя", 2=>"высокая") as $index=>$value) {
        if($index==$priority) $stat=' selected'; else $stat='';
        echo "<option value=".$index.$stat.">".$value;
	}
	echo "</select>";
}

//Получение тикета
function GetTicketById($id) {
    $sql = mysql_query("SELECT * FROM `casino_tickets` WHERE `id`='".$id."'");
    if($result = mysql_fetch_object($sql)) return $result;
    else return false;
}

//Перевод даты в нужный синтаксис
function mydate($date) {
    $date = split("-", $date);
    return $date[2].".".$date[1].".".$date[0];
}

//Получение информации о пользователе
function GetUserById($id) {
    $sql = mysql_query("SELECT * FROM `clients` WHERE `id`='".$id."'");
    if($result = mysql_fetch_object($sql)) return $result;
    else return false;
}

//Фильтрация текста
function filter($text) {
    $text = str_replace( "\x00", " ", $text );
    $text = htmlspecialchars($text, ENT_QUOTES);
    $text = mysql_escape_string($text);
    return $text;
}


function MakePages($page, $rows, $urladdon = "") {
    global $_SESSION;
    global $do;
    $perPage = 300;
    $pages = ceil( $rows / $perPage );
    if ( !$page )
    {
        if ( $_SESSION[$do."Page"] )
        {
            $page = $_SESSION[$do."Page"];
        }
        else
        {
            $page = 1;
        }
    }
    if ( $pages < $page )
    {
        $page = 1;
    }
    $start = ( $page - 1 ) * $perPage;
    $_SESSION[$do."Page"] = $page;
    if ( $pages )
    {
        $txt = "Страницы:";
    }
    if ( 1 < $page )
    {
        $txt .= ( " <A href=?page='".( $page - 1 ) )."'><</a>";
    }
    else if ( 0 < $pages )
    {
        $txt .= " <";
    }
    $i = 1;
    while ( $i <= $pages )
    {
        if ( $page != $i )
        {
            $newTxt = " <A href='?page={$i}'>{$i}</a>";
        }
        else
        {
            $newTxt = " <B>{$i}</B>";
        }
        $txt = $txt.$newTxt;
        ++$i;
    }
    if ( $page < $pages )
    {
        $txt .= ( " <A href='?page=".( $page + 1 ) )."'>></a>";
    }
    else if ( 0 < $pages )
    {
        $txt .= " >";
    }
    return array(
        $start,
        $perPage,
        $txt
    );
}

function MakePagesUser( $page, $rows, $urladdon = "", $list )
{
    global $_SESSION;
    global $do;
    $perPage = 100;
    if ( $list != "" )
    {
        $listpage = "&list=".$list;
    }
    else
    {
        $listpage = "";
    }
    $pages = ceil( $rows / $perPage );
    if ( !$page )
    {
        if ( $_SESSION[$do."Page"] )
        {
            $page = $_SESSION[$do."Page"];
        }
        else
        {
            $page = 1;
        }
    }
    if ( $pages < $page )
    {
        $page = 1;
    }
    $start = ( $page - 1 ) * $perPage;
    $_SESSION[$do."Page"] = $page;
    if ( $pages )
    {
        $txt = "Страницы:";
    }
    if ( 1 < $page )
    {
        $txt .= ( " <A href=?mode=list".$listpage."&page='".( $page - 1 ) )."'><</a>";
    }
    else if ( 0 < $pages )
    {
        $txt .= " <";
    }
    $i = 1;
    while ( $i <= $pages )
    {
        if ( $page != $i )
        {
            $newTxt = " <A href='?mode=list".$listpage."&page={$i}'>{$i}</a>";
        }
        else
        {
            $newTxt = " <B>{$i}</B>";
        }
        $txt = $txt.$newTxt;
        ++$i;
    }
    if ( $page < $pages )
    {
        $txt .= ( " <A href='?mode=list".$listpage."&page=".( $page + 1 ) )."'>></a>";
    }
    else if ( 0 < $pages )
    {
        $txt .= " >";
    }
    return array(
        $start,
        $perPage,
        $txt
    );
}

function _priority($priority) {
	switch($priority) {
		case 0: return "низкая"; break;
		case 1: return "средняя"; break;
		case 2: return "высокая"; break;
		default: return "неизвестно";
	}
}

function _statusTicket($status) {
	switch($status) {
		case 'open': return "открыт"; break;
		case 'closed': return "закрыт"; break;
		default: return "неизвестно";
	}
}
?>
