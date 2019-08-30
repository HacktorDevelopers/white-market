<?php

defined('BASEPATH') OR exit('You are not allowed here');


    class SellerOrderModel extends CI_Model {

        private $table = 'seller_order';
        // public $id;
        public $seller_id;
        public $buyer_id;
        public $order_id;
        public $ordered_product_name;
        public $ordered_product_qty;
        public $ordered_product_price;
        public $msg = 'Your order will be attended to shortly.';
        public $status = 'pending';
        public $other_options;
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
            $this->seller_id = ($raw_order['seller_id']) ? $raw_order['seller_id'] : $this->seller_id;
            $this->buyer_id = ($raw_order['buyer_id']) ? $raw_order['buyer_id'] : $this->buyer_id;
            $this->order_id = ($raw_order['order_id']) ? $raw_order['order_id'] : $this->order_id;
            $this->ordered_product_name = ($raw_order['ordered_product_name']) ? $raw_order['ordered_product_name'] : $this->ordered_product_name;
            $this->ordered_product_qty = ($raw_order['ordered_product_qty']) ? $raw_order['ordered_product_qty'] : $this->ordered_product_qty;
            $this->ordered_product_price = ($raw_order['ordered_product_price']) ? $raw_order['ordered_product_price'] : $this->ordered_product_price;
            $this->other_options = ($raw_order['other_options']) ? $raw_order['other_options'] : $this->other_options;
            $this->status = ($raw_order['status']) ? $raw_order['status'] : $this->status;
            $this->created_at = Carbon\Carbon::now();
            $this->msg = ($raw_order['msg']) ? $raw_order['msg'] : $this->msg;
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
            $this->collection = $this->db->where('id', $id)->get($this->table)->row();
            return $this;
        }

        public function update($id, $data){
            $this->initialize($data);
            unset($this->collections);
            unset($this->collection);
            return $this->db->where('id', $id)->update($this->table, $this);
        }


    }