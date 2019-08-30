<?php

defined('BASEPATH') OR exit('You are not allowed here');


    class OrderModel extends CI_Model {

        private $table = 'orders';
        // public $id;
        public $order_id;
        public $buyer_id;
        public $order_detail;
        public $total_amount;
        public $status = 'pending';
        public $msg = 'Your order will be attended to shortly.';
        public $created_at;
        public $collection;
        public $collections;


        public function __construct(){

            parent::__construct();

        }

        public function get(){
            $this->collections = $this->db->get($this->table)->result();
            return $this;
        }

        public function findManyBy($by, $key){
            $this->collections = $this->db->where($by, $key)->get($this->table)->result();
            return $this;
        }

        public function initialize($raw_order = null){
            $this->order_id = ($raw_order['order_id']) ? $raw_order['order_id'] : 'order_'.random_string('numeric', 5);
            $this->buyer_id = ($raw_order['buyer_id']) ? $raw_order['buyer_id'] : $this->UserModel->Auth()->user_id;
            $this->order_detail = ($raw_order['order_id']) ? $raw_order['order_detail'] : $this->order_detail;
            $this->total_amount = ($raw_order['total_amount']) ? $raw_order['total_amount'] : $this->total_amount;
            $this->status = ($raw_order['status']) ? $raw_order['status'] : $this->status;
            $this->msg = ($raw_order['msg']) ? $raw_order['msg'] : $this->msg;
            $this->created_at = Carbon\Carbon::now();
            // $this->data['msg'] = ($raw_order['msg']) ? $raw_order['msg'] : $this->data['msg'];
            // var_dump($this);
            return $this;
        }

        public function save($raw_order = null){
            if($raw_order){
                $this->initialize($raw_order);
            }
            unset($this->collections);
            unset($this->collection);
            return $this->db->insert($this->table, $this);
        }


        /**
         * @param order_id string
         * @return collection
         */
        public function findOrFail($id){
            $this->collection = $this->db->where('order_id', $id)->get($this->table)->row();
            return $this;
        }

        public function update($id, $data){
            $this->initialize($data);
            unset($this->collections);
            unset($this->collection);
            return $this->db->where('order_id', $id)->update($this->table, $this);
        }


    }