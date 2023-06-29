<?php

/** FILTER **/
function splendor_test_callback( $codigo_pessoas ) {

  array_push($codigo_pessoas, '0089');

  return $codigo_pessoas;
}

add_filter( 'splendor_test', 'splendor_test_callback' );
