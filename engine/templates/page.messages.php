<?php
if ( $_SESSION['login'] == "" ) {
	//echo "<script>alert(\"Пожалуйста войдите, чтобы получить доступ к этой страничке!\");</script>";
	//exit("Нет доступа!<script>location.href='/';</script>");
	$_SESSION['needToLogin'] = true;
	echo "<script>location.href=\"/ru/\";</script>";
	exit( );
}

  function GetPrioritySelect($priority ="0") {
	$_priority = array("низкая", "средняя", "высокая");
	echo "<select name=priority style='border:1px solid #2d2d2d;background:#000000;color:#FFFFFF;'>";
	foreach($_priority as $index=>$value) {
		if ($priority == $index) $addon = " selected"; else $addon = "";
		echo "<option value={$index}{$addon}>{$value}";
	}
		echo "</select>";
  }
  
  function GetTicketById($id) {
      if (!($z = @mysql_query("select * from casino_tickets where id='{$id}'"))) {
          exit(mysql_error());
      }
      if (0 < mysql_num_rows($z)) {
          $z = mysql_fetch_object($z);
          return $z;
      }
  }
  
  function mydate($date) {
      $date = split("-", $date);
      return $date[2] . "." . $date[1] . "." . $date[0];
  }
  
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $_priority[0]            = "низкая";
  $_priority[1]            = "средняя";
  $_priority[2]            = "высокая";
  $_statusTicket['open']   = "открыт";
  $_statusTicket['closed'] = "закрыт";
  $sess_id                 = @mysql_fetch_array(@mysql_query("SELECT * FROM clients WHERE login='" . $_SESSION['login'] . "'"));
  $_SESSION['userId']      = $sess_id['id'];
  if ($_SESSION['userId'] == "0" || $_SESSION['userId'] == "") {
      exit();
  }
  if ($_SESSION['userId'] == "1495") {
      exit();
  }
  $id = floatval($_GET['id']);
  $id_режим                     = filter($_GET['action']);
  $режим_фильтер             = preg_match("/^[a-z]{2,20}\$/D", $id_режим);
  $id_фильтер                 = preg_match("/^[0-9]{1,5}\$/D", $id);
  $error                                       = "";
  $пользователь_id_запрос = mysql_fetch_array(mysql_query("select * from clients where login='" . $_SESSION['login'] . "'"));
  $число_открытых_сообщений = mysql_num_rows(mysql_query("select * from casino_tickets where parentid=0 and userid='" . $пользователь_id_запрос['id'] . "' and status='open'"));
  $число_закрытых_сообщений = mysql_num_rows(mysql_query("select * from casino_tickets where parentid=0 and userid='" . $пользователь_id_запрос['id'] . "' and status='closed'"));
  echo "<center><a href=\"/";
  echo $_SESSION['language'];
  echo "/messages\">Главная</a> | <a href=\"/";
  echo $_SESSION['language'];
  echo "/messages\">Открытые тикеты (";
  echo $число_открытых_сообщений;
  echo ")</a> | <a href=\"/";
  echo $_SESSION['language'];
  echo "/messages&status=closed\">Закрытые тикеты (";
  echo $число_закрытых_сообщений;
  echo ")</a></center>\r\n<br>\r\n";
  
  if ($id == "") {
      $status = filter($_GET['status']);
      if (!$status) {
          $status = "open";
      } else {
          $status = "closed";
      }
      echo "<div class=\"popup_h2\">Ваши сообщения:</div>\r\n\t\t\t\t\t\t\t<table cellspacing=0 cellpadding=0 width=\"100%\">\r\n\t\t\t\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t\t\t<td class=\"cell_2\" width=\"15%\"><div align=\"center\">Статус</div></td>\r\n\t\t\t\t\t\t\t\t\t\t<td class=\"cell_2\" width=\"50%\"><div align=\"left\">Тема</div></td>\r\n\t\t\t\t\t\t\t\t\t\t<td class=\"cell_1\" width=\"10%\"><div align=\"center\">Дата</div></td>\r\n\t\t\t\t\t\t\t\t\t\t<td class=\"cell_3\" width=\"10%\"><div align";
      echo "=\"center\">Ответов</div></td>\r\n\t\t\t\t\t\t\t\t\t\t<td class=\"cell_3\" width=\"15%\"><div align=\"center\">Ответов</div></td>\r\n\t\t\t\t\t\t\t\t\t</tr>\r\n";
      if (!($r = @mysql_query("select * from casino_tickets where status='{$status}' and userid='" . $_SESSION['userId'] . "' and parentid=0 order by id desc"))) {
          exit(mysql_error());
      }
      $cnt = 0;
      while ($rr = mysql_fetch_object($r)) {
          ++$cnt;
          $subj = stripslashes($rr->subject);
          if ($rr->newforuser) {
              $subj = "<b>{$subj}</b>";
          }
          $dt = split(" ", $rr->dt);
          $dt = mydate($dt[0]);
          if (!($replys = @mysql_query("select COUNT(*) as cnt from casino_tickets where parentid='{$rr->id}'"))) {
              exit(mysql_error());
          }
          $replys = mysql_fetch_object($replys);
          $link   = "messages&action=view&id={$rr->id}";
          $delete = "<A href=messages&action=delete&id={$rr->id} onclick=\"javascript: return confirm('Вы уверены, что хотите удалить тикет?');\">Удалить тикет</a>";
          $close  = "<br><A href=messages&action=close&id={$rr->id} onclick=\"javascript: return confirm('Вы уверены, что хотите закрыть тикет?');\">Закрыть тикет</a>";
          echo "\r\n\t\t\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t\t\t<td class=\"cell_empty\" height=\"23px\">Важность ";
          echo $_priority[$rr->priority];
          echo "<br>Тикет ";
          echo $_statusTicket[$rr->status];
          echo "</td>\r\n\t\t\t\t\t\t\t\t\t\t<td class=\"cell_empty\" height=\"23px\"><div align=\"left\" style=\"padding-left:5px;\"><a href=";
          echo $link;
          echo ">";
          echo $subj;
          echo "</a></div></td>\r\n\t\t\t\t\t\t\t\t\t\t<td class=\"cell_empty\" height=\"23px\">";
          echo $dt;
          echo "</td>\r\n\t\t\t\t\t\t\t\t\t\t<td class=\"cell_empty\" height=\"23px\">";
          echo $replys->cnt;
          echo "</td>\r\n\t\t\t\t\t\t\t\t\t\t<td class=\"cell_empty\" height=\"23px\">";
          echo $delete;
          echo " ";
          if ($rr->status == "open") {
              print $close;
          }
          echo "</td>\r\n\t\t\t\t\t\t\t\t\t</tr>\r\n\r\n\t\t\t";
      }
      if ($status == "open") {
          $view = "<a href=messages&status=closed>Показать закрытые тикеты</a>";
      } else if ($status == "closed") {
          $view = "<a href=messages>Показать открытые тикеты</a>";
      }
      echo "\t\t<tr bgcolor=";
      echo $font_head;
      echo "><Td colspan=6>Всего тикетов: ";
      echo $cnt;
      echo "</td></td></tr>\r\n\t\t<tr><td colspan=6 align=right>";
      echo $view;
      echo "</td></tr>\r\n\t\t</table><br>\r\n\r\n\t        <table border=0 width=100%>\r\n\t        <form method=post action='/";
      echo $_SESSION['language'];
      echo "/messages&action=new/0'>\r\n        \t<tr><td colspan=2 align=center><B>Новый тикет</b></td></tr>\r\n\t        <input type=hidden name=do value=";
      echo $do;
      echo ">\r\n\t        <input type=hidden name=sub value=new>\r\n\t        <tr><td style=\"float:right;\">Тема:</td><td><input type=text maxlength=50 class=\"input\" name=subject value=\"";
      echo $subject;
      echo "\" size=49></td></tr>\r\n\t        <tr><td style=\"float:right;\">Важность:</td><td>";
      getpriorityselect($priority);
      echo "</td></tr>\r\n\t        <tr><td valign=top style=\"float:right;\">Сообщение:</td><td><textarea name=message class=\"input\" cols=65 rows=6 style=\"width:85%;\">";
      echo $message;
      echo "</textarea></td></tr>\r\n\t        <tr><td colspan=2 align=center bgcolor=";
      echo $font_head;
      echo "><input type=Submit style=\"margin-top:10px;width:200px;color:#000000;\" value=\"Добавить тикет\"></td></tr></table><BR>\r\n\t        </form>\r\n\r\n\r\n";
  }
  if ($id_режим == "view" && $id != "" && $id_фильтер == true) {
      if (!($r = @mysql_query("select * from casino_tickets where (id={$id} and userid=" . $_SESSION['userId'] . " ) or parentid={$id} order by dt asc"))) {
          exit(mysql_error());
      }
      if (mysql_num_rows($r) == 0) {
          print "<font color=red>Тикет не найден. Возможно он был удален.</font><br><br>";
      } else {
          if (!@mysql_query("update casino_tickets set newforuser='0' where id={$id}")) {
              exit(mysql_error());
          }
          echo "\t\t\t\t<table cellspacing=0 cellpadding=0 width=\"100%\">\r\n\t\t\t\t\t\t\t\t<tbody>\r\n\t\t\t\t";
          while ($rr = mysql_fetch_object($r)) {
              ++$cnt;
              if ($rr->userid) {
                  $type = "Сообщение";
              } else {
                  $type = "Ответ";
              }
              if ($cnt == 1) {
                  $priority = "| Важность: " . $_priority[$rr->priority];
                  $status   = "| Статус: " . $_statusTicket[$rr->status];
                  print "<tr><td class='cell_2' width='15%'><div align='left'>Просмотр тикета: <B>" . stripslashes($rr->subject) . "</b></div></td></tr>";
              } else {
                  $priority = "";
                  $status   = "";
              }
              $rr->message = eregi_replace("\r\n", "<BR>", stripslashes($rr->message));
              $status_t    = $_statusTicket[$rr->status];
              print "<tr><td class='cell_empty'><div align='left'><b>#{$cnt} {$type}</b> | Дата: {$rr->dt} {$priority} {$status}</div></td></tr>";
              print "<tr><td class='cell_empty'><div align='left'>{$rr->message}<br></div></td></tr>";
          }
          echo "\t\t\t        <table border=0 width=100%>\r\n\t\t\t        <form method=post action='/";
          echo $_SESSION['language'];
          echo "/messages&action=send&id=";
          echo $id;
          echo "'>\r\n\t\t        \t\t<tr><td colspan=2 align=center><br><B>Добавить сообщение</b></td></tr>\r\n\t\t\t\t        <input type=hidden name=do value=";
          echo $do;
          echo ">\r\n\t\t\t\t        <input type=hidden name=sub value=reply>\r\n\t\t\t\t        <input type=hidden name=id value=";
          echo $id;
          echo ">\r\n\t\t\t\t        <tr><td valign=top>Сообщение:</td><td><textarea name=message class=\"input\" cols=136 rows=6>";
          echo $message;
          echo "</textarea></td></tr>\r\n\t\t\t\t        <tr><td colspan=2 align=center bgcolor=";
          echo $font_head;
          echo "><input type=Submit style=\"margin-top:10px;width:200px;color:#000000;\" value=\"Добавить\"></td></tr>\r\n\t\t\t\t\t</form>\r\n\t\t\t\t    </table>\r\n\r\n\t\t\t\t";
      }
  }
  if ($id_режим == "send" && $id != "" && $id_фильтер == true) {
      $id      = filter($_POST['id']);
      $message = filter($_POST['message']);
      $do      = filter($_POST['do']);
      if (!$message) {
          print "<font color=red>Не указано сообщение.</font><br><br>";
      } else {
          if (!@mysql_query("update casino_tickets set newforadmin='1',status='open' where id={$id}")) {
              exit(mysql_error());
          }
          if (!@mysql_query("insert into casino_tickets (parentid,dt,userid,message) values('{$id}',NOW(),'" . $_SESSION['userId'] . "','" . @addslashes($message) . "')")) {
              exit(mysql_error());
          }
          $ticket        = getticketbyid($id);
          $priority      = 3;
          $format        = "text/html";
          $config_query  = @mysql_fetch_array(@mysql_query("select * from casino_settings"));
          $site          = $config_query['siteadress'];
          $email_support = $config_query['emailcasino'];
          $user_id_query = @mysql_fetch_array(@mysql_query("select * from clients where login='" . $_SESSION['login'] . "'"));
          $user_id       = $user_id_query['id'];
          $user_email    = $user_id_query['email'];
          $msg .= "Здравствуйте, Служба поддержки,<br>";
          $msg .= "Пользователь " . $_SESSION['login'] . " добавил новое сообщение в тикет: <b>" . $ticket->subject . "</b> (ID # " . $id . ")<br><br>";
          $msg .= "Перейти к тикету можно по ссылке: <a href='http://" . $site . "/acp/acp_admin/index.php?do=&sub=view&id=" . $id . "'>http://" . $site . "/acp/acp_admin/index.php?do=&sub=view&id=" . $id . "</a><br>";
          $msg .= "---------------------<br>";
          $msg .= "С Наилучшими Пожеланиями,<br>";
          $msg .= "Робот Интернет-казино " . $site . "<br>";
          mail($email_support, "Ответ на тикет: [#" . $id . "], " . $ticket->subject, $msg, "From: {$user_email}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0");
          $subject  = "";
          $priority = "";
          $message  = "";
          echo "<script>alert(\"Сообщение успешно добавлено!\");</script>";
          echo "<script>location.href=\"/" . $_SESSION['language'] . "/messages\";</script>";
          exit();
          if (!TRUE) {
              exit();
          }
      }
  }
  echo "\r\n";
  if ($id_режим == "new") {
      $priority = filter($_POST['priority']);
      $message  = filter($_POST['message']);
      $subject  = filter($_POST['subject']);
      if (!$subject) {
          print "<font color=red>Не указана тема тикета.</font><br><br>";
      } else if ($priority == "") {
          print "<font color=red>Не указана важность тикета.</font><br><br>";
      } else if (!$message) {
          print "<font color=red>Не указано сообщение тикета.</font><br><br>";
      } else {
          if (!@mysql_query("insert into casino_tickets (priority,dt,subject,userid,message) values('{$priority}',NOW(),'" . @addslashes($subject) . "','" . $_SESSION['userId'] . "','" . @addslashes($message) . "')")) {
              exit(mysql_error());
          }
          $ticketid      = mysql_insert_id();
          $priority      = 3;
          $format        = "text/html";
          $config_query  = @mysql_fetch_array(@mysql_query("select * from casino_settings"));
          $site          = $config_query['siteadress'];
          $email_support = $config_query['emailcasino'];
          $user_id_query = @mysql_fetch_array(@mysql_query("select * from clients where login='" . $_SESSION['login'] . "'"));
          $user_id       = $user_id_query['id'];
          $user_email    = $user_id_query['email'];
          $msg .= "Здравствуйте, Служба поддержки,<br>";
          $msg .= "Пользователь " . $_SESSION['login'] . " создал новый тикет: <b>" . $subject . "</b> (ID # " . $ticketid . ")<br><br>";
          $msg .= "Перейти к тикету можно по ссылке: <a href='http://" . $site . "/acp/acp_admin/index.php?do=&sub=view&id=" . $ticketid . "'>http://" . $site . "/acp/acp_admin/index.php?do=&sub=view&id=" . $ticketid . "</a><br>";
          $msg .= "---------------------<br>";
          $msg .= "С Наилучшими Пожеланиями,<br>";
          $msg .= "Робот Интернет-казино " . $site . "<br>";
          mail($email_support, "Новый тикет: [#" . $ticketid . "], " . $subject, $msg, "From: {$user_email}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0");
          $subject  = "";
          $priority = "";
          $message  = "";
          echo "<script>alert(\"Сообщение успешно добавлено!\");</script>";
          echo "<script>location.href=\"/" . $_SESSION['language'] . "/messages\";</script>";
          exit();
          if (!TRUE) {
              exit();
          }
      }
  }
  echo "\r\n";
  if (!($r = @mysql_query("select * from casino_tickets where id={$id} and userid=" . $_SESSION['userId']))) {
      exit(mysql_error());
  }
  if ($id_режим == "delete" && $id != "" && $id_фильтер == true && 0 < mysql_num_rows($r)) {
      if (!@mysql_query("delete from casino_tickets where id={$id}")) {
          exit(mysql_error());
      }
      if (!@mysql_query("delete from casino_tickets where parentid={$id}")) {
          exit(mysql_error());
      }
      echo "<script>alert(\"Тикет успешно удален!\");</script>";
      echo "<script>location.href=\"/" . $_SESSION['language'] . "/messages\";</script>";
      exit();
      if (!TRUE) {
          exit();
      }
  }
  echo "\r\n";
  if ($id_режим == "close" && $id != "" && $id_фильтер == true) {
      if (!@mysql_query("update casino_tickets set status='closed' where id={$id} and userid=" . $_SESSION['userId'])) {
          exit(mysql_error());
      }
      if (!@mysql_query("insert into casino_tickets (parentid,dt,userid,message) values('{$id}',NOW(),'" . $_SESSION['userId'] . "','Тикет закрыт клиентом.')")) {
          exit(mysql_error());
      }
      echo "<script>alert(\"Тикет успешно закрыт.!\");</script>";
      echo "<script>location.href=\"/" . $_SESSION['language'] . "/messages\";</script>";
      exit();
      if (!TRUE) {
          exit();
      }
  }
?>
