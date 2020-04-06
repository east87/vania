<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends CI_Controller {

	public $arrMenu = array();
	public $data;
	public $privilege = array();
	public function __construct()

	{
		parent::__construct();
                $this->load->model(array('backend/Model_menu_frontend','web/Model_label','web/Model_content'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
                $this->data["module_large"]=128;
                $this->data["module_small"]=129;
                $string =$this->data["module_large"].''
                        . ','.$this->data["module_small"];
                $arrayin=array_map('intval', explode(',', $string));
                $this->data["where_in"] = implode(",",$arrayin);
                $module_name=  $this->uri->segment(1);
		$this->data['controller'] = $module_name;   
		
	}
        
	public function index()
	{
                $ListLarge =array();
                $ListSmall =array();
                 $order_limit='';
                $order_limit .= " order by a.row_order ASC";
                $whereContent = '';
                $whereContent .= " WHERE a.row_active_status=1 and a.row_active_status=1 and a.row_parent=0 and a.module_id in(".$this->data["where_in"].") ";
                
                $ListContent = $this->Model_content->getListContent($whereContent,$order_limit);
                
                foreach ($ListContent as $lc){
                    if ($lc['module_id']== $this->data["module_large"]){
                        $ListLarge[]=$lc; 
                    }
                     else if ($lc['module_id']== $this->data["module_small"]){
                      $ListSmall[]=$lc;  
                    }
                   
                }
                $this->data["countLarge"] = count($ListLarge);
                $this->data["ListLarge"] = $ListLarge;
                $this->data["countSmall"] = count($ListSmall);
		$this->data["ListSmall"] = $ListSmall;
                
		$this->load->view('vlanding',$this->data);
	}
	
	

}