<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class Home_Controller extends Base_Controller
{
    public function index()
    {        
        $this->view->load('home/home');
    }
}