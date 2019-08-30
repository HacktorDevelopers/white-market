<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }
    
    public function register(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', array('is_unique'=>'This %s already exist'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[16]|min_length[8]');

        if($this->form_validation->run() == FALSE){
            echo json_encode(['status'=>0, 'msg'=>validation_errors()]);
        }else{
            $newuser = $this->input->post();
            $userinfo = $this->db->get_where('users', ['email'=>$newuser['email']])->row();
            if($userinfo){
                echo json_encode(['status'=>0, 'msg'=>'Account with the provided credentials already exists']);
            }else{
                $newuser['user_id'] = "user_".random_string('numeric', 7);
                $newuser['token'] = "user_".random_string('alnum', 32);
                $newuser['active'] = 0;
                $newuser['image'] = site_url('/public/images/users/p.png');
                $newuser['password'] = md5($newuser['password']);
                $newuser['created_at'] = Carbon\Carbon::now();
                // $this->UserModel->createNewUser
                $data['userdata'] = $newuser;
                $acct_type_from_from = $newuser['acct_type'];
                $newuser['acct_type'] = $newuser['acct_type'].',buyer';
                // $message = $this->load->view('mail_templates/reg_temp', $data, true);
                if($this->db->insert('users', $newuser)){
                    //  ($this->send_mail($newuser['email'], 'Account Registration', $message, 'html') && 
                    if($acct_type_from_from == 'seller'){
                        $seller['seller_id'] = $newuser['user_id'];
                        $seller['created_at'] = Carbon\Carbon::now();
                        $this->db->insert('sellers', $seller);
                        echo json_encode(['status'=>1, 'msg'=>'Registration Successfull. An Email have been sent to your email account for verfication', 'redirect'=>site_url('/'.$acct_type_from_from.'/home')]);
                        exit();
                    }
                    echo json_encode(['status'=>1, 'msg'=>'Registration Successfull', 'redirect'=>site_url('/'.$acct_type_from_from.'/home')]);
                }else{
                    echo json_encode(['status'=>0, 'msg'=>'An error occurred please try again Later in an hour']);
                    exit();
                }
                
                // echo json_encode($newuser);
            }
        }
        // echo json_encode($newuser);
    }

    public function login(){
        $email = $this->input->post('email', TRUE);
        $pass = $this->input->post('password', TRUE);
        $acct_type = $this->input->post('acct_type', TRUE);
        $userinfo = $this->db->get_where('users', ['email'=>$email, 'password'=>md5($pass)])->row();
        if($userinfo){
            // if($userinfo->active == 0){
            //     echo json_encode(['status'=>0, 'msg'=>'Please activate your account']);
            // }else{
                if(!$this->hasAcctType($acct_type, $userinfo)){
                    echo json_encode(['status'=>0, 'msg'=>'You are not allowed to login as a/an '.$acct_type]);
                    die();
                }
                $this->session->set_userdata('user', $userinfo);
                $this->session->userdata('user')->loggedinas = $acct_type;
                $url = ($this->session->tempdata('rfrom')) ? $this->session->tempdata('rfrom') : site_url('/'.$this->session->userdata('user')->loggedinas.'/home');
                if($this->session->tempdata('rfrom')){
                    $this->session->unset_tempdata('rfrom');
                }
                echo json_encode(['status'=>1, 'msg'=>'Login Successful', 'redirect'=>$url]);
            // }
        }else{
            echo json_encode(['status'=>0, 'msg'=>'Login Credentials is Invalid. Please Check your email and password']);
        }
    }

    public function switchto($to = 'buyer'){
        if($this->session->userdata('user') && $this->hasAcctType($to, $this->session->userdata('user'))){
            $this->session->userdata('user')->loggedinas = $to;
            redirect(site_url('/'.$to.'/home'));
        }
    }

    public function addtoaccounttype($acct_type = 'buyer'){
        if($this->session->userdata('user')){
            $userdata = $this->session->userdata('user');
            if(!$this->hasAcctType($acct_type, $this->session->userdata('user'))){
                $userinfo = $this->UserModel->getUserBy('user_id', $userdata->user_id);
                // if($this->db->)
                $userinfo['acct_type'] = $userinfo['acct_type'].',seller';
                if($this->db->where('user_id', $userinfo['user_id'])->update('users', $userinfo) && $this->db->insert('sellers', ['seller_id'=>$userinfo['user_id']])){
                    $this->session->userdata('user')->acct_type .= ',seller';
                    echo json_encode(['status'=>1, 'msg'=>'You are now a/an '.$acct_type, 'redirect'=>'reload']);
                    // echo ;
                }else{
                    echo json_encode(['status'=>0, 'msg'=>'Unable to register you as a/an '.$acct_type, 'redirect'=>'reload']);
                    // echo ;
                }
            }else{
                echo json_encode(['status'=>0, 'msg'=>'You are a/an '.ucfirst($acct_type).' already']);
                // echo ;
                // $this->session->userdata('user')->loggedinas = $to;
                // redirect(site_url('/'.$to.'/home'));
            }
            
        }
    }


    public function send_mail($mail_to, $subject, $msg, $mailtype="html") {
        //Load email library
        $this->load->library('email');

        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = $this->config->item('smtp_user');
        $config['smtp_pass'] = $this->config->item('smtp_pass');
        $config['smtp_port'] = 465  ;
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = $mailtype;
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");
        $this->email->from($this->config->item('smtp_user'), 'White Market');
        $this->email->to($mail_to);
        $this->email->subject($subject);
        $this->email->message($msg);
        //Send mail
        if($this->email->send()) {
            return true;
        }else{
            // print($this->email->print_debugger());
            // $path = $this->config->item('server_root');
            // $file_path = $path."/white-market/logs/error_log.txt";
            // $file = fopen($file_path, "+a");
            // fwrite($file_path, $this->email->print_debugger().'\n');
            // fclose($file_path);
            return false;
        }
    }

    public function hasAcctType($type, $user){
        $useracct = explode(',', $user->acct_type);
        if(in_array($type, $useracct)){
            return true;
        }else{
            return false;
        }
    }

