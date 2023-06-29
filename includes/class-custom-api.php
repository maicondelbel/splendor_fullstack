<?php

/** API REST CLASS **/
class Splendor_REST_Controller {

    public function __construct() {
        $this->namespace     = '/v2';
        $this->resource_name = '/splendor_test';
    }

    public function register_routes() {
        register_rest_route( $this->namespace, '/' . $this->resource_name, array(
            array(
                'methods'   => 'POST',
                'callback'  => array( $this, 'get_items' ),
            ),
        ) );
    }

    public function get_items( $request ) {

        $arg = $request->get_param( 'codigo' );
        $codes = apply_filters('splendor_test', []);
        $current_time = current_time('d/m/y H:i');
        
        if(in_array($arg, $codes)) {
          
          $data = ["status" => true, "data" => $current_time, "codigo" => $codes[0]];
          
          return rest_ensure_response( array('retorno' => $data) );
        }
        
        return new WP_REST_Response( array('Erro 403: não autorizado'), 403 );
    }
}

function prefix_register_my_rest_routes() {
  $controller = new Splendor_REST_Controller();
  $controller->register_routes();
}

add_action( 'rest_api_init', 'prefix_register_my_rest_routes' );