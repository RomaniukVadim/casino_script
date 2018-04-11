<?php
  include("securimage.php");
  $img               = new Securimage();
  $img->audio_format = isset($_GET['format']) && in_array(strtolower($_GET['format']), array(
      "mp3",
      "wav"
  )) ? strtolower($_GET['format']) : "mp3";
  $img->outputAudioFile();
?>