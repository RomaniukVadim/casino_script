<?php
  function filter($sql)
  {
      $baddata = array(
          "UNION",
          "OUTFILE",
          "FROM",
          "SELECT",
          "WHERE",
          "SHUTDOWN",
          "UPDATE",
          "DELETE",
          "CHANGE",
          "MODIFY",
          "RENAME",
          "RELOAD",
          "ALTER",
          "GRANT",
          "DROP",
          "INSERT",
          "CONCAT",
          "cmd",
          "exec",
          "--",
          "\\([^>]*\"?[^)]*\\)",
          "<[^>]*body*\"?[^>]*>",
          "<[^>]*script*\"?[^>]*>",
          "<[^>]*object*\"?[^>]*>",
          "<[^>]*iframe*\"?[^>]*>",
          "<[^>]*img*\"?[^>]*>",
          "<[^>]*frame*\"?[^>]*>",
          "<[^>]*applet*\"?[^>]*>",
          "<[^>]*meta*\"?[^>]*>",
          "<[^>]*style*\"?[^>]*>",
          "<[^>]*form*\"?[^>]*>",
          "<[^>]*div*\"?[^>]*>"
      );
      foreach ($baddata as $badkey => $badvalue) {
          if (is_string($sql) && eregi($badvalue, $sql)) {
              $badcount = 1;
          }
      }
      if ($badcount == 1) {
          exit();
      }
      $sql = @mysql_real_escape_string($sql);
      $sql = @htmlspecialchars($sql);
      return $sql;
  }
  
?>