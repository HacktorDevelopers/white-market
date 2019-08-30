<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	//	Home Page For The Store
	public function index()
	{
		// $data['page_title'] = "Home";
		$data['categories'] = $this->db->get('category')->result();
		$data['products'] = $this->db->get('products')->result();
		// $this->load->view('layouts/general/head.php', $data);
		// $this->load->view('layouts/general/nav.php', $data);
		$this->load->view("index", $data);
		// $this->load->view('layouts/general/foot.php', $data);
	}

	public function market(){
		$data['page_title'] = "Market";
		$data['subcategories'] = $this->db->get('sub_category')->result();
		$this->load->view('layouts/general/head.php', $data);
		$this->load->view('layouts/general/nav.php', $data);
		$this->load->view("home", $data);
		$this->load->view('layouts/general/foot.php', $data);
	}


	// // About Page
	public function about(){
		$data['page_title'] = "About";
		$this->load->view('layouts/general/head.php', $data);
		$this->load->view('layouts/general/nav.php', $data);
		$this->load->view('about', $data);
		$this->load->view('layouts/general/foot.php', $data);
	}

	public function t_and_c(){
		$data['page_title'] = "Terms and Condition";
		$this->load->view('layouts/general/head.php', $data);
		$this->load->view('layouts/general/nav.php', $data);
		$this->load->view('t_and_c', $data);
		$this->load->view('layouts/general/foot.php', $data);
	}

	public function faq(){
		$data['page_title'] = "Frequently Asked Questions";
		$this->load->view('layouts/general/head.php', $data);
		$this->load->view('layouts/general/nav.php', $data);
		$this->load->view('faq', $data);	
		$this->load->view('layouts/general/foot.php', $data);
	}

	public function delivery_remark(){
		$data['page_title'] = "Delivery Remark";
		$this->load->view('layouts/general/head.php', $data);
		$this->load->view('layouts/general/nav.php', $data);
		$this->load->view('delivery_remark', $data);
		$this->load->view('layouts/general/foot.php');
	}

	public function privacy(){
		$data['page_title'] = "About";
		$this->load->view('layouts/general/head.php', $data);
		$this->load->view('layouts/general/nav.php', $data);
		$this->load->view('privacy', $data);
		$this->load->view('layouts/general/foot.php', $data);
	}

	public function ask(){
		$data['page_title'] = "Ask Your Questions Here";
		$this->load->view('layouts/general/head.php', $data);
		$this->load->view('layouts/general/nav.php', $data);
		$this->load->view('ask', $data);
		$this->load->view('layouts/general/foot.php');
	}
	


}
