<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model13 extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}

	function update_cart($rowid, $qty, $price, $amount) {
 		$data = array(
			'rowid'   => $rowid,
			'qty'     => $qty,
			'price'   => $price,
			'amount'   => $amount
		);

		$this->cart->update($data);
	}
}