<?php
  include("securimage.php");
  $img                               = new securimage();
  $img->image_width                  = 171;
  $img->image_height                 = 61;
  $img->perturbation                 = 0.85;
  $img->image_bg_color               = new Securimage_Color("#f6f6f6");
  $img->text_angle_minimum           = 0 - 5;
  $img->text_angle_maximum           = 5;
  $img->use_transparent_text         = true;
  $img->text_transparency_percentage = 30;
  $img->num_lines                    = 4;
  $img->line_color                   = new Securimage_Color("#eaeaea");
  $img->image_signature              = "casino.com";
  $img->signature_color              = new Securimage_Color(rand(0, 64), rand(64, 128), rand(128, 255));
  $img->use_wordlist                 = true;
  $img->draw_lines_over_text         = true;
  $img->show("backgrounds/bg6.jpg");
?>