<?php 
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class Song_Controller extends Base_Controller {
	public function __construct()
	{
		parent::__construct();
	}
    
    
	public function index()
	{
    } 

    
    
	public function InfoSong(){ 
        $this->model->load('Song');
        $data=array(
            'title'=>'index'
        );
		$list_song = $this->model->Song->InfoSong();
		if ($list_song != null) {
			echo json_encode($list_song, JSON_UNESCAPED_UNICODE);
		}else {
			echo 'None';
    	}
    }
}
 ?>