<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  if ($_SESSION['login'] != "") {
      $action = $_POST['action'];
      $error  = "";
      if ($action == "") {
          $page_profile_tpl = file_get_contents(TEMPLATE_DIR . "/page_profile.tpl");
          $page_profile_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_profile_tpl);
          $page_profile_tpl = str_replace("{language}", $_SESSION['language'], $page_profile_tpl);
          $client_query     = mysql_fetch_array(mysql_query("SELECT * FROM clients WHERE login='" . $_SESSION['login'] . "' limit 1"));
          $page_profile_tpl = str_replace("{login}", $client_query['login'], $page_profile_tpl);
          $page_profile_tpl = str_replace("{pass}", $client_query['pass'], $page_profile_tpl);
          $page_profile_tpl = str_replace("{email}", $client_query['email'], $page_profile_tpl);
          echo $page_profile_tpl;
      }
      if ($action == "update_profile") {
          $profile_new_pass1        = $_POST['profile_new_pass1'];
          $profile_new_pass2        = $_POST['profile_new_pass2'];
          $profile_email            = $_POST['profile_email'];
          $profile_new_pass1_filter = preg_match("/^[A-Za-z0-9]{6,20}\$/D", $profile_new_pass1);
          $profile_new_pass2_filter = preg_match("/^[A-Za-z0-9]{6,20}\$/D", $profile_new_pass2);
          $profile_email_filter     = preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+(\\.[a-zA-Z0-9]+[a-zA-Z0-9_-]*)+\$/D", $profile_email);
          if ($profile_new_pass1 != "" && $profile_new_pass1_filter == false) {
              $error .= "Не корректный пароль\\n";
          }
          if ($profile_new_pass2 != "" && $profile_new_pass2_filter == false) {
              $error .= "Не корректный повторный пароль\\n";
          }
          if ($profile_new_pass1 != "" && $profile_new_pass2 != "" && $profile_new_pass1 != $profile_new_pass2) {
              $error .= "Пароль и повторный пароль несовпадают\\n";
          }
          if ($profile_email == "") {
              $error .= "Не введён почтовый адрес\\n";
          } else if ($profile_email_filter == false) {
              $error .= "Не корректный почтовый адрес\\n";
          }
          if ($error == "") {
              if ($profile_new_pass1 != "") {
                  $profile_new_pass1_md5 = md5($profile_new_pass1);
                  @mysql_query("UPDATE clients SET pass='" . $profile_new_pass1_md5 . "' WHERE login='" . $_SESSION['login'] . "'");
              }
              if ($profile_email != "") {
                  @mysql_query("UPDATE clients SET email='" . $profile_email . "' WHERE login='" . $_SESSION['login'] . "'");
              }
              echo "<script> alert('Данные успешно обновленны!');</script>";
              echo "<script>location.href=\"/" . $_SESSION['language'] . "/profile\";</script>";
              exit();
              if (!TRUE) {
                  exit();
              }
          } else {
              echo "<script> alert('Ошибка: " . $error . "');</script>";
              echo "<script>location.href=\"/" . $_SESSION['language'] . "/profile\";</script>";
              exit();
              if (!TRUE) {
                  exit();
              }
          }
      }
  } else {
	$_SESSION['needToLogin'] = true;
    echo "<script>location.href=\"/ru/\";</script>";
    exit( );
  }
?>