<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class Home extends CI_Controller {	public $arrMenu = array();	public $data;	public $privilege = array();	public function __construct()	{		parent::__construct();                if(! $_SESSION)                {                    session_start();                }               		$this->load->model(array('backend/Model_menu_frontend','web/Model_label','web/Model_content'));		$this->load->helper(array('funcglobal','menu','accessprivilege','alias','text'));                $this->data["module_id"]='';                $this->data["module_banner"]=103;                $this->data["module_pro"]=108;                $this->data["module_journal"]=102;//                $string =$this->data["module_banner"].','.$this->data["module_pro"].','.$this->data["module_journal"];//                $arrayin=array_map('intval', explode(',', $string));//                $this->data["where_in"] = implode(",",$arrayin);           	}        	public function index()	{                                $ListBanner =array();                $ListPro =array();                $ListJournal =array();                             $order_limit='';                $order_limit .= " order by a.row_order ASC";                $order_limit_journal = " order by a.row_order ASC limit 0 , 2";                               $whereBanner = " WHERE a.row_active_status=1 and  a.row_parent=0 and a.module_id = ".$this->data["module_banner"]." and  a.show_on=64 or  a.show_on=66";                $wherePro = " WHERE a.row_active_status=1 and  a.row_parent=0 and a.module_id = ".$this->data["module_pro"]." ";                $whereJournal = " WHERE a.row_active_status=1 and  a.row_parent=0 and a.module_id = ".$this->data["module_journal"]." and  a.show_on=59 or  a.show_on=58";                               $ListBanner = $this->Model_content->getListContent($whereBanner,$order_limit);                $ListPro = $this->Model_content->getListContent($wherePro,$order_limit);                $ListJournal = $this->Model_content->getListContent($whereJournal,$order_limit_journal);                //                foreach ($ListContent as $lc){//                    if ($lc['module_id']== $this->data["module_banner"]){//                        $ListBanner[]=$lc; //                    }//                    else if ($lc['module_id']== $this->data["module_pro"]){//                      $ListPro[]=$lc;  //                    }//                     else if ($lc['module_id']== $this->data["module_journal"]){//                      $ListJournal[]=$lc;  //                    }//                     //                }                $this->data["countBanner"] = count($ListBanner);                $this->data["ListBanner"] = $ListBanner;                $this->data["countPro"] = count($ListPro);                $this->data["ListPro"] = $ListPro;                $this->data["countJournal"] = count($ListJournal);		$this->data["ListJournal"] = $ListJournal;//                echo '<!--<pre>';//                print_r($ListBanner);//                echo '-->';//		die;                $this->load->view('vhome',$this->data);	}		}