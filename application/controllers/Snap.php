<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Snap extends CI_Controller {
		
		/**
			* Index Page for this controller.
			*
			* Maps to the following URL
			* 		http://example.com/index.php/welcome
			*	- or -  
			* 		http://example.com/index.php/welcome/index
			*	- or -
			* Since this controller is set as the default controller in 
			* config/routes.php, it's displayed at http://example.com/
			*
			* So any other public methods not prefixed with an underscore will
			* map to /index.php/welcome/<method_name>
			* @see http://codeigniter.com/user_guide/general/urls.html
		*/
		
		
		public function __construct()
		{
			parent::__construct();
			$params = array('server_key' => 'Mid-server-9s4s4eV_pjkNinYNvM6t3K9p', 'production' => true);
			$this->load->library('midtrans');
			$this->midtrans->config($params);
			$this->load->helper('url');	
			$this->load->model('model14');
		}
		
		public function index()
		{
			$this->load->view('checkout_snap');
		}
		
		public function riwayat($offset=0)
		{
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'riwayat/',
			'total_rows' => $this->model14->hitung_baris(),
			'per_page' => $perpage,
			'full_tag_open' => '<ul class="pagination" id="search_page_pagination">',
			'full_tag_close' => '</ul>',
			'cur_tag_open' => '<li class="active"><a href="javascript:void(0)">',
			'num_tag_open' => '<li>',
			'num_tag_close' =>'</li>',
			'cur_tag_close' => '</a></li>',
			'first_link' => 'Awal',
			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',
			'last_link' => 'Akhir',
			'last_tag_open' => '<li>',
			'last_tag_close' => '</li>',
			'next_link' => 'Selanjutnya',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_link' => 'Sebelumnya',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'page_query_string' => FALSE,
			'display_pages' => FALSE,
			);
			$this->pagination->initialize($config);
			$limit['perpage'] = $perpage;
			$limit['offset'] = $offset;
			$data['vieworder'] = $this->model14->select_all_paging($limit)->result();
			$this->load->view('view66',$data);
		}
		
		public function token()
		{	
			$cust_id = $this->input->post('idp');
			$namasiswa = $this->input->post('namasiswa');
			$no_peserta = $this->input->post('no_peserta');
			$nama = explode(',',$this->input->post('nama'));
			$harga = explode(',',$this->input->post('harga'));
			$qty = explode(',',$this->input->post('qty'));
			$total = $this->input->post('total');
			$idprod = explode(',',$this->input->post('idprod'));
			$email = $this->input->post('email');
			$hp = $this->input->post('hp');
			$kota = $this->input->post('kota');
			
			$jml = count($idprod);
			
			
			// Required
			$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $total, // no decimal allowed for creditcard
			);
			
			if ($jml==1){
				$item1_details = array(
				'id' => $idprod[0],
				'price' => $harga[0],
				'quantity' => $qty[0],
				'name' => $nama[0]
				);
				
				$item_details = array ($item1_details);
				} else if ($jml==2){
				
				$item1_details = array(
				'id' => $idprod[0],
				'price' => $harga[0],
				'quantity' => $qty[0],
				'name' => $nama[0]
				);
				
				$item2_details = array(
				'id' => $idprod[1],
				'price' => $harga[1],
				'quantity' => $qty[1],
				'name' => $nama[1]
				);
				
				$item_details = array ($item1_details, $item2_details);
				} else if ($jml==3){
				
				$item1_details = array(
				'id' => $idprod[0],
				'price' => $harga[0],
				'quantity' => $qty[0],
				'name' => $nama[0]
				);
				
				$item2_details = array(
				'id' => $idprod[1],
				'price' => $harga[1],
				'quantity' => $qty[1],
				'name' => $nama[1]
				);
				
				$item3_details = array(
				'id' => $idprod[2],
				'price' => $harga[2],
				'quantity' => $qty[2],
				'name' => $nama[2]
				);
				
				$item_details = array ($item1_details, $item2_details, $item3_details);
				} else if ($jml==4){
				
				$item1_details = array(
				'id' => $idprod[0],
				'price' => $harga[0],
				'quantity' => $qty[0],
				'name' => $nama[0]
				);
				
				$item2_details = array(
				'id' => $idprod[1],
				'price' => $harga[1],
				'quantity' => $qty[1],
				'name' => $nama[1]
				);
				
				$item3_details = array(
				'id' => $idprod[2],
				'price' => $harga[2],
				'quantity' => $qty[2],
				'name' => $nama[2]
				);
				
				$item4_details = array(
				'id' => $idprod[3],
				'price' => $harga[3],
				'quantity' => $qty[3],
				'name' => $nama[3]
				);
				
				$item_details = array ($item1_details, $item2_details, $item3_details, $item4_details);
				} else if ($jml==5){
				
				$item1_details = array(
				'id' => $idprod[0],
				'price' => $harga[0],
				'quantity' => $qty[0],
				'name' => $nama[0]
				);
				
				$item2_details = array(
				'id' => $idprod[1],
				'price' => $harga[1],
				'quantity' => $qty[1],
				'name' => $nama[1]
				);
				
				$item3_details = array(
				'id' => $idprod[2],
				'price' => $harga[2],
				'quantity' => $qty[2],
				'name' => $nama[2]
				);
				
				$item4_details = array(
				'id' => $idprod[3],
				'price' => $harga[3],
				'quantity' => $qty[3],
				'name' => $nama[3]
				);
				
				$item5_details = array(
				'id' => $idprod[4],
				'price' => $harga[4],
				'quantity' => $qty[4],
				'name' => $nama[4]
				);
				
				
				$item_details = array ($item1_details, $item2_details, $item3_details, $item4_details, $item5_details);
			}
			
			
			
			
			// Optional
			$billing_address = array(
			'first_name'    => $namasiswa,
			'last_name'     => $no_peserta,
			'address'       => $kota,
			'city'          => $kota,
			'postal_code'   => "12345",
			'phone'         => $hp,
			'country_code'  => 'IDN'
			);
			
			// Optional
			$shipping_address = array(
			'first_name'    => $namasiswa,
			'last_name'     => $no_peserta,
			'address'       => $kota,
			'city'          => $kota,
			'postal_code'   => "12345",
			'phone'         => $hp,
			'country_code'  => 'IDN'
			);
			
			// Optional
			$customer_details = array(
			'first_name'    => $namasiswa,
			'last_name'     => $no_peserta,
			'email'         => $email,
			'phone'         => $hp,
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
			);
			
			// Data yang akan dikirim untuk request redirect_url.
			$credit_card['secure'] = true;
			//ser save_card true to enable oneclick or 2click
			//$credit_card['save_card'] = true;
			
			$time = time();
			$custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'day', 
            'duration'  => 1
			);
			
			$transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
			);
			
			error_log(json_encode($transaction_data));
			$snapToken = $this->midtrans->getSnapToken($transaction_data);
			error_log($snapToken);
			echo $snapToken;
			
			
		}
		
		public function finish()
		{
			
			
			$result = json_decode($this->input->post('result_data'),true);
			$cust_id = $this->input->post('idp');
			
			$order = array(
			'date' 			=> date('Y-m-d'),
			'morderid' 		=> $result['order_id'],
			'customerid' 	=> $cust_id
			);		
			
			$ord_id = $this->model14->insert_order($order);
			
			
			if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
			$order_detail = array(
			'orderid' 		=> $ord_id,
			'morderid' 		=> $result['order_id'],
			'productid' 	=> $item['id'],
			'quantity' 		=> $item['qty'],
			'price' 		=> $item['price'],
			'gross_amount' => $result['gross_amount'],
			'payment_type' => $result['payment_type'],
			'transaction_time' => $result['transaction_time'],
			'pdf_url' => $result['pdf_url'],
			'status_code' => $result['status_code']
			);		
			
			$cust_id = $this->model14->insert_order_detail($order_detail);
			endforeach;
			endif;
			
			$this->cart->destroy();
			$this->load->view('view66',$data);	
			
		}
		
		public function createGopay(){
			$external_id = 'gopay-'.time();
			$transaction_details = array(
			'order_id' => $external_id,
			'gross_amount' => 10000, // no decimal allowed for creditcard
			
			);
			
			$gopay = array(
			'enable_callback' => false,
			'callback_url' => ''
			
			);
			
			
			$transaction_data = array(
            'transaction_details'=> $transaction_details,
			);
			
			error_log(json_encode($transaction_data));
			$snapToken = $this->midtrans->getSnapToken($transaction_data);
			error_log($snapToken);
			echo $snapToken;
			
		}
		
		public function tes(){
			
			$cust_id = $this->input->post('idp');
			$namasiswa = $this->input->post('namasiswa');
			$no_peserta = $this->input->post('no_peserta');
			$nama = explode(',',$this->input->post('nama'));
			$harga = explode(',',$this->input->post('harga'));
			$qty = explode(',',$this->input->post('qty'));
			$total = $this->input->post('total');
			$idprod = explode(',',$this->input->post('idprod'));
			$email = $this->input->post('email');
			$hp = $this->input->post('hp');
			$kota = $this->input->post('kota');
			$jenisbayar = $this->input->post('jenisbayar');
			
			$jml = count($idprod);			
			
			$apiKey       = 'HH6GXL8GzNhSFNkqdUALzdYRpnozIFeHPZYwsjEE';
			$privateKey   = '0ijkb-bD9ey-Qc3hS-yCKuB-ti811';
			$merchantCode = 'T10555';
			$merchantRef  = rand();
			$amount       =  $total;
			
			if ($jml==1){
			$data = [
			'method'         => $jenisbayar,
			'merchant_ref'   => $merchantRef,
			"type" => 'redirect',
			'amount'         => $amount,
			'customer_name'  => $namasiswa,
			'customer_email' => $email,
			'customer_phone' => $hp,
			'order_items'    => [
			[
            'sku'         => $idprod[0],
            'name'        => $nama[0],
            'price'       => $harga[0],
            'quantity'    => $qty[0],
			],
			
			],
			'return_url'   => 'http://masukkuliah.com/cbt/clbk',
			'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
			'signature'    => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
			]; 
			} else if ($jml==2){
			$data = [
			'method'         => $jenisbayar,
			'merchant_ref'   => $merchantRef,
			"type" => 'redirect',
			'amount'         => $amount,
			'customer_name'  => $namasiswa,
			'customer_email' => $email,
			'customer_phone' => $hp,
			'order_items'    => [
			[
            'sku'         => $idprod[0],
            'name'        => $nama[0],
            'price'       => $harga[0],
            'quantity'    => $qty[0],
			],
			[
            'sku'         => $idprod[1],
            'name'        => $nama[1],
            'price'       => $harga[1],
            'quantity'    => $qty[1],
			],
			
			],
			'return_url'   => 'http://masukkuliah.com/cbt/clbk',
			'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
			'signature'    => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
			]; 
			} else if ($jml==3){
			$data = [
			'method'         => $jenisbayar,
			'merchant_ref'   => $merchantRef,
			"type" => 'redirect',
			'amount'         => $amount,
			'customer_name'  => $namasiswa,
			'customer_email' => $email,
			'customer_phone' => $hp,
			'order_items'    => [
			[
            'sku'         => $idprod[0],
            'name'        => $nama[0],
            'price'       => $harga[0],
            'quantity'    => $qty[0],
			],
			[
            'sku'         => $idprod[1],
            'name'        => $nama[1],
            'price'       => $harga[1],
            'quantity'    => $qty[1],
			],
			[
            'sku'         => $idprod[2],
            'name'        => $nama[2],
            'price'       => $harga[2],
            'quantity'    => $qty[2],
			],
			
			],
			'return_url'   => 'http://masukkuliah.com/cbt/clbk',
			'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
			'signature'    => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
			]; 
			} else if ($jml==4){
			$data = [
			'method'         => $jenisbayar,
			'merchant_ref'   => $merchantRef,
			"type" => 'redirect',
			'amount'         => $amount,
			'customer_name'  => $namasiswa,
			'customer_email' => $email,
			'customer_phone' => $hp,
			'order_items'    => [
			[
            'sku'         => $idprod[0],
            'name'        => $nama[0],
            'price'       => $harga[0],
            'quantity'    => $qty[0],
			],
			[
            'sku'         => $idprod[1],
            'name'        => $nama[1],
            'price'       => $harga[1],
            'quantity'    => $qty[1],
			],
			[
            'sku'         => $idprod[2],
            'name'        => $nama[2],
            'price'       => $harga[2],
            'quantity'    => $qty[2],
			],
			[
            'sku'         => $idprod[3],
            'name'        => $nama[3],
            'price'       => $harga[3],
            'quantity'    => $qty[3],
			],
			
			],
			'return_url'   => 'http://masukkuliah.com/cbt/clbk',
			'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
			'signature'    => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
			]; 
			} else if ($jml==5){
			$data = [
			'method'         => $jenisbayar,
			'merchant_ref'   => $merchantRef,
			"type" => 'redirect',
			'amount'         => $amount,
			'customer_name'  => $namasiswa,
			'customer_email' => $email,
			'customer_phone' => $hp,
			'order_items'    => [
			[
            'sku'         => $idprod[0],
            'name'        => $nama[0],
            'price'       => $harga[0],
            'quantity'    => $qty[0],
			],
			[
            'sku'         => $idprod[1],
            'name'        => $nama[1],
            'price'       => $harga[1],
            'quantity'    => $qty[1],
			],
			[
            'sku'         => $idprod[2],
            'name'        => $nama[2],
            'price'       => $harga[2],
            'quantity'    => $qty[2],
			],
			[
            'sku'         => $idprod[3],
            'name'        => $nama[3],
            'price'       => $harga[3],
            'quantity'    => $qty[3],
			],
			[
            'sku'         => $idprod[4],
            'name'        => $nama[4],
            'price'       => $harga[4],
            'quantity'    => $qty[4],
			],
			
			],
			'return_url'   => 'http://masukkuliah.com/cbt/clbk',
			'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
			'signature'    => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
			]; 
			}
			
			
			$curl = curl_init();
			
			curl_setopt_array($curl, [
			CURLOPT_FRESH_CONNECT  => true,
			CURLOPT_URL            => 'https://tripay.co.id/api/transaction/create',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER         => false,
			CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
			CURLOPT_FAILONERROR    => false,
			CURLOPT_POST           => true,
			CURLOPT_POSTFIELDS     => http_build_query($data)
			]);
			
			$response = curl_exec($curl);
			$error = curl_error($curl);
			
			curl_close($curl);
			
			$result = json_decode($response,true);
			
			$order = array(
			'date' 			=> date('Y-m-d'),
			'morderid' 		=> $result['data']['merchant_ref'],
			'customerid' 	=> $cust_id
			);		
			
			$ord_id = $this->model14->insert_order($order);
			
			if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
			$order_detail = array(
			'orderid' 		=> $ord_id,
			'morderid' 		=> $result['data']['merchant_ref'],
			'productid' 	=> $item['id'],
			'quantity' 		=> $item['qty'],
			'price' 		=> $item['price'],
			'gross_amount' => $result['data']['amount'],
			'payment_type' => $result['data']['payment_method'],
			'transaction_time' => date('Y-m-d'),
			'pdf_url' => $result['data']['checkout_url'],
			'status_code' => $result['data']['status']
			);		
			
			$cust_id = $this->model14->insert_order_detail($order_detail);
			endforeach;
			endif;
			
			$this->cart->destroy();
			$userdata = array(
			'morderid'  => $result['data']['merchant_ref'],
			);
			$this->session->set_userdata($userdata);
			redirect($result['data']['checkout_url']);
		}
		
		public function clbk()
		{
			$data['order'] = $this->model14->select_by_id($this->session->userdata('morderid'))->row();	
			$this->load->view('view61',$data);	
		}
		
		public function Notification()
		{
			$privateKey = '0ijkb-bD9ey-Qc3hS-yCKuB-ti811';
			$json = file_get_contents('php://input');
			$signature = hash_hmac('sha256', $json, $privateKey);
			$result = json_decode($json,'true');
			$order_id = $result['merchant_ref'];
			$data = ['status_code'=>$result['status']];
			$this->db->update('order_detail', $data, array('morderid' => $order_id));	
		}
		
	}
