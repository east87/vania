<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public $arrMenu = array();
	public $data;
	public $privilege = array();
	public function __construct()

	{
		parent::__construct();
                if(! $_SESSION)
                {
                    session_start();
                }
               
		$this->load->model(array('backend/Model_menu_frontend','web/Model_label','web/Model_content'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
                $this->data["module_id"]='';
                $this->data["module_about"]=110;
                $this->data["module_vis"]=111;
                $this->data["module_mis"]=112;
                $this->data["module_apr"]=113;
                $this->data["module_serv"]=105;
                $this->data["module_brand"]=114;
                $this->data["module_pro"]=108;
                $string =$this->data["module_about"].''
                        . ','.$this->data["module_vis"].''
                        . ','.$this->data["module_mis"].''
                        . ','.$this->data["module_apr"].''
                        . ','.$this->data["module_serv"].''
                        . ','.$this->data["module_brand"].''
                        . ','.$this->data["module_pro"];
                $arrayin=array_map('intval', explode(',', $string));
                $this->data["where_in"] = implode(",",$arrayin);
           
	}
        
	public function index()
	{
                
                $ListAbout =array();
                $ListVis =array();
                $ListMis =array();
                $ListApr =array();  
                $ListServ =array();
                $ListBrand =array();
                $ListPro =array();
                 
                $order_limit='';
                $order_limit .= " order by a.row_order ASC";
                $whereContent = '';
                $whereContent .= " WHERE a.row_active_status=1 and a.row_active_status=1 and a.row_parent=0 and a.module_id in(".$this->data["where_in"].") ";
                
                $ListContent = $this->Model_content->getListContent($whereContent,$order_limit);
                
                foreach ($ListContent as $lc){
                    if ($lc['module_id']== $this->data["module_about"]){
                        $ListAbout[]=$lc; 
                    }
                     else if ($lc['module_id']== $this->data["module_vis"]){
                      $ListVis[]=$lc;  
                    }
                    else if ($lc['module_id']== $this->data["module_mis"]){
                      $ListMis[]=$lc;  
                    }
                     else if ($lc['module_id']== $this->data["module_apr"]){
                      $ListApr[]=$lc;  
                    }
                      else if ($lc['module_id']== $this->data["module_serv"]){
                      $ListServ[]=$lc;  
                    }
                     else if ($lc['module_id']== $this->data["module_brand"]){
                      $ListBrand[]=$lc;  
                    }
                    else if ($lc['module_id']== $this->data["module_pro"]){
                      $ListPro[]=$lc;  
                    } 
                }
                $this->data["countAbout"] = count($ListAbout);
                $this->data["ListAbout"] = $ListAbout;
                $this->data["countVis"] = count($ListVis);
		$this->data["ListVis"] = $ListVis;
                $this->data["countMis"] = count($ListMis);
		$this->data["ListMis"] = $ListMis;
                $this->data["countApr"] = count($ListApr);
		$this->data["ListApr"] = $ListApr;
                $this->data["countServ"] = count($ListServ);
		$this->data["ListServ"] = $ListServ;
                $this->data["countBrand"] = count($ListBrand);
		$this->data["ListBrand"] = $ListBrand;
                $this->data["countPro"] = count($ListPro);
                $this->data["ListPro"] = $ListPro;
                echo '<!--<pre>';
                print_r($ListAbout);
                echo '-->';
//		die;
                $this->load->view('vabout',$this->data);
	}
	
	
}