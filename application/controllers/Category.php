<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {


    public function __construct(){
        parent::__construct();
    }


    public function index($cat_name = "all", $subcats = ''){
		$sublen = strlen($subcats);
		// $data = [];
		$data['cat'] = $cat_name;
		$data['subcat'] = $subcats;
		$data['cats'] = null;
		$data['subcats'] = null;
		$data['cat_products'] = null;
		if($cat_name && $cat_name != 'all' && $sublen == 0){
			$cat = $this->db->get_where('category', ['name' => str_replace(['-', 'and'], [' ', '&'], $cat_name)])->row();
			if($cat){
				$data['subcats'] = $this->db->where('category_id', $cat->id)->get('sub_category')->result();
				$data['page_title'] = $cat->name." Category";
			}
		}else
		if($cat_name && $cat_name != 'All' && $sublen != 0){
			$scat = $this->db->get_where('sub_category', ['name' => str_replace(['and', '-'], ['&', ' '], ucfirst(str_replace('-', ' ', $subcats)))])->row();
			// var_dump($scat); die();
			if($scat){
				$data['cat_products'] = $this->db->where('category_id', $scat->id)->get('products')->result();
				$data['page_title'] = ucfirst(str_replace('-', ' ', $cat_name))." > ".$scat->name." Category";
			}
			
		}else{
			$data['cats'] = $this->db->get('category')->result();
			$data['page_title'] = "All Category";
		}

		// if($data['cats'] || $data['cat_products'] || $data['subcats']){
			$this->load->view('layouts/general/head.php', $data);
			$this->load->view('layouts/general/nav.php', $data);
			$this->load->view('product/category', $data);
			$this->load->view('layouts/general/foot.php', $data);
		// }else{
        //     redirect(site_url('market'));
        //     // var_dump($data);
		// }
    }
}