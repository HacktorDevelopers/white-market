<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ActivityModel extends CI_Model {

	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getAllLogs(){
        return $this->db->order_by('id', 'DESC')->get('activity_log')->result_array();
    }

    public function getLogBy($by, $key){
        return $this->db->where($by, $key)->get('activity_log')->row_array();
    }

    public function getLogsBy($by, $key){
        return $this->db->where($by, $key)->get('activity_log')->result_array();
    }

    public function createLog($data){
        $data['activity_id'] = 'act_'.random_string('numeric', 8);
        $data['created_at'] = Carbon\Carbon::now();
        return $this->db->insert('activity_log', $data);
    }

}
