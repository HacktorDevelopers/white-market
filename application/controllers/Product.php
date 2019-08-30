<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	//	Home Page For The Store
	public function index(){
		$data['page_title'] = " All Products";
		$data['subcategories'] = $this->db->get('sub_category')->result();
		$this->load->view('layouts/general/head.php', $data);
		$this->load->view('layouts/general/nav.php', $data);
		$this->load->view("product/all", $data);
		$this->load->view('layouts/general/foot.php', $data);
	}

	public function search($key = ""){
		$data['page_title'] = "Search result for ".$key;
		$real_key = str_replace('-_%20', ' ', $key);
		$data['result_products'] = $this->db->query("SELECT * FROM products WHERE name LIKE '%$real_key%'")->result_array();
		$data['result_sellers'] = $this->db->like('full_name', $key, 'both')->join('sellers', 'sellers.seller_id=users.user_id', 'left')->get('users')->row_array();
		$data['key'] = $key;
		$this->load->view('layouts/general/head.php', $data);
		$this->load->view('layouts/general/nav.php', $data);
		$this->load->view("product/search", $data);
		$this->load->view('layouts/general/foot.php', $data);
	}

	public function this_product($name){
		
		$data['product'] = $this->db->where('name', ucfirst(str_replace('-', ' ', $name)))->get('products')->row_array();
		$uv = $this->ProductModel->updateProductViews($data['product']['code']);
		// var_dump($data['product'])
		$data['page_title'] = "White Market | Product | ".$data['product']['name'];
		$data['otherproducts'] = $this->db->where(['category_id' => $data['product']['category_id'], 'code !='=>$data['product']['code']])->get('products')->result_array();

		// // $data['product'] = $products[$id];
		if(!$data['product']){
			redirect(site_url());
		}
		$this->load->view('layouts/general/head.php', $data);
		$this->load->view('layouts/general/nav.php', $data);
		$this->load->view('product/this', $data);
		$this->load->view('layouts/general/foot.php', $data);
	}



	public function seller($param1 = 'all'){
		
		if($param1 === 'all'){
			$data['sellers'] = $this->db->join('users', 'users.user_id = sellers.seller_id')->get('sellers')->result();
			$data['page_title'] = " Sellers | All Sellers @ White Market";
			$this->load->view('layouts/general/head.php', $data);
			$this->load->view('layouts/general/nav.php', $data);
			$this->load->view('product/sellers', $data);
			$this->load->view('layouts/general/foot.php', $data);
		}
		if($param1 !== 'all'){

			$data['bseller'] = $this->db->where('company_name', ucfirst(str_replace('-', ' ', $param1)))->get('sellers')->row();
			$data['bseller_detail'] = $this->db->where('user_id', $data['bseller']->seller_id)->get('users')->row();
			$data['bseller_rating'] = $this->db->query("SELECT * FROM seller_rating WHERE seller_id = '".$data["bseller"]->seller_id."'")->result_array();
			$data['bavg_rating'] = $this->db->where('seller_id', $data["bseller"]->seller_id)->select('AVG(rate) as avg_rating')->from('seller_rating')->get()->row()->avg_rating;
			
			$data['bcontacts'] = $this->db->where('user_id', $data["bseller"]->seller_id)->get('contacts')->row();
			$data['bproducts'] = $this->db->where('owner_id', $data["bseller"]->seller_id)->get('products')->result_array(); 
			$data['bpage_title'] = " Sellers | ".$data['bseller']->company_name;
			
			
			$this->load->view('layouts/general/head.php', $data);
			$this->load->view('layouts/general/nav.php', $data);
			$this->load->view('product/thisseller', $data);
			$this->load->view('layouts/general/foot.php', $data);
		}
	}

	

	// // About Page
	// public function about(){
	// 	$this->load->view('layouts/general/head.php');
	// 	$this->load->view('about');
	// 	$this->load->view('layouts/general/foot.php');
	// }


}
