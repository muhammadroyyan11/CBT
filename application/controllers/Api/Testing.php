<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Testing extends RestController {

    function __construct()
    {
        parent::__construct();
    }

    public function users_get()
    {
        $jurusan = $this->Api_model->get_pengguna()->result_array();

        $id = $this->get( 'id' );

        if ( $id === null )
        {
            if ( $jurusan )
            {
                $this->response( $jurusan, 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'No users were found'
                ], 404 );
            }
        }
        else
        {
            if ( array_key_exists( $id, $jurusan ) )
            {
                $this->response( $jurusan[$id], 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'No such user found'
                ], 404 );
            }
        }
    }
}