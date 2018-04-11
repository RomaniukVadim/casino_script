<?php
  include("securimage.php");
  $img                               = new securimage();
  $img->image_width                  = 280;
  $img->image_height                 = 100;
  $img->perturbation                 = 0.9;
  $img->code_length                  = rand(5, 6);
  $img->image_bg_color               = new Securimage_Color("#ffffff");
  $img->use_transparent_text         = true;
  $img->text_transparency_percentage = 75;
  $img->num_lines                    = 15;
  $img->image_signature              = "";
  $img->text_color                   = new Securimage_Color("#000000");
  $img->line_color                   = new Securimage_Color("#cccccc");
  $img->show("");
?>