//     public function activate(){
//         $data['page_name'] = "verified";
//         $data['page_type'] = "pages";
//         $data['page_title'] = "Verifying Your Account";
// //			var_dump($data['page_data']);
//         $this->load->view('index', $data);
//     }


    public function verify(){

        $checkifverified = $this->db->get_where('users', array('token'=>$_GET['token'], 'active'=>0))->row();

        if($checkifverified ):
            $email = $checkifverified->email;
            $acct_type = ($checkifverified->acct_type) ? $checkifverified->acct_type : 'buyer';
            $this->db->set("active", 1);
            $verify = $this->db->update('users', array('token'=>$_GET['token']));
            if($verify){
                $loginas = explode(',', $acct_type)[0];
                $msg = "Click the button below to login and start to post your product for sale online";
                $msg .= "<a style='width: 100px; border-radius: 10px; background: #ffd400' href='".site_url('/'.$loginas.'/login')."'>Login</a>";
                $message = "
                 <html>
                   <head>
                     <title>Account Verificaton Status</title>
                   </head>
                   <body>
                     <h1>Account Verification Status</h1>
                     <p>$msg</p>
                   </body>
                 </html>";
                if($this->send_mail($email, "Account Verification Status", $message)):
                    // $status = array('status'=>1, 'msg'=>'Account Verified Successfully', 'url'=>site_url('/'.$loginas.'/login'));
                    redirect(site_url('/'.$loginas.'/login'));
                    // echo json_encode($status);
                endif;
            }else{
                $status = array('status'=>0, 'msg'=>'Account Not Verified');
                echo json_encode($status);
            }
        else:
            $status = array('status'=>0, 'msg'=>'Error Activating Account');
            echo json_encode($status);
        endif;

    
    }

    public function logout(){
        if(session_destroy()){
            redirect(site_url('market'));
        }
    }



//     public function recover(){
//         $this->form_validation->set_rules('email', "Email", 'required|valid_email');
//         if($this->form_validation->run() === false){
//             echo json_encode([
//                 'status'=>0,
//                 'msg'=>validation_errors(),
//             ]);
//         }else{
//             $email = $this->input->post('email');
//             $check = $this->db->get_where('users', ['email'=>$email])->row();
//             if($check){
//                 $data['userdata'] = $check;

//                 $message = $this->load->view('mail_templates/password_recovery', $data, true);

//                 if($this->send_mail($email, 'Password Recovery', $message)){
//                     echo json_encode([
//                         'status'=>1,
//                         'msg'=>"A Recovery Email Have Beem Sent To Your Email",
//                         'url' => site_url()
//                     ]);
//                 }

//             }else{
//                 echo json_encode([
//                     'status'=>0,
//                     'msg'=>"Email Do Not Match Any Credentials"
//                 ]);
//             }
//         }
//     }

//     public function verify_token($token){
//         $check = $this->db->get_where('users', ['token'=>$token])->row();
//         if($check){
//             $this->session->set_userdata('r_data', $check);
//             redirect(site_url('?modal=reset'));
//         }else{
//             echo "An Error occured";
//         }
//     }

//     public function reset(){
//         $this->form_validation->set_rules('password', 'Password', 'required|max_length[16]|min_length[8]');
//         $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');
//         if($this->form_validation->run() === false){
//             echo json_encode([
//                 'status' => 0,
//                 'msg' => validation_errors()
//             ]);
//         }else{
//             $user_info = $this->session->userdata('r_data');
//             $this->session->unset_userdata('r_data');
//             $_POST['password'] = md5($this->input->post('password'));
//             unset($_POST['confirm_password']);
            
//             if($this->db->where('user_id', $user_info->user_id)->update('users', $this->input->post())){
//                 echo json_encode([
//                     'status' => 1,
//                     'msg' => 'Password Reset Successfull',
//                     'url' => site_url('?modal=login'),
//                 ]);
//             }
            
//         }
//     }


    


}
?>