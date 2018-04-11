<?


  function limiterr( $model )
    {
	  global $dur;
	  if($dur == 'fun')
		return 9999999999;
      $casino = mysql_fetch_array( mysql_query( "select * from games_bank where name='ttuz'" )       );
      $tandk[0] = $casino['bank'] / 100 * $casino['proc']                                            ;//0
      $tandk[1] = $casino['bonus']                                                                   ;//1
      $tandk[2] = $casino['bonusready']                                                              ;//2
      $casino = mysql_fetch_array( mysql_query( "select * from games_bank where name='25linb2'" )    );
      $tandk[3] = $casino['bank'] / 100 * $casino['proc']                                            ;//3
      $tandk[4] = $casino['bonus']                                                                   ;//4
      $tandk[5] = $casino['bonusready']                                                              ;//5
      $casino = mysql_fetch_array( mysql_query( "select * from games_bank where name='atlantis'" ) );
      $tandk[6] = $casino['bank'] / 100 * $casino['proc']                                            ;//6
      $tandk[7] = $casino['bonus']                                                                   ;//7
      $tandk[8] = $casino['bonusready']                                                              ;//8
      return $tandk[$model]                                                                         ;
    }
?>