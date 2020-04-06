<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal extends CI_Controller {

	public $arrMenu = array();
	public $data;
	public $privilege = array();
	public function __construct()

	{
		parent::__construct();
                  if (!$_SESSION) {
                    session_start();
                }
                 include 'checkSession.php'; 
              
                date_default_timezone_set('UTC');
		$this->load->model(array('backend/Model_menu_frontend','web/Model_label','web/Model_content'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias','text'));		
                $module_name=  $this->uri->segment(1);
                
                $getmodule = $this->Model_content->getModule($module_name);
                foreach ($getmodule as $gm) {
                 $this->module_id = $gm->module_id;
                 $this->section = $gm->module_group_id;
                 $_SESSION['module_id']=$this->module_id;
                }
		
		$this->data['controller'] = $module_name; 
                $this->data['module_id']=$_SESSION['module_id'];
                
	}

	 function indexss()
	{
                $order_limit='';
                $order_limit .= " order by a.row_order ASC";
                $order_limit .= " limit  0, 8";
                $whereContent = '';
                $whereContent .= " WHERE a.row_active_status=1 and  a.row_parent=0 and a.module_id = ".$_SESSION['module_id'];
                $ListContent = $this->Model_content->getListContent($whereContent,$order_limit);
                $this->data["countContent"] = count($ListContent);
		$this->data["ListContent"] = $ListContent;
            
		$this->load->view('v'.$this->data['controller'],$this->data);
	}
	
        public function index()                          
	{                  
            $this->data['controller'] = $this->uri->segment(1);
              $this->data['title']=  $this->data['controller'];
          
              $whereContent = " WHERE a.row_active_status=1 and  a.row_parent=0 and a.module_id = ".$_SESSION['module_id']." and  a.show_on=59 or  a.show_on=57";
                   $config = array();
                   $config["base_url"] = BASE_URL."/journal/page/";
                    $config["uri_segment"] = 1;
                    $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
                    $config['full_tag_close'] = '</ul></div>';
                    $config['cur_tag_open'] = '<li class="c-active"><a href="#">';
                    $config['cur_tag_close'] = '</a></li>';
                    $config['num_tag_open'] = '<li>';
                    $config['num_tag_close'] = '</li>';
                    $config['prev_link'] = '<';
                    $config['prev_tag_open'] = '<li>';
                    $config['prev_tag_close'] = '</li>';
                    $config['next_link'] = '>';
                    $config['next_tag_open'] = '<li>';
                    $config['next_tag_close'] = '</li>';
                    $config["total_rows"] = $this->Model_content->getCount($whereContent,'');
                    $per_page =  $config["per_page"] = 9; 
                    $this->pagination->initialize($config);
                    $page =0;
                    $this->data['page'] = $page; 
                $order_limit='';
                $order_limit .= " order by a.row_order ASC";
                $order_limit .= " limit ".$page. "," .$per_page;
                $ListContent = $this->Model_content->getListContent($whereContent,$order_limit);
                
                $ListHl =array();
                $ListJr =array();
                
               // print_r($this->data['ListContent']);
                foreach ($ListContent as $lc){
                    if ($lc['row_order']== 1){
                    $ListHl[]=$lc; 
                    }
                      if ($lc['row_order']!= 1){
                      $ListJr[]=$lc;  
                    }
                     
                }
                $this->data["countHl"] = count($ListHl);
                $this->data["ListHl"] = $ListHl;
                $this->data["countJr"] = count($ListJr);
		$this->data["ListJr"] = $ListJr;
                
                $this->data['page_links']=$this->pagination->create_links();
                $this->data['breadcrump'] ='';
		$this->load->view('v'.$this->data['controller'],$this->data);

	}
        function page (){
          
                $this->data['module_id'] =  $_SESSION['module_id'];                
                $this->data['module_name'] = $this->module_name;
               $whereContent = " WHERE a.row_active_status=1 and  a.row_parent=0 and a.module_id = ".$_SESSION['module_id']." and  a.show_on=59 or  a.show_on=57";
                
                $config = array();
                $config["base_url"] = BASE_URL."/journal/page/";
                $config["total_rows"] = $this->Model_content->getCount($whereContent,'');           
                $config["uri_segment"] = 3;
                $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
                $config['full_tag_close'] = '</ul></div>';
                $config['cur_tag_open'] = '<li class="c-active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['prev_link'] = '<';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '>';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $per_page =  $config["per_page"] = 9; 
                $this->pagination->initialize($config);
                $getpage = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                if ($getpage != 0){
                   $page = $getpage;  
                }
                else {
                     $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
                }
                if (!is_numeric($page))
                {
                   $page=0;
                }
                $order_limit='';
                $order_limit .= " order by a.row_order ASC";
                $order_limit .= " limit ".$page. "," .$per_page;
                $ListContent = $this->Model_content->getListContent($whereContent,$order_limit);
                $ListHl =array();
                $ListJr =array();
                
               // print_r($this->data['ListContent']);
                foreach ($ListContent as $lc){
                    if ($lc['row_order']== 1){
                    $ListHl[]=$lc; 
                    }
                      if ($lc['row_order']!= 1){
                      $ListJr[]=$lc;  
                    }
                     
                }
                $this->data["countHl"] = count($ListHl);
                $this->data["ListHl"] = $ListHl;
                $this->data["countJr"] = count($ListJr);
		$this->data["ListJr"] = $ListJr;
                $this->data['page_links']=$this->pagination->create_links();                              
		$this->load->view('v'.$this->data['controller'],$this->data);
           
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
	 function detail($row_id=NULL)
	{
                $whereContent = '';
                $order_limit= '';
                $whereContent .= "WHERE a.row_parent=0 and a.row_id = ".$row_id;
                $order_limit .= " order by a.row_order ASC";
                $order_limit .= " limit  0, 4 ";
                $ListContent = $this->Model_content->getListContent($whereContent,$order_limit);
                $this->data["countContent"] = count($ListContent);
		$this->data["ListContent"] = $ListContent;
                           
                if( $this->data["countContent"] > 0){
                        foreach($this->data["ListContent"] as $pr){
                         
                        $visibility = contentValue($pr, 'visibility');
                         
                            $label =   $pr['content'][1]['label_id'];
                            $content=   $pr['content'][1]['content_text'];
                            $where_related  ='inner join tbl_content b on a.row_id = b.row_id WHERE a.module_id = '.$_SESSION['module_id'] .' and (b.label_id ='."$label".' and b.content_text ='."$content".')';
                        
                         if($visibility != 'Public' && $this->data["agent_id"] == '' && $_SESSION['module_id'] =100 ){
                             redirect(BASE_URL.'/home');
                         } 
                            
                       } 
                       $this->data["productRelated"] = $this->Model_content->getListContent($where_related,$order_limit);
                           
                     
                     $this->load->view('vDetail'.$this->data['controller'],$this->data);   
                }     
		
	}

}