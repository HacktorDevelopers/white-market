<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Api extends CI_Controller {

        public function __construct(){
            parent::__construct();
        }

        public function getSubCategories($id, $catid = null){
            $categories = $this->CategoryModel->getSubCategories($id);
            $res = "<option seleted value='NULL'> Select Sub Category</option>";
            foreach($categories as $category){
                if($category['id'] == $catid) $selected = 'selected'; else $selected = '';
                $newOPtion = "<option ".$selected." value='".$category['id']."'>".$category['name']."</option>";
                $res .= $newOPtion;
            }
            echo $res;
            // echo json_encode($categories);
        }

        public function getCategoryImageUrl($id){
            $category = $this->CategoryModel->getCategory($id);
            echo "<small class='text-info'>Category Image Preview</small><br/><img style='height: 100px; width: 100px;' src=".site_url('/public/images/system/categories/'.strtolower(str_replace(' ', '-', $category['name'])).'.jpg')." >";
        }

        public function getSubCategoryImageUrl($id){
            $category = $this->SubCategoryModel->getSubCategory($id);
            echo "<small class='text-info'>Category Image Preview</small><br/><img style='height: 100px; width: 100px;' src=".site_url('/public/images/system/subcategories/'.strtolower(str_replace(' ', '-', $category['name'])).'.jpg')." >";
        }

    }
?>