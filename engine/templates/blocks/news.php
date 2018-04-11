<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $short_story_query = mysql_fetch_array(mysql_query("SELECT short_story FROM casino_news"));
  if ($short_story_query != "") {
      $news_tpl        = file_get_contents(TEMPLATE_DIR . "/blocks/news.tpl");
      $header_news_tpl = get_template($news_tpl, "[header_short_story]", "[/header_short_story]");
      $header_news_tpl = str_replace("[header_short_story]", "", $header_news_tpl);
      $header_news_tpl = str_replace("[/header_short_story]", "", $header_news_tpl);
      echo $header_news_tpl;
      $newsmain_query = mysql_fetch_array(mysql_query("select newsmain from casino_settings"));
      $news_query     = @mysql_query("select * from casino_news ORDER BY id DESC LIMIT " . $newsmain_query['newsmain'] . "");
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
?>