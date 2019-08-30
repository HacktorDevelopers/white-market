<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model {

	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function createNewCategory($data){
        return $this->db->insert('category', $data);
    }

    public function updateCategory($id, $data){
        return $this->db->where('id', $id)->update('category', $data);
    }

    public function deleteCategory($id){
        // $cat = $this->getCategoryBy('id', $id);
        $subcats = $this->getSubCategories($id);
        $del_sub_done = false;
        if(count($subcats) > 0){
            foreach($subcats as $subcat){
                $delsub = $this->SubCategoryModel->deleteSubCategory($subcat['id']);
                if($delsub){
                    $del_sub_done = true;
                    continue;
                }else{
                    $del_sub_done = false;
                    exit();
                }
            }
        }else{
            $del_sub_done = true;
        }
        
        if($del_sub_done){
            return $this->db->where('id', $id)->delete('category');
        }else{
            return false;
        }
        
    }

    public function getAllCategories(){
        return $this->db->where('parent_id', '0')->or_where('parent_id', NULL)->get('category')->result();
    }

    public function getCategory($id){
        return $this->db->where('id', $id)->get('category')->row_array();
    }

    public function getCategoryBy($by, $key){
        return $this->db->where($by, $key)->get('category')->row_array();
    }

    public function getSubCategories($id){
        return $this->db->where('parent_id', $id)->get('category')->result_array();
    }


}
