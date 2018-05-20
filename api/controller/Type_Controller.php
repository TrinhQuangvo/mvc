<?php 
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
	/**
	 * summary
	 */
	class Type_Controller extends Base_Controller
	{
	   
	   public function __construct()
		{
			parent::__construct();
		}
		public function index()
		{		
		}
		public function InfoType(){
			$this->model->load('Type');
            $data=array(
                'title'=>'index'
            );
            $list_type = $this->model->Type->InfoType();
            if ($list_type != null) {
                echo json_encode($list_type, JSON_UNESCAPED_UNICODE);
            }else {
                echo 'None';
            }
		}
		public function read()
		{
			$this->model->load('Type');
			$json_d = file_get_contents("http://localhost/mvc/api.php?c=type&a=InfoType");
			$array = json_decode($json_d,true);
			echo print_r($array);
		}
	}
 ?>