<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_dine extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	

     function getMaxOrder() {
            $data = array();
             $hasil =  $this->db->query("select Max(dine_order) as max from tbl_dine where dine_active_status=1");	
			$data = $hasil->row_array();                       
                        return $data['max'];
             
        }  
  
      
}