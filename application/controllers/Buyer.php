<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer extends CI_Controller {


    public function __construct(){
        parent::__construct();
    }

    public function home(){
        $this->cart();
    }

    public function isOnline(){
        if(!$this->session->userdata('user')) return false; else return true;;
    }


    public function myorders(){
        $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'buyer'])->result();

    }

    public function cart($param1 = 'my_cart'){

        $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'buyer'])->result();

        if($param1 == 'my_cart'){
            $data['scripts'] = ['main.js', 'forms.js'];
            $data['page_title'] = " | Buyer | Cart | My Cart";
            $data['profile'] = $this->session->userdata('user');
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('layouts/admin/top_nav', $data);
            $this->load->view('buyer/cart/my_cart', $data);
            $this->load->view('layouts/admin/foot', $data);
        }
        
    }

    public function addtocart(){
        // echo json_encode($this->input->post());
        $cart_item = $this->input->post();
        $data['id'] = 'cart'.random_string('numeric', 5);
        $data['name'] = $cart_item['name'];
        $data['options']['seller_id'] = $cart_item['owner_id'];
        $data['options']['product_id'] = $cart_item['product_id'];
        $data['options']['other_options'] = $cart_item['oto'];
        $data['options']['sorted'] = false;
        $data['qty'] = $cart_item['qty'];
        $data['price'] = (int)str_replace(',', '', $cart_item['price']);
        // echo json_encode($data);
        $rowid = $this->cart->insert($data);
        if($rowid){
            echo json_encode(['status'=>1, 'msg'=>$data['name']." is added to cart successfully", 'redirect'=>'reload']);
        }else{
            echo json_encode(['status'=>0, 'msg'=>"An error was encountered please try again later"]);
        }
    }

    public function deletefromcart($rowid){
        // $rowid = $this->input->post();
        if($this->cart->remove($rowid)){
            echo json_encode(['status'=>1, 'msg'=>"Product have been removed from cart", 'redirect'=>'reload']);
        }else{
            echo json_encode(['status'=>0, 'msg'=>"An error occurred please try again later"]);
        }
    }

    public function updatecart(){
        $data = $this->input->post();
        $new_cartcontent['rowid'] = $data['rowid'];
        $new_cartcontent['options']['seller_id'] = $data['owner_id'];
        $new_cartcontent['options']['product_id'] = $data['product_id'];
        $new_cartcontent['options']['other_options'] = $data['oto'];
        $new_cartcontent['options']['sorted'] = false;
        $new_cartcontent['qty'] = $data['qty'];
        if($this->cart->update($new_cartcontent)){
            echo json_encode(['status'=>1, 'msg'=>'Cart Content Updated Successfully', 'redirect'=>'reload']);
        }else{
            echo json_encode(['status'=>0, 'msg'=>'An error occurred! Please try again later']);
        }
    }

    public function profile($param1 = 'view_profile', $param2 = 'users'){
        if(!$this->isOnline()){ $this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/buyer/login')); }
        if(!$this->isBuyer()) redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));

        $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'buyer'])->result();
        if($param1 == 'view_profile'){
            $data['scripts'] = ['main.js', 'forms.js'];
            $data['page_title'] = " | Buyer | Profile | My Profile";
            $data['profile'] = $this->session->userdata('user');
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('layouts/admin/top_nav', $data);
            $this->load->view('buyer/profile/view_profile', $data);
            $this->load->view('layouts/admin/foot', $data);
        }
        
        if($param1 == 'edit_profile'){
            $data['scripts'] = ['main.js', 'forms.js'];
            $data['page_title'] = " | Buyer | Profile | My Profile";
            $data['profile'] = $this->session->userdata('user');
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('layouts/admin/top_nav', $data);
            $this->load->view('buyer/profile/edit_profile', $data);
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

    public function checkout(){
        if(!$this->isOnline()){ $this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/buyer/login')); }
        if(!$this->isBuyer()) redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));


        $order = new OrderModel();
        $order->order_detail = serialize($this->cart->contents());
        $order->total_amount = $this->cart->total();
        if($order->initialize()->save()){
            $this->cart->destroy();
            redirect('buyer/orders/my_orders');
        }
    }

    public function orders($param1 = 'my_orders'){
        if(!$this->isOnline()){ $this->session->set_tempdata('rfrom', current_url()); redirect(site_url('/buyer/login')); }
        if(!$this->isBuyer()) redirect(site_url('/'.$this->session->userdata('user')->loggedinas.'/home'));

        $data['menus'] = $this->db->get_where('menus', ['acct_type'=>'buyer'])->result();
        if($param1 == 'my_orders'){
            $data['orders'] = $this->UserModel->getUserOrders()->collections;
            $data['scripts'] = ['main.js', 'forms.js'];
            $data['page_title'] = " | Buyer | Order | My Order";
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('layouts/admin/top_nav', $data);
            $this->load->view('buyer/orders/my_orders', $data);
            $this->load->view('layouts/admin/foot', $data);
        }else{
            
        }
        
    }

    public function login(){
        $data['scripts'] = ['main.js', 'forms.js'];
        $data['page_title'] = ' Buyer | Login';
        $this->load->view('layouts/admin/head', $data);
        $this->load->view('layouts/admin/top_nav', $data);
        $this->load->view('buyer/login', $data);
        $this->load->view('layouts/admin/foot', $data);
    }

    public function register(){
        $data['scripts'] = ['main.js', 'forms.js'];
        $data['page_title'] = ' Buyer | Register';
        $this->load->view('layouts/admin/head', $data);
        $this->load->view('layouts/admin/top_nav', $data);
        $this->load->view('buyer/register', $data);
        $this->load->view('layouts/admin/foot', $data);
    }

    public function logout(){
        session_destroy();
        redirect(site_url());
    }


    public function isBuyer(){
        // if($this->session->)
        $acct_types = explode(',', $this->session->userdata('user')->acct_type);
        if(in_array('buyer', $acct_types)){
            return true;
        }else{
            return false;
        }
    }
}