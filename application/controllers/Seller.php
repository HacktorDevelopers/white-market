<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function isOnline(){
        if(!$this->session->userdata('user')) return false; else return true;;
    }

	public function home(){
        if(!$this->isOnline()){$this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/seller/login'));};
        if($this->session->userdata('user')->loggedinas !== 'seller') redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));
        $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'seller'])->result();
        $data['latest_products'] = $this->db->order_by('created_at', 'DESC')->get_where('products', ['owner_id'=>$this->session->userdata('user')->user_id])->result();
        $data['scripts'] = ['main.js', 'forms.js'];
        $data['page_title'] = ' Seller | Home | '.$this->session->userdata('user')->full_name;
        $this->load->view('layouts/admin/head', $data);
        $this->load->view('layouts/admin/top_nav', $data);
        $this->load->view('seller/index', $data);
        $this->load->view('layouts/admin/foot', $data);
    }

    public function product($param1 = 'all', $param2 = null, $param3 = null){

        if(!$this->isOnline()){$this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/seller/login'));};
        if($this->session->userdata('user')->loggedinas !== 'seller') redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));
        $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'seller'])->result();
        if($param1 == 'all'){
            $data['scripts'] = ['main.js', 'forms.js'];
            $data['page_title'] = ' Seller | Products | My Products';
            $data['seller_product'] = $this->ProductModel->getProductsBy('owner_id', $this->session->userdata('user')->user_id);
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('layouts/admin/top_nav', $data);
            $this->load->view('seller/product/all', $data);
            $this->load->view('layouts/admin/foot', $data);
        }else
        if($param1 == 'create'){
            $data['scripts'] = ['main.js', 'forms.js'];
            $data['page_title'] = ' Seller | Products | My Products';
            $data['seller_product'] = $this->ProductModel->getProductsBy('owner_id', $this->session->userdata('user')->user_id);
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('layouts/admin/top_nav', $data);
            $this->load->view('seller/product/create', $data);
            $this->load->view('layouts/admin/foot', $data);
        }else

        if($param1 == 'view'){
            $data['scripts'] = ['main.js'];
            $data['product'] = $this->ProductModel->getProductBy('code', $param2);
            $data['page_title'] = " | Admin | Products | ".$data['product']['name'];
            $data['products'] = $this->ProductModel->getAllProducts();
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('layouts/admin/top_nav', $data);
            $this->load->view('seller/product/this', $data);
            $this->load->view('layouts/admin/foot', $data);
        }else

        if($param1 == 'edit'){
            $data['scripts'] = ['main.js', 'forms.js'];
            $data['product'] = $this->ProductModel->getProductBy('code', $param2);
            $data['page_title'] = " | Admin | Products | ".$data['product']['name'];
            $data['products'] = $this->ProductModel->getAllProducts();
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('layouts/admin/top_nav', $data);
            $this->load->view('seller/product/edit', $data);
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
            // echo "<pre>";
            // var_dump($this->input->post());
            // echo "</pre>";
            // die();
            $imagedir = FCPATH.'/public/images/products/';
            $newproduct = $this->input->post();


            $newproduct['owner_id'] = $this->session->userdata('user')->user_id;
            $newproduct['code'] = random_string('numeric', 7);
            $newproduct['status'] = 'pending';
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
                echo json_encode(['status'=>1, 'msg'=>'Product Created Successfully', 'redirect'=>site_url('/seller/product/all')]);
            }else{
                echo json_encode(['status'=>0, 'msg'=>'An Error Occurred While Creating The Product Please Try Again']);
            }

        }else
        if($param1 == 'delete'){
            $product = $this->ProductModel->getProductBy('code', $param2);
            if($this->ProductModel->deleteProduct($param2)){
                $log['owner_id'] = $this->session->userdata('user')->user_id;
                $log['action'] = "You deleted a product with id ".$product['name']." at ".Carbon\Carbon::now();
                $this->ActivityModel->createLog($log);
                // redirect(site_url('/admin/product'));
                echo json_encode(['status'=>1, 'msg'=>'Product Deleted Successfully', 'redirect'=>site_url('/seller/product/all')]);
            }else{
                echo json_encode(['status'=>0, 'msg'=>'An Error Occurred While Deleting The Product Please Try Again']);
            }
        }else{
            $this->product('all');
        }
    }

    public function log($param1 = 'all', $param2 = null){
        if(!$this->isOnline()){$this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/seller/login'));};
        if($this->session->userdata('user')->loggedinas !== 'seller') redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));

        $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'seller'])->result();
        if($param1 == 'all'){
            $data['scripts'] = ['main.js', 'forms.js'];
            $data['logs'] = $this->ActivityModel->getLogsBy('owner_id', $this->session->userdata('user')->user_id);
            $data['page_title'] = " | Seller | Activity Log | All Logs";
            $data['pt'] = "My Activity Logs";
            // $data['products'] = $this->ProductModel->getAllProducts();
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('layouts/admin/top_nav', $data);
            $this->load->view('seller/activity/all', $data);
            $this->load->view('layouts/admin/foot', $data);
        }
        
    }

    public function profile($param1 = 'view_profile', $param2 = 'users'){
        if(!$this->isOnline()){redirect(site_url('/admin/login')); }
        if($this->session->userdata('user')->loggedinas !== 'seller') redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));
        $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'seller'])->result();
        if($param1 == 'view_profile'){
            $data['scripts'] = ['main.js', 'forms.js'];
            $data['page_title'] = " | Admin | Profile | My Profile";
            $data['profile'] = $this->session->userdata('user');
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('layouts/admin/top_nav', $data);
            $this->load->view('seller/profile/view_profile', $data);
            $this->load->view('layouts/admin/foot', $data);
        }
        
        if($param1 == 'edit_profile'){
            $data['scripts'] = ['main.js', 'forms.js'];
            $data['page_title'] = " | Admin | Profile | My Profile";
            $data['profile'] = $this->session->userdata('user');
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('layouts/admin/top_nav', $data);
            $this->load->view('seller/profile/edit_profile', $data);
            $this->load->view('layouts/admin/foot', $data);
            // exit();
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


    public function orders($param1 = 'my_orders', $param2 = null, $param3 = null, $param4 = null){
        if(!$this->isOnline()){$this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/seller/login'));};
        if($this->session->userdata('user')->loggedinas !== 'seller') redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));

        $data['scripts'] = ['forms.js', 'main.js'];
        $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'seller'])->result();

        if($param1 == 'my_orders'){
            $data['orders'] = $this->SellerOrderModel->findManyBy('seller_id', $this->UserModel->Auth()->user_id)->collections;
            $data['page_title'] = ' Seller | Order | My Orders';
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('layouts/admin/top_nav', $data);
            $this->load->view('seller/orders/my_orders', $data);
            $this->load->view('layouts/admin/foot', $data);
        }

        if($param1 === 'update' && $param2 === 'status'){
            // echo json_encode($this->input->post());
            // $_POST['status'] = $param4;
            $status = array();
            $order = $this->SellerOrderModel->findOrFail($param3)->collection;
            $order->status = $this->input->post('status');
            $order->msg = $this->SomeDBFunctions->getOrderStatusMessage($this->input->post('status'));
            // echo json_encode((array)$order);
            if($this->SellerOrderModel->update($param3, (array)$order)){
                $other_orders = $this->SellerOrderModel->findManyBy('order_id', $order->order_id)->collections;
                $ready_order = 0;
                foreach($other_orders as $other_order){
                    if($other_order->status === 'ready'){
                        $ready_order += 1;
                    }
                }
                if($ready_order == count($other_orders)){
                    $main_order = $this->OrderModel->findOrFail($order->order_id)->collection;
                    $main_order->status= 'active';
                    $main_order->msg = $this->SomeDBFunctions->getOrderStatusMessage($main_order->status);
                    if($this->OrderModel->update($order->order_id, (array)$main_order)){
                        $status['status'] = 1;
                        $status['msg'] = 'Order Status Have Been Changed to '.$order->status;
                        $status['redirect'] = 'reload';
                    }else{
                        $status['status'] = 0;
                        $status['msg'] = 'Sorry an error occured';
                    }
                }else{
                    $main_order = $this->OrderModel->findOrFail($order->order_id)->collection;
                    $main_order->status= 'processing';
                    $main_order->msg = $this->SomeDBFunctions->getOrderStatusMessage($main_order->status);
                    $this->OrderModel->update($order->order_id, (array)$main_order);
                    $status['status'] = 1;
                    $status['msg'] = 'Order Status Have Been Changed to '.$order->status;
                    $status['redirect'] = 'reload';
                }
            }
            echo json_encode($status);
        }
        
    }

    public function login(){
        $data['scripts'] = ['main.js', 'forms.js'];
        $data['page_title'] = ' Seller | Login';
        $this->load->view('layouts/admin/head', $data);
        $this->load->view('layouts/admin/top_nav', $data);
        $this->load->view('seller/login', $data);
        $this->load->view('layouts/admin/foot', $data);
    }

    public function register(){
        $data['scripts'] = ['main.js', 'forms.js'];
        $data['page_title'] = ' Seller | Register';
        $this->load->view('layouts/admin/head', $data);
        $this->load->view('layouts/admin/top_nav', $data);
        $this->load->view('seller/register', $data);
        $this->load->view('layouts/admin/foot', $data);
    }


}
