<?php 
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
	/**
	 * summary
	 */
	class Album_Controller extends Base_Controller
	{
	   
	   public function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
		}
		public function InfoAlbum(){
			$this->model->load('Album');
            $data=array(
                'title'=>'index'
            );
            $list_album = $this->model->Album->InfoAlbum();
            if ($list_album != null) {
                echo json_encode($list_album, JSON_UNESCAPED_UNICODE);
            }else {
                echo 'None';
            }
		}
		public function read()
		{
			$this->model->load('Type');
			$json_d = file_get_contents("http://localhost/mvc/api.php?c=album&a=InfoAlbum");
			$array = json_decode($json_d,true);
			echo print_r($array);
		}
	}
 ?>