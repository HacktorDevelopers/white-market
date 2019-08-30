<?php
    defined('BASEPATH') OR exit('No direct script access allowed');


    class Admin extends CI_Controller {
        


        public function __construct(){
            parent::__construct();
        }

        public function isOnline(){
            if(!$this->session->userdata('user')) return false; else return true;;
        }


        public function home(){
            if(!$this->isOnline()){ $this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/admin/login'));}
            if(!$this->isAdmin()) redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));
            // var_dump($this->session->userdata('user'));
            $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'admin'])->result();
            $data['page_title'] = " | Admin | Home";
            $data['scripts'] = ['main.js'];
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('layouts/admin/top_nav', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('layouts/admin/foot', $data);
        }

        public function login(){
            if($this->input->post()){
                // echo json_encode($this->input->post());
                $email = $this->input->post('email', TRUE);
                $pass = $this->input->post('password', TRUE);
                $userinfo = $this->db->get_where('users', ['acct_type LIKE'=>'%admin%', 'email'=>$email, 'password'=>md5($pass)])->row();
                
                if($userinfo){
                    $this->session->set_userdata('user', $userinfo);
                    $this->session->userdata('user')->loggedinas = 'admin';
                    
                    $log['owner_id'] = $this->session->userdata('user')->user_id;
                    $log['action'] = "You logged in into the system at ".Carbon\Carbon::now();
                    $this->ActivityModel->createLog($log);
                    $url = ($this->session->tempdata('rfrom')) ? $this->session->tempdata('rfrom') : site_url('/admin/home');
                    if($this->session->tempdata('rfrom')){
                        $this->session->unset_tempdata('rfrom');
                    }
                    echo json_encode(['status'=>1, 'msg'=>'Login Successful', 'redirect'=>$url]);
                }else{
                    echo json_encode(['status'=>0, 'msg'=>'Login Credentials is Invalid. Please Check your email and password']);
                }
            }else{
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['page_title'] = " | Admin | Login";
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/login', $data);
                $this->load->view('layouts/admin/foot', $data);
                // session_destroy();
            }
            
        }


        public function product($param1 = "all", $param2 = ''){
            if(!$this->isOnline()){ $this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/admin/login'));}
            if(!$this->isAdmin()) redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));
            $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'admin'])->result();
            if($param1 == 'all'){
                $data['scripts'] = ['main.js'];
                $data['page_title'] = " | Admin | Products | All Products";
                $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/product/all', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else
            if($param1 == 'myproducts'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['page_title'] = " | Admin | Products | My Products";
                $data['products'] = $this->db->get_where('products', ['owner_id'=>$this->session->userdata('user')->user_id])->result_array();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/product/all', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'create'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['page_title'] = " | Admin | Products";
                $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/product/create', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'view'){
                $data['scripts'] = ['main.js'];
                $data['product'] = $this->ProductModel->getProductBy('code', $param2);
                $data['page_title'] = " | Admin | Products | ".$data['product']['name'];
                $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/product/this', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'edit'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['product'] = $this->ProductModel->getProductBy('code', $param2);
                $data['page_title'] = " | Admin | Products | ".$data['product']['name'];
                $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/product/edit', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'update'){
                // echo json_encode($this->input->post());
                $product = $this->input->post();
                $update = $this->db->where('product_id', $product['product_id'])->update('products', $product);
                if($update){
                    $log['owner_id'] = $this->session->userdata('user')->user_id;
                    $log['action'] = "You updated a product with name ".$product['name']." at ".Carbon\Carbon::now();
                    $this->ActivityModel->createLog($log);
                    echo json_encode(['status'=>1, 'msg'=>'Product Updated Successfully', 'redirect'=>site_url('/admin/product/view/'.$product['code'])]);
                }else{
                    echo json_encode(['status'=>0, 'msg'=>'An Error Occurred While Updating This Product']);
                }
            }else

            if($param1 == 'store'){
                //  File Directory
                $imagedir = FCPATH.'/public/images/products/';
                $newproduct = $this->input->post();


                $newproduct['owner_id'] = $this->session->userdata('user')->user_id;
                $newproduct['code'] = random_string('numeric', 7);
                $newproduct['product_id'] = 'pro'.random_string('numeric', 7);
                $newproduct['created_at'] = Carbon\Carbon::now();

                $product_image_dir = $imagedir.$newproduct['code'];
                // echo $product_image_dir;

                if(!file_exists($product_image_dir)){
                    mkdir($product_image_dir);
                }

                $i = 0;
                $len = count($_FILES['product_image']['tmp_name']);
                $uploaded = false;
                while($i < $len){
                    $imgn = $i+1;
                    $upload = move_uploaded_file($_FILES['product_image']['tmp_name'][$i], $product_image_dir.'/0'.$imgn.'.jpg');
                    if(!$upload){
                        echo json_encode(['msg'=>'An Error Occured']);
                        die();
                    }else{
                        $uploaded = true;
                        $i++;
                    }
                    
                }
                $savedtodb = $this->ProductModel->createNewProduct($newproduct);
                if($uploaded && $savedtodb){
                    $log['owner_id'] = $this->session->userdata('user')->user_id;
                    $log['action'] = "You created a new product with name ".$newproduct['name']." at ".Carbon\Carbon::now();
                    $this->ActivityModel->createLog($log);
                    echo json_encode(['status'=>1, 'msg'=>'Product Created Successfully', 'redirect'=>site_url('/admin/product/all')]);
                }else{
                    echo json_encode(['status'=>0, 'msg'=>'An Error Occurred While Creating The Product Please Try Again']);
                }
                // echo json_encode(count($_FILES['product_image']['tmp_name']));

            }else
            if($param1 == 'delete'){
                $product = $this->ProductModel->getProductBy('code', $param2);
                if($this->ProductModel->deleteProduct($param2)){
                    $log['owner_id'] = $this->session->userdata('user')->user_id;
                    $log['action'] = "You deleted a product with id ".$product['name']." at ".Carbon\Carbon::now();
                    $this->ActivityModel->createLog($log);
                    echo json_encode(['status'=>1, 'msg'=>'Product Deleted Successfully']);
                }else{
                    echo json_encode(['status'=>0, 'msg'=>'An Error Occurred']);
                }
            }
        }


        public function category($param1 = "all", $param2 = '', $param3 = ''){
            if(!$this->isOnline()){ $this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/admin/login'));}
            if(!$this->isAdmin()) redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));
            
            $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'admin'])->result();
            
            if($param1 == 'all'){
                $data['scripts'] = ['main.js'];
                $data['page_title'] = " | Admin | Products";
                $data['categories'] = $this->CategoryModel->getAllCategories();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/category/all', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'create'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['page_title'] = " | Admin | Category | New Category";
                $data['categories'] = $this->CategoryModel->getAllCategories();
                // $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/category/create', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'view'){
                $data['scripts'] = ['main.js'];
                $data['category'] = $this->CategoryModel->getCategory($param2);
                $data['page_title'] = " | Admin | Category | ".$data['category']['name'];
                if($data['category']){
                    $this->load->view('layouts/admin/head', $data);
                    $this->load->view('layouts/admin/top_nav', $data);
                    $this->load->view('admin/category/this', $data);
                    $this->load->view('layouts/admin/foot', $data);
                }else{
                    $this->category();
                }
                
            }else

            if($param1 == 'edit'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['category'] = $this->CategoryModel->getCategoryBy('id', $param2);
                $data['page_title'] = " | Admin | Category | ".$data['category']['name'];
                // $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/category/edit', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'subcategory' && $param2 == 'edit'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['subcategory'] = $this->SubCategoryModel->getSubCategoryBy('id', $param3);
                $data['page_title'] = " | Admin | SubCategory | ".$data['subcategory']['name'];
                // $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/category/subcategory/edit', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'subcategory' && $param2 == 'create'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['category'] = $this->CategoryModel->getCategoryBy('id', $param3);
                $data['page_title'] = " | Admin | Category | ".$data['category']['name'];
                // $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/category/subcategory/create', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'subcategory' && $param2 == 'view'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['subcategory'] = $this->SubCategoryModel->getSubCategoryBy('id', $param3);
                $data['page_title'] = " | Admin | SubCategory | ".$data['subcategory']['name'];
                // $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/category/subcategory/this', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'update'){
                $category = $this->input->post();
                foreach($category as $key => $cat){
                    if(strlen($cat) < 0){
                        echo json_encode(['status'=>0, 'msg'=>$key.' Field is required']);
                        exit();
                    }
                }
                
                $exist = $this->CategoryModel->getCategoryBy('id', $category['id']);
                if($exist){
                    unset($category['id']);
                    $update = $this->CategoryModel->updateCategory($exist['id'], $category);
                    $category_image = $_FILES;
                    if($category_image['category_image']['tmp_name']){
                        $image_path = FCPATH.'/public/images/system/categories/';
                        if(file_exists($image_path.$category['name'].'.jpg')){
                            unlink($image_path.strtolower(str_replace(' ', '-', $category['name'])).'.jpg');
                        }
                        $upload = move_uploaded_file($category_image['category_image']['tmp_name'], $image_path.strtolower(str_replace(' ', '-', $category['name'])).'.jpg');
                    }else{
                        $upload = true;
                    }
                    
                    if($upload && $update){
                        $log['owner_id'] = $this->session->userdata('user')->user_id;
                        $log['action'] = "You updated a category with name ".$exist['name']." at ".Carbon\Carbon::now();
                        $this->ActivityModel->createLog($log);
                        echo json_encode(['status' => 1, 'msg' => 'Category Updated Successfully', 'redirect'=>site_url('/admin/category/view/'.$exist['id'])]);
                    }else{
                        echo json_encode(['status'=>0, 'msg'=>'An Error Occurred!']);
                    }
                }else{
                    echo json_encode(['status'=>0, 'msg'=>'Category Do Not Exist']);
                }
            }else

            if($param1 == 'subcategory' && $param2 == 'update'){
                $category = $this->input->post();
                // var_dump($category);
                foreach($category as $key => $cat){
                    if(strlen($cat) < 0){
                        echo json_encode(['status'=>0, 'msg'=>$key.' Field is required']);
                        exit();
                    }
                }
                
                $exist = $this->SubCategoryModel->getSubCategoryBy('id', $category['id']);
                if($exist){
                    unset($category['id']);
                    $update = $this->SubCategoryModel->updateSubCategory($exist['id'], $category);
                    $category_image = $_FILES;
                    if($category_image['category_image']['tmp_name']){
                        $image_path = FCPATH.'/public/images/system/subcategories/';
                        if(file_exists($image_path.str_replace(' ', '-', $category['name']).'.jpg')){
                            unlink($image_path.strtolower(str_replace(' ', '-', $category['name'])).'.jpg');
                        }
                        $upload = move_uploaded_file($category_image['category_image']['tmp_name'], $image_path.strtolower(str_replace(' ', '-', $category['name'])).'.jpg');
                    }else{
                        $upload = true;
                    }
                    
                    if($upload && $update){
                        $log['owner_id'] = $this->session->userdata('user')->user_id;
                        $log['action'] = "You updated a subcategory with name ".$exist['name']." at ".Carbon\Carbon::now();
                        $this->ActivityModel->createLog($log);
                        echo json_encode(['status' => 1, 'msg' => 'Category Updated Successfully', 'redirect'=>site_url('/admin/category/view/'.$exist['category_id'])]);
                    }else{
                        echo json_encode(['status'=>0, 'msg'=>'An Error Occurred!']);
                    }
                }else{
                    echo json_encode(['status'=>0, 'msg'=>'Category Do Not Exist']);
                }
            }else

            if($param1 == 'store'){
                $category = $this->input->post();
                $category['created_at'] = Carbon\Carbon::now();
                foreach($category as $key => $cat){
                    if(strlen($cat) < 0){
                        echo json_encode(['status'=>0, 'msg'=>$key.' Field is required']);
                        exit();
                    }
                }
                
                $exist = $this->CategoryModel->getCategoryBy('name', $category['name']);
                if(!$exist){
                    $create = $this->CategoryModel->createNewCategory($category);
                    $category_image = $_FILES;
                    $image_path = FCPATH.'/public/images/system/categories/';
                    if(file_exists($image_path.$category['name'].'.jpg')){
                        unlink($image_path.strtolower(str_replace(' ', '-', $category['name'])).'.jpg');
                    }
                    $upload = move_uploaded_file($category_image['category_image']['tmp_name'], $image_path.strtolower(str_replace(' ', '-', $category['name'])).'.jpg');
                    if($upload && $create){
                        $log['owner_id'] = $this->session->userdata('user')->user_id;
                        $log['action'] = "You created a new category with name ".$category['name']." at ".Carbon\Carbon::now();
                        $this->ActivityModel->createLog($log);
                        echo json_encode(['status' => 1, 'msg' => 'Category Created Successfully', 'redirect'=>site_url('/admin/category')]);
                    }else{
                        echo json_encode(['status'=>0, 'msg'=>'An Error Occurred!']);
                    }
                }else{
                    echo json_encode(['status'=>1, 'msg'=>'Category Already Exist', 'redirect'=>site_url('/admin/category/view/'.$exist['id'])]);
                }
                
                // echo json_encode($this->input->post());
                // echo json_encode($_FILES);
            }else

            if($param1 == 'subcategory' && $param2 == 'store'){
                $category = $this->input->post();
                // $category['created_at'] = Carbon\Carbon::now();
                foreach($category as $key => $cat){
                    if(strlen($cat) < 0){
                        echo json_encode(['status'=>0, 'msg'=>$key.' Field is required']);
                        exit();
                    }
                }
                
                $exist = $this->SubCategoryModel->getSubCategoryBy('name', $category['name']);
                if(!$exist){
                    unset($category['category']);
                    $create = $this->SubCategoryModel->createNewSubCategory($category);
                    $category_image = $_FILES;
                    $image_path = FCPATH.'/public/images/system/subcategories/';
                    if(file_exists($image_path.str_replace(' ', '-', $category['name']).'.jpg')){
                        unlink($image_path.strtolower(str_replace(' ', '-', $category['name'])).'.jpg');
                    }
                    $upload = move_uploaded_file($category_image['category_image']['tmp_name'], $image_path.strtolower(str_replace(' ', '-', $category['name'])).'.jpg');
                    if($upload && $create){
                        $log['owner_id'] = $this->session->userdata('user')->user_id;
                        $log['action'] = "You created a new subcategory with name ".$category['name']." at ".Carbon\Carbon::now();
                        $this->ActivityModel->createLog($log);
                        echo json_encode(['status' => 1, 'msg' => 'SubCategory Created Successfully', 'redirect'=>site_url('/admin/category/view/'.$param3)]);
                    }else{
                        echo json_encode(['status'=>0, 'msg'=>'An Error Occurred!']);
                    }
                }else{
                    echo json_encode(['status'=>1, 'msg'=>'SubCategory Already Exist', 'redirect'=>site_url('/admin/category/view/'.$param3)]);
                }
                
                // echo json_encode($this->input->post());
                // echo json_encode($_FILES);
            }else

            if($param1 == 'delete'){
                 $exist = $this->CategoryModel->getCategoryBy('id', $param2);
                if($exist){
                    // unset($category['id']);
                    $delete = $this->CategoryModel->deleteCategory($exist['id']);
                    $category_image = $_FILES;
                    $image_path = FCPATH.'/public/images/system/categories/';
                    if(file_exists($image_path.str_replace(' ', '-', $exist['name']).'.jpg')){
                        unlink($image_path.strtolower(str_replace(' ', '-', $exist['name'])).'.jpg');
                    }
                    if($delete){
                        $log['owner_id'] = $this->session->userdata('user')->user_id;
                        $log['action'] = "You deleted a category with name ".$exist['name']." at ".Carbon\Carbon::now();
                        $this->ActivityModel->createLog($log);
                        echo json_encode(['status'=>1, 'msg'=>'Category Deleted Successfully']);
                    }else{
                        echo json_encode(['status'=>0, 'msg'=>'An Error Occurred']);
                    }
                }else{
                    echo json_encode(['status'=>0, 'msg'=>'Category Do Not Exist']);
                }
            }else

            if($param1 == 'subcategory' && $param2 = 'delete'){
                $exist = $this->SubCategoryModel->getSubCategoryBy('id', $param3);
               if($exist){
                   // unset($category['id']);
                   $delete = $this->SubCategoryModel->deleteSubCategory($exist['id']);
                   $category_image = $_FILES;
                   $image_path = FCPATH.'/public/images/system/categories/';
                   if(file_exists($image_path.str_replace(' ', '-', $exist['name']).'.jpg')){
                       unlink($image_path.strtolower(str_replace(' ', '-', $exist['name'])).'.jpg');
                   }
                   if($delete){
                        $log['owner_id'] = $this->session->userdata('user')->user_id;
                        $log['action'] = "You deleted a subcategory with name ".$exist['name']." at ".Carbon\Carbon::now();
                        $this->ActivityModel->createLog($log);
                        echo json_encode(['status'=>1, 'msg'=>'Sub Category Deleted Successfully']);
                    }else{
                        echo json_encode(['status'=>0, 'msg'=>'An Error Occurred']);
                    }
               }else{
                   echo json_encode(['status'=>0, 'msg'=>'Category Do Not Exist']);
               }
           }
        }


        public function seller($param1 = 'all', $param2 = ''){
            if(!$this->isOnline()){ $this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/admin/login'));}
            if(!$this->isAdmin()) redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));
            $data['scripts'] = ['main.js'];
            $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'admin'])->result();
            if($param1 == 'all'){
                $data['sellers'] = $this->db->join('users', 'users.user_id = sellers.seller_id')->get('sellers')->result();
                $data['page_title'] = " All Seller @ White Market";
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/seller/all', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else
            if($param1 == 'view'){

            }
        }


        public function user($param1 = 'all', $param2 = ''){
            if(!$this->isOnline()){ $this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/admin/login'));}
            if(!$this->isAdmin()) redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));

            $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'admin'])->result();
            $data['scripts'] = ['main.js', 'main.js'];
            if($param1 == 'all'){
                $data['userslist'] = $this->db->get('users')->result();
                $data['page_title'] = " All Seller @ White Market";
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/users/all', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else
            if($param1 == 'view'){

            }else
            if($param1 == 'delete'){
                $userdeleted = false;
                $user = $this->UserModel->getUserBy('user_id', $param2);
                if($user['acct_type'] == 'seller'){
                    if($this->db->where('owner_id', $param2)->delete('products') && $this->db->where('seller_id', $param2)->delete('sellers')){
                        $this->db->where('user_id', $param2)->delete('users');
                        $userdeleted = true;
                    }
                }else{
                    if($this->db->where('user_id', $param2)->delete('users')){
                        $userdeleted = true;
                    }
                }
                if($userdeleted){
                    echo json_encode(['status'=>1, 'msg'=>'Account Deleted Successfully', 'redirect'=>'reload']);
                }else{
                    echo json_encode(['status'=>0, 'msg'=>'An error occurred! Please try again later']);
                }
            }
        }



        public function settings($param1 = '', $param2 = null, $param3 = ''){
            if(!$this->isOnline()){ $this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/admin/login'));}
            if(!$this->isAdmin()) redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));
            $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'admin'])->result();
            if($param1 == 'menus' && !isset($param2)){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['menues'] = $this->db->get('menus')->result();
                $data['page_title'] = " | Admin | Menu | All Menu";
                // $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/settings/menus/all', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'menus' && $param2 == 'view'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['men'] = $this->db->where('id', $param3)->get('menus')->row();
                $data['page_title'] = " | Admin | Menu | ".$data['men']->name;

                // echo var_dump($data['menu']);
                // $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/settings/menus/this', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'menus' && $param2 == 'edit'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['men'] = $this->db->where('id', $param3)->get('menus')->row();
                $data['page_title'] = " | Admin | Menu | ".$data['men']->name;

                // echo var_dump($data['menu']);
                // $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/settings/menus/editmenu', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'submenu' && $param2 == 'edit'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['submen'] = $this->db->where('id', $param3)->get('submenu')->row();
                $data['page_title'] = " | Admin | Menu | Sub Menu | ".$data['submen']->name;
                $data['menues'] = $this->db->get('menus')->result();
                // echo var_dump($data['menu']);
                // $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/settings/menus/editsubmenu', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else

            if($param1 == 'menus' && $param2 == 'store'){
                $this->form_validation->set_rules('name', 'Menu Name', 'trim|required');
                $this->form_validation->set_rules('fafa', 'Menu Icon', 'trim|required');
                $this->form_validation->set_rules('url', 'Menu URL', 'trim|required');
                $this->form_validation->set_rules('acct_type', 'Allowed User', 'trim|required');
                if($this->form_validation->run() == FALSE){
                    echo json_encode(['status'=>0, 'msg'=>validation_errors()]);
                }else{
                    $menu = $this->input->post();
                    $acct_types = explode(',', $menu['acct_type']);
                    // var_dump($acct_types); die("I am done here");
                    $stored = false;
                    $stored_menu = 0;
                    foreach($acct_types as $index => $acct){
                        // echo $acct.'<br/>';
                        $menu['acct_type'] = $acct;
                        $menu['url'] = $acct.'/'.strtolower($menu['name']);
                        $view = VIEWPATH.$acct;
                        // echo $view.'<br/>';
                        if(!file_exists($view)){
                            mkdir($view);
                        }
                        // echo $view.'/'.strtolower($menu['name']).'<br/>';
                        if(!file_exists($view.'/'.strtolower($menu['name']))){
                            mkdir($view.'/'.strtolower($menu['name']));
                        }
                        
                        $menu['created_at'] = Carbon\Carbon::now();
                        // die();
                        if($this->db->insert('menus', $menu)){
                            // mkdir();
                            $stored = true;
                            $stored_menu += 1;
                        }
                    }
                    
                    if($stored && $stored_menu == count($acct_types)){
                        // die('We are done here');
                        $log['owner_id'] = $this->session->userdata('user')->user_id;
                        $log['action'] = "You created a new Menu at ".Carbon\Carbon::now();
                        $this->ActivityModel->createLog($log);
                        echo json_encode(['status'=>1, 'msg'=>'Menu Created Succesfully', 'redirect'=>site_url('/admin/settings/menus')]);
                    }else{
                        echo json_encode(['status'=>0, 'msg'=>'An Error Occurred']);
                    }
                }
                
            }else

            if($param1 == 'menus' && $param2 == 'update'){
                $this->form_validation->set_rules('name', 'Menu Name', 'trim|required');
                $this->form_validation->set_rules('id', 'Menu Name', 'trim|required');
                $this->form_validation->set_rules('fafa', 'Menu Icon', 'trim|required');
                $this->form_validation->set_rules('url', 'Menu URL', 'trim|required');
                $this->form_validation->set_rules('acct_type', 'Allowed User', 'trim|required');
                if($this->form_validation->run() == FALSE){
                    echo json_encode(['status'=>0, 'msg'=>validation_errors()]);
                }else{
                    $menu = $this->input->post();
                    $menu['created_at'] = Carbon\Carbon::now();
                    if($this->db->where('id', $menu['id'])->update('menus', $menu)){
                        $log['owner_id'] = $this->session->userdata('user')->user_id;
                        $log['action'] = "You updated a Menu with name ".$menu['name']." at ".Carbon\Carbon::now();
                        $this->ActivityModel->createLog($log);
                        echo json_encode(['status'=>1, 'msg'=>'Menu Updated Succesfully', 'redirect'=>site_url('/admin/settings/menus/view/'.$menu['id'])]);
                    }else{
                        echo json_encode(['status'=>0, 'msg'=>'Unable to create Menu']);
                    }
                }
                
            }


            if($param1 == 'submenu' && $param2 == 'store'){
                if(!$this->isOnline()){ $this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/admin/login'));}
                if(!$this->isAdmin()) redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));

                $this->form_validation->set_rules('name', 'Menu Name', 'trim|required');
                $this->form_validation->set_rules('menu_id', 'Menu Icon', 'trim|required');
                $this->form_validation->set_rules('url', 'Menu URL', 'trim|required');
                // $this->form_validation->set_rules('acct_type', 'Allowed User', 'trim|required');
                if($this->form_validation->run() == FALSE){
                    echo json_encode(['status'=>0, 'msg'=>validation_errors()]);
                }else{
                    $menu = $this->input->post();

                    $mainmenu = $this->db->get_where('menus', ['id'=>$menu['menu_id']])->row();

                    $main = str_replace(['/all', 'index'], '', $mainmenu->url);
                    $urlstring = explode('/', $mainmenu->url);

                    $view_folder = ($urlstring[1]);
                    $controller_folder = ($urlstring[0]);

                    $view = VIEWPATH.$controller_folder.'/'.$view_folder.'/';

                    if(!is_dir($view)){
                        mkdir($view);
                    }
                    $submenu = explode(',', $menu['name']);
                    $subnames = explode(',', $menu['name']);
                    $menu['created_at'] = Carbon\Carbon::now();
                    $stored_item = 0;
                    $stored = false;

                    foreach($submenu as $index => $subs){
                        $n = str_replace([' ','.','-'], ['_','','_'], trim(strtolower($subnames[$index])));
                       $menu['url'] = $main.'/'.$n;
                       $menu['name'] = ucfirst(trim($subnames[$index]));
                       if($this->db->insert('submenu', $menu)){
                           if(!file_exists($view.$n.'.php')){
                               fopen($view.$n.'.php', 'a');
                           }
                        //    echo json_encode($view.$n.'.php');
                           $stored_item += 1;
                       }
                       if($stored_item == count($submenu)){
                           $stored = true;
                       }
                    }

                    // // var_dump($submenu);
                    // //  die('We are done here');
                    
                    if($stored){
                        $log['owner_id'] = $this->session->userdata('user')->user_id;
                        $log['action'] = "You created a new Sub Menu at ".Carbon\Carbon::now();
                        $this->ActivityModel->createLog($log);
                        echo json_encode(['status'=>1, 'msg'=>'Sub Menu Created Succesfully', 'redirect'=>site_url('/admin/settings/menus')]);
                    }else{
                        echo json_encode(['status'=>0, 'msg'=>'Unable to create sub menu']);
                    }
                }
                
            }else
            if($param1 == 'submenu' && $param2 == 'update'){
                if(!$this->isOnline()){ $this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/admin/login'));}
                if(!$this->isAdmin()) redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));
                $this->form_validation->set_rules('name', 'Menu Name', 'trim|required');
                $this->form_validation->set_rules('id', 'Sub Menu Id', 'trim|required');
                $this->form_validation->set_rules('menu_id', 'Parent Menu', 'trim|required');
                $this->form_validation->set_rules('url', 'Menu URL', 'trim|required');
                // $this->form_validation->set_rules('acct_type', 'Allowed User', 'trim|required');
                if($this->form_validation->run() == FALSE){
                    echo json_encode(['status'=>0, 'msg'=>validation_errors()]);
                }else{
                    $menu = $this->input->post();
                    $menu['created_at'] = Carbon\Carbon::now();
                    if($this->db->where('id', $menu['id'])->update('submenu', $menu)){
                        $log['owner_id'] = $this->session->userdata('user')->user_id;
                        $log['action'] = "You updated a Sub Menu name:".$menu['name']." at ".Carbon\Carbon::now();
                        $this->ActivityModel->createLog($log);
                        echo json_encode(['status'=>1, 'msg'=>'Sub Menu Updated Succesfully', 'redirect'=>site_url('/admin/settings/menus')]);
                    }else{
                        echo json_encode(['status'=>0, 'msg'=>'Unable to Update sub menu']);
                    }
                }
                
            }else
            if($param1 == 'menus' && $param2 == 'delete'){
                $menu = $this->db->get_where('menus', ['id', $param3])->row_array();
                if($this->db->where('id', $param3)->delete('menus')  && $this->db->where('menu_id', $param3)->delete('submenu') ){
                    $log['owner_id'] = $this->session->userdata('user')->user_id;
                    $log['action'] = "You updated a Menu name:".$menu['name']." at ".Carbon\Carbon::now();
                    $this->ActivityModel->createLog($log);
                    // redirect(site_url('/admin/settings/menus'));
                    echo json_encode(['status'=>1, 'msg'=>'Menu Deleted Successfully']);
                }else{
                    echo json_encode(['status'=>0, 'msg'=>'An Error Occurred! Please try again']);
                }
            }else
            if($param1 == 'submenu' && $param2 == 'delete'){
                $menu = $this->db->get_where('submenu', ['id'=>$param3])->row_array();
                if($this->db->where('id', $param3)->delete('submenu')){
                    $log['owner_id'] = $this->session->userdata('user')->user_id;
                    $log['action'] = "You updated a Sub Menu name:".$menu['name']." at ".Carbon\Carbon::now();
                    $this->ActivityModel->createLog($log);
                    // redirect(site_url('/admin/settings/menus'));
                    echo json_encode(['status'=>1, 'msg'=>'Sub Menu Deleted Successfully']);
                }else{
                    echo json_encode(['status'=>0, 'msg'=>'An Error Occurred']);
                }
            }
        }


        public function log($param1 = 'all', $param2 = null){
            $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'admin'])->result();
            if($param1 == 'all'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['logs'] = $this->ActivityModel->getAllLogs();
                $data['page_title'] = " | Admin | Activity Log | All Logs";
                $data['pt'] = "All Activity Logs";
                // $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/activity/all', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else
            if($param1 == 'mylogs'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['logs'] = $this->ActivityModel->getLogsBy('owner_id', $this->session->userdata('user')->user_id);
                $data['page_title'] = " | Admin | Activity Log | My Logs";
                $data['pt'] = "My Logs";
                // $data['products'] = $this->ProductModel->getAllProducts();
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/activity/all', $data);
                $this->load->view('layouts/admin/foot', $data);
            }else
            if($param1 == 'view'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['logs'] = $this->ActivityModel->getLogsBy('owner_id', $param2);
                $data['page_title'] = " | Admin | Activity Log | All Logs";
                $data['pt'] = $this->UserModel->getUserBy('user_id', $param2)['full_name']."'s Activity";
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/activity/all', $data);
                $this->load->view('layouts/admin/foot', $data);
            }
            
        }

        public function profile($param1 = 'view_profile', $param2 = 'users'){
            $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'admin'])->result();
            if(!$this->isOnline()){ $this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/admin/login'));}
            if(!$this->isAdmin()) redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));

            $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'admin'])->result();

            if($param1 == 'view_profile'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['page_title'] = " | Admin | Profile | My Profile";
                $data['profile'] = $this->session->userdata('user');
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/profile/view_profile', $data);
                $this->load->view('layouts/admin/foot', $data);
            }

            if($param1 == 'edit_profile'){
                $data['scripts'] = ['main.js', 'forms.js'];
                $data['page_title'] = " | Admin | Profile | My Profile";
                $data['profile'] = $this->session->userdata('user');
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/profile/edit_profile', $data);
                $this->load->view('layouts/admin/foot', $data);
            }

            if($param1 == 'update'){
                $dddd = $this->input->post();
            
                $tocheck = ($param2 == 'users' || $param2 == 'contacts') ? 'user_id' : 'seller_id';
                if(!$this->db->get_where($param2, [$tocheck=>$this->session->userdata('user')->user_id])->row()){
                    $this->db->insert($param2, [$tocheck=>$this->session->userdata('user')->user_id]);
                }
                // echo json_encode($tocheck); die();
                $update = $this->db->where($tocheck, $this->session->userdata('user')->user_id)->update($param2, $dddd);
                if($update){
                    $loggedinas = $this->session->userdata('user')->loggedinas;
                    $this->session->set_userdata('user', $this->db->get_where('users', ['user_id'=>$this->session->userdata('user')->user_id])->row());
                    $this->session->userdata('user')->loggedinas = $loggedinas;
                    echo json_encode(['status'=>1, 'msg'=>'Account Updated Successfully', 'redirect'=>'reload']);
                }else{
                    echo json_encode(['status'=>0, 'msg'=>'An error occurred! Please try again later']);
                }
            }
            
        }


        /**
         * Order management
         * @param1 second route param
         */

         public function order($param1 = 'all_orders', $param2 = null, $param3 = null){
            
            if(!$this->isOnline()){ $this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/admin/login'));}
            if(!$this->isAdmin()) redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));

            $data['scripts'] = ['main.js', 'form.js'];
            $data['menus'] = $this->db->where('acct_type', 'admin')->get('menus')->result();

            if($param1 == 'all_orders'){
                $data['page_title'] = " | Admin | Order | All Orders";
                $data['orders'] = $this->OrderModel->get()->collections;
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/orders/all_orders', $data);
                $this->load->view('layouts/admin/foot', $data);
            }

            if($param1 == 'sort'){
                // echo $param2. "->".$param3;
                $order = $this->OrderModel->findOrFail($param2)->collection;
                // echo var_dump($order);
                $cartcontent = unserialize($order->order_detail);
                // echo var_dump($cartcontent);
                $cartcontentitem = $cartcontent[$param3];
                // echo var_dump($cartcontentitem);

                $sellerorder = new SellerOrderModel();
                $sellerorder->seller_id = $cartcontent[$param3]['options']['seller_id'];
                $sellerorder->buyer_id = $order->buyer_id;
                $sellerorder->order_id = $order->order_id;
                $sellerorder->status = 'pending';
                $sellerorder->msg = 'This order will be attended to shortly';
                $sellerorder->ordered_product_name = $cartcontent[$param3]['name'].' '.$cartcontent[$param3]['options']['product_id'];
                $sellerorder->ordered_product_price = $cartcontent[$param3]['price'];
                $sellerorder->ordered_product_qty = $cartcontent[$param3]['qty'];
                $sellerorder->other_options = $cartcontent[$param3]['options']['other_options'];
                $so = (array) $sellerorder;
                if($this->SellerOrderModel->initialize($so)->save()){
                    // // Update The Order Content
                    $cartcontent[$param3]['options']['sorted'] = true;

                    $order->order_detail = serialize($cartcontent);
                    $order->status = 'processing';
                    $order->msg = 'we are processing your order';
                    // var_dump($order);
                    $norder = (array) $order;
                    // var_dump($norder);
                    $this->OrderModel->update($norder['order_id'], $norder);
                    echo json_encode(['status'=>1, 'msg'=>'Order sorted successfully', 'redirect'=>'reload']);
                }else{
                    // echo "Oops an error occurred!";
                    echo json_encode(['status'=>0, 'msg'=>'An error occured, please try again later']);
                }
            }

            if($param1 == 'view_order'){
                $data['order'] = $this->OrderModel->findOrFail($param2)->collection;
                $data['sorted_orders'] = $this->SellerOrderModel->findManyBy('order_id', $data['order']->order_id)->collections;
                $data['page_title'] = " | Admin | Order | All Orders";
                // $data['orders'] = $this->OrderModel->get()->collections;
                $this->load->view('layouts/admin/head', $data);
                $this->load->view('layouts/admin/top_nav', $data);
                $this->load->view('admin/orders/view_order', $data);
                $this->load->view('layouts/admin/foot', $data);
            }
         }


        public function logout(){
            $log['owner_id'] = $this->session->userdata('user')->user_id;
            $log['action'] = "You logged out of the system at ".Carbon\Carbon::now();
            $this->ActivityModel->createLog($log);
            $this->session->unset_userdata('user');
            redirect(site_url('/admin/home'));
        }

        public function isAdmin(){
            // if($this->session->)
            $acct_types = explode(',', $this->session->userdata('user')->acct_type);
            if(in_array('admin', $acct_types)){
                return true;
            }else{
                return false;
            }
        }

    }
?>