<?php

/** SHORTCODE **/
function splendor_fullstack_shortcode() { 

  $current_user = wp_get_current_user();
  $current_time = current_time('d/m/y H:i');

  return '<span>'.$current_user->user_login.' '.$current_time.'</span>';  
}

add_shortcode('splendor_fullstack', 'splendor_fullstack_shortcode');
