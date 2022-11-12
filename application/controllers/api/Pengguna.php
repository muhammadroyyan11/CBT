<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Pengguna extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //inisialisasi model Produk_model.php dengan nama produk
        $this->load->model('Api_model', 'api');
    }
    public function pengguna_get()
    {
        $id = $this->get('id');
        if ($id == '') {
            $produk = $this->api->get_pengguna()->result();
        } else {
            $produk = $this->api->get_pengguna($id)->result();
        }
        $this->response($produk, REST_Controller::HTTP_OK);
    }
}
