<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubCategoryModel extends CI_Model {

	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function createNewSubCategory($data){
        return $this->db->insert('sub_category', $data);
    }

    public function updateSubCategory($id, $data){
        return $this->db->where('id', $id)->update('sub_category', $data);
    }

    public function deleteSubCategory($id){
        $subcat = $this->getSubCategory($id);
        // $subcatproducts = $this->getProducts($subcat['id']);
        
        $subcatimage = APPPATH.'../public/images/system/subcategories/'.$subcat['name'].'.jpg';
        if(file_exists($subcatimage)) unlink($subcatimage);
        return $this->db->where('id', $id)->delete('sub_category');
    }

    public function getSubAllCategories(){
        return $this->db->get('sub_category')->result();
    }

    public function getSubCategory($id){
        return $this->db->where('id', $id)->get('sub_category')->row_array();
    }

    public function getSubCategoryBy($by, $key){
        return $this->db->where($by, $key)->get('sub_category')->row_array();
    }

    public function getCategory($id){
        return $this->db->where('id', $id)->get('category')->row_array();
    }

    public function getProducts($id){
        return $this->db->where('category_id', $id)->get('products')->row_array();
    }


}
