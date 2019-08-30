<?php
    defined("BASEPATH") or die('You are not allowed here');

    class SomeDBFunctions extends CI_Model {


        /**
         * Class constructor.
         */
        public function __construct()
        {
            parent::__construct();

        }


        public function getPossibleOptions($table, $col){
            $syntax = $this->db->query("SELECT COLUMN_TYPE FROM information_schema.`COLUMNS` WHERE TABLE_NAME = '$table' AND COLUMN_NAME ='$col'")->result_array();
  
            $array_string = ($syntax[0]['COLUMN_TYPE']);
            $string = str_replace("enum(", "", $array_string);
            $string = str_replace("'", "", $string);
            $string = str_replace("'", "", $string);
            $string = str_replace(')', "", $string);
            $status_options = explode(",",$string);

            return $status_options;
        }

        public function getOrderStatusMessage($key = 'pending'){
            
            $statusMsg = array(
                'pending'=>'this order will be attended to shortly',
                'processing'=>'your order is under processing',
                'ready'=>'your order is ready',
                'on the way'=>'your order is on its way to you',
                'delivered'=>'your order have been delivered to your billing address',
                'declined'=>'your order is declined',
                'active'=>'your order is active'
            );
            return $statusMsg["$key"];
        }
    }