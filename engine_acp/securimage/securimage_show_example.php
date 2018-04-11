<?php
  include("securimage.php");
  $img                               = new securimage();
  $img->image_width                  = 168;
  $img->image_height                 = 45;
  $img->perturbation                 = 0.9;
  $img->image_bg_color               = new Securimage_Color("#f6f6f6");
  $img->text_angle_minimum           = 0 - 5;
  $img->text_angle_maximum           = 5;
  $img->use_transparent_text         = true;
  $img->text_transparency_percentage = 30;
  $img->num_lines                    = 7;
  $img->line_color                   = new Securimage_Color("#eaeaea");
  $img->signature_color              = new Securimage_Color(rand(0, 64), rand(64, 128), rand(128, 255));
  $img->text_color                   = new Securimage_Color(rand(0, 64), rand(64, 128), rand(128, 255));
  $img->use_wordlist                 = true;
  $img->draw_lines_over_text         = false;
  $img->code_length                  = rand(3, 5);
  $img->gd_font_file                 = 50;
  $img->show("backgrounds/bg3.jpg");
?>
