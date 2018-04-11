<?php
  function filter_replace($word)
  {
      $from = "eETyoOpPaAHkKxXcCBM";
      $to   = "åÅÒóîÎðÐàÀÍêÊõÕñÑÂÌ";
      $res  = strtr($word[0], $from, $to);
      return $word[0] != $res ? $res : false;
  }
  
  function filter($text)
  {
      $signature = array(
          "onabort",
          "onblur",
          "onchange",
          "onclick",
          "ondblclick",
          "onerror",
          "onfocus",
          "onkeydown",
          "onkeypress",
          "onkeyup",
          "onload",
          "onmousedown",
          "onmousemove",
          "onmouseout",
          "onmouseover",
          "onmouseup",
          "onmove",
          "onreset",
          "onresize ",
          "onselect",
          "onsubmit",
          "onunload",
          "eval",
          "unescape",
          "decodeuricomponent",
          "fromcharcode",
          "charcodeat",
          "charat",
          "xml",
          "layer",
          "link",
          "meta",
          "union",
          "outfile",
          "from",
          "select",
          "where",
          "shutdown",
          "update",
          "delete",
          "change",
          "modify",
          "rename",
          "reload",
          "alter",
          "grant",
          "drop",
          "insert",
          "concat",
          "cmd",
          "exec",
          "system",
          "passthru",
          "fopen",
          "fread",
          "fwrite",
          "file",
          "include",
          "include_once",
          "require",
          "require_once",
          "file_get_contents",
          "javascript",
          "vbscript",
          "java",
          "xss",
          "a",
          "abbr",
          "acronym",
          "address",
          "applet",
          "area",
          "base",
          "basefont",
          "bdo",
          "bgsound",
          "blink",
          "blockquote",
          "body",
          "button",
          "caption",
          "center",
          "cite",
          "code",
          "col",
          "colgroup",
          "del",
          "div",
          "dl",
          "em",
          "embed",
          "fieldset",
          "font",
          "form",
          "frame",
          "frameset",
          "head",
          "iframe",
          "img",
          "input",
          "ins",
          "isindex",
          "kbd",
          "label",
          "legend",
          "link",
          "map",
          "marquee",
          "menu",
          "meta",
          "nobr",
          "noembed",
          "noframes",
          "noscript",
          "object",
          "ol",
          "optgroup",
          "option",
          "param",
          "plaintext",
          "pre",
          "samp",
          "script",
          "select",
          "small",
          "span",
          "strike",
          "strong",
          "style",
          "sub",
          "sup",
          "table",
          "tbody",
          "textarea",
          "tfoot",
          "thead",
          "title",
          "var",
          "wbr",
          "xmp"
      );
      $regex     = "/[^a-z0-9](";
      foreach ($signature as $sign) {
          $regex .= preg_quote($sign, "/") . "|";
      }
      $regex = rtrim($regex, "|") . ")[^a-z0-9]/i";
      $text  = str_replace("\x00", " ", $text);
      $text  = preg_replace_callback($regex, "filter_replace", $text);
      $text  = htmlspecialchars($text, ENT_QUOTES);
      $text  = mysql_escape_string($text);
      return $text;
  }
  
  function new_pass($len = 8, $charset = "")
  {
      if ($charset == "") {
          $charset = "abcdefghijklmnopqrstuvwxyz" . "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      }
      $res = "";
      $num = strlen($charset);
      $i   = 0;
      while ($i < $len) {
          $idx  = mt_rand(0, $num - 1);
          $char = $charset[$idx];
          $res .= $char;
          ++$i;
      }
      return $res;
  }
  
  function htmltext($html)
  {
      return htmlspecialchars($html, ENT_QUOTES);
  }
  
  function get_template($content, $start_template, $finish_template)
  {
      $start_pos   = strpos($content, $start_template);
      $sub_content = substr($content, $start_pos, strlen($content));
      $finish_pos  = strpos($sub_content, $finish_template) + strlen($finish_template);
      return substr($content, $start_pos, $finish_pos);
  }
  
  if (!defined("CASINOENGINE")) {
      exit("Íåò äîñòóïà!<script>location.href='/';</script>");
  }
?>