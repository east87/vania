<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

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
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));		
                $module_name=  $this->uri->segment(1);
                $_SESSION['module_id']=102;
		$this->data['controller'] = $module_name;              
                $whereBlog = '';
                $order_limit='';
                $order_limit .= " order by a.row_order ASC";
                $order_limit .= " limit  0, 100";
                $whereBlog .= "WHERE a.row_parent=0 and a.module_id = ".$_SESSION['module_id'];
               
                $RelatedBlog = $this->Model_content->getListContent($whereBlog,$order_limit);
                $this->data["countRelated"] = count($RelatedBlog);
		$this->data["RelatedBlog"] = $RelatedBlog;
	}

	 function index()
	{
                $order_limit='';
                $order_limit .= " order by a.row_order ASC";
                $order_limit .= " limit  0, 1";
                $whereBlog1 = '';
                $whereBlog1 .= "WHERE a.row_parent=0 and a.module_id = ".$_SESSION['module_id'];
                $ListBlog = $this->Model_content->getListContent($whereBlog1,$order_limit);
                $this->data["countBlog"] = count($ListBlog);
		$this->data["ListBlog"] = $ListBlog;
             
		$this->load->view('v'.$this->data['controller'],$this->data);
	}
	
	 function detail($row_id=NULL)
	{
                $whereBlog = '';
                $whereBlog .= "WHERE a.row_parent=0 and a.row_id= ".$row_id;
                $ListBlog = $this->Model_content->getListContent($whereBlog,'');
                $this->data["countBlog"] = count($ListBlog);
		$this->data["ListBlog"] = $ListBlog;
          
		$this->load->view('v'.$this->data['controller'],$this->data);
	}

}