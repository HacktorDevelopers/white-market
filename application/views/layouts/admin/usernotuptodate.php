<?php
    if($this->UserModel->Auth()){
        $selling_info = $this->db->where('seller_id', $this->UserModel->Auth()->user_id)->get('sellers')->row();
        foreach($selling_info as $key => $userdata){
            // echo var_dump($userdata);
            if(strlen($userdata) == 0){
                echo "<p class='alert alert-info'>Please update your ".ucfirst(str_replace(['_'], [' '], $userdata))."</p>";
            }
        }
    }
?>