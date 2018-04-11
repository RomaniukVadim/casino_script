<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $page = intval($_GET['news']);
  if ($page == "") {
      $short_story_query = mysql_fetch_array(mysql_query("SELECT short_story FROM casino_news"));
      if ($short_story_query != "") {
          $news_tpl        = file_get_contents(TEMPLATE_DIR . "/blocks/news.tpl");
          $header_news_tpl = get_template($news_tpl, "[header_short_story]", "[/header_short_story]");
          $header_news_tpl = str_replace("[header_short_story]", "", $header_news_tpl);
          $header_news_tpl = str_replace("[/header_short_story]", "", $header_news_tpl);
          echo $header_news_tpl;
          $newsmain_query = mysql_fetch_array(mysql_query("select newsmain from casino_settings"));
          $news_query     = @mysql_query("select * from casino_news ORDER BY id ASC LIMIT " . $newsmain_query['newsmain'] . "");
          while ($news = @mysql_fetch_array($news_query)) {
              $header_short_story = get_template($news_tpl, "[short_story]", "[/short_story]");
              $header_short_story = str_replace("[short_story]", "", $header_short_story);
              $header_short_story = str_replace("[/short_story]", "", $header_short_story);
              $header_short_story = str_replace("{short_story}", $news['short_story'], $header_short_story);
              $header_short_story = str_replace("{date}", $news['date'], $header_short_story);
              $header_short_story = str_replace("{title}", $news['title'], $header_short_story);
              $header_short_story = str_replace("{descr}", $news['descr'], $header_short_story);
              $header_short_story = str_replace("{keywords}", $news['keywords'], $header_short_story);
              $header_short_story = str_replace("{full_story_link}", "/news/" . $news['id'], $header_short_story);
              echo $header_short_story;
          }
          $footer_news_tpl = get_template($news_tpl, "[footer_short_story]", "[/footer_short_story]");
          $footer_news_tpl = str_replace("[footer_short_story]", "", $footer_news_tpl);
          $footer_news_tpl = str_replace("[/footer_short_story]", "", $footer_news_tpl);
          echo $footer_news_tpl;
      } else {
          echo "<center>Ошибка!</center>";
      }
  } else {
      $news_query = mysql_fetch_array(mysql_query("SELECT date,title,full_story,descr,keywords FROM casino_news WHERE id='{$page}' LIMIT 1"));
      if ($news_query != "") {
          $date       = $news_query['date'];
          $title      = $news_query['title'];
          $full_story = $news_query['full_story'];
          $descr      = $news_query['descr'];
          $keywords   = $news_query['keywords'];
          $news_tpl   = file_get_contents(TEMPLATE_DIR . "/page_news.tpl");
          $news_tpl   = str_replace("{date}", $date, $news_tpl);
          $news_tpl   = str_replace("{title}", $title, $news_tpl);
          $news_tpl   = str_replace("{full_story}", $full_story, $news_tpl);
          $news_tpl   = str_replace("{descr}", $descr, $news_tpl);
          $news_tpl   = str_replace("{keywords}", $keywords, $news_tpl);
          echo $news_tpl;
      } else {
          echo "<center>Статья не найдена!</center>";
      }
  }
?>