<?php
  function err_handler()
  {
      if (_ERR_HANDLING) {
          $error_reporting = "";
          $error_reporting = ini_get("error_reporting");
          $error_reporting = $error_reporting ? $error_reporting : E_ALL;
          error_reporting(E_ERROR);
          $date_file = date("dmY") . ".php";
          $dir       = _ERR_DIR;
          $path      = $dir . $date_file;
          $logfile   = "";
          if (!is_dir($dir) || !is_writable($dir)) {
              if (is_dir($dir) && !is_writable($dir)) {
                  chmod($dir, 509);
              } else if (!is_dir($dir)) {
                  $isdir = false;
                  $isdir = mkdir($dir, 509);
              }
              if (!$isdir && !is_writable($dir)) {
                  $dir  = ROOT_PATH;
                  $path = $date_file;
              }
          }
          if (is_dir($dir) && is_writable($dir)) {
              if (!is_file($path)) {
                  $fp = fopen($path, "w+");
                  if ($fp && is_resource($fp)) {
                      $secuire = "<?php die(\"Forbidden.\"); ?>";
                      flock($fp, LOCK_EX);
                      fwrite($fp, $secuire . "\n");
                      flock($fp, LOCK_UN);
                      fclose($fp);
                      $fp = null;
                      unset($secuire);
                  }
              }
              if (is_file($path) && !is_writable($path)) {
                  chmod($path, 509);
              }
              if (is_file($path) && is_writable($path)) {
                  ini_set("display_errors", 0);
                  set_error_handler("error_reporting_log", E_ALL & ~E_NOTICE);
                  $logfile = $path;
                  define("LOG_FILE", $logfile);
              }
              unset($date_file);
              unset($dir);
              unset($path);
              unset($logfile);
          }
      }
      error_reporting($error_reporting);
      unset($error_reporting);
  }
  
  function error_reporting_log($error_num, $error_var = null, $error_file = null, $error_line = null)
  {
      $error_desc = "";
      $error_desc = "Error";
      switch ($error_num) {
      case E_WARNING:
          $error_desc = "E_WARNING";
          break;
      default:
          switch ($error_num) {
          case E_USER_WARNING:
              $error_desc = "E_USER_WARNING";
              break;
          default:
              switch ($error_num) {
              case E_NOTICE:
                  $error_desc = "E_NOTICE";
                  break;
              default:
                  switch ($error_num) {
                  case E_USER_NOTICE:
                      $error_desc = "E_USER_NOTICE";
                      break;
                  default:
                      switch ($error_num) {
                      case E_USER_ERROR:
                      }
                      $error_desc = "E_USER_ERROR";
                      break;
                      $error_desc = "E_ALL";
                      break;
                  }
              }
          }
      }
      $date_file = date("y-m-d H:I:S");
      $logfile   = LOG_FILE;
      $url       = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      $date_time = date("d.m.y - H:i:s");
      $ip        = $_SERVER['REMOTE_ADDR'];
      $from      = isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "";
      $errortext = $error_desc . ": " . $error_var . "\t" . "Line: " . $error_line . "\t" . "File: " . $error_file . "\t" . "Link: " . $url . "\t" . "Date: " . $date_time . "\t" . "IP: " . $ip . "\t" . " FROM:" . $from . "\n";
      unset($from);
      unset($error_desc);
      unset($error_var);
      unset($error_line);
      unset($error_file);
      unset($url);
      unset($date_time);
      unset($error_write);
      $secuire = "<?php die(\"Forbidden.\"); ?>";
      if (is_file($logfile) && is_writeable($logfile)) {
          $strings = file($logfile);
          if (isset($strings[0]) && !empty($strings[0]) && strpos($strings[0], $secuire) === false) {
              unlink($logfile);
          }
          unset($strings);
      }
      if (!is_file($logfile)) {
          $dir = dirname($logfile);
          if (is_dir($dir) && is_writable($dir)) {
              $fp = fopen($logfile, "w+");
              if (is_resource($fp)) {
                  flock($fp, LOCK_EX);
                  fwrite($fp, $secuire . "\n");
                  flock($fp, LOCK_UN);
                  fclose($fp);
                  $fp = null;
              }
              unset($dir);
              unset($fp);
          }
      }
      unset($secuire);
      if (is_file($logfile) && !is_writable($logfile)) {
          chmod($logfile, 509);
      }
      if (is_file($logfile) && is_writeable($logfile)) {
          $fp = fopen($logfile, "a+");
          if (is_resource($fp)) {
              flock($fp, LOCK_EX);
              fwrite($fp, $errortext);
              flock($fp, LOCK_UN);
              fclose($fp);
              $fp = null;
              unset($fp);
          }
      }
      unset($logfile);
      return true;
  }
  
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'] . "/");
  define("_ERR_HANDLING", true);
  define("_ERR_DIR", ROOT_PATH . "/logs/");
  err_handler();
?>