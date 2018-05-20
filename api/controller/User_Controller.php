<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class User_Controller extends Base_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		
	}
	public function login()
	{
		$json = [];
		if (isset($_POST['email']) && isset($_POST['password'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$this->model->load('User');
			$result = $this->model->User->login($email, $password);
			http_response_code(200);
			if (isset($result->id)) {
				echo '{';
				echo "\"user\":";
				array_push($json, array(
					'id' => $result->id,
					'infor' => array(
						'email' => $result->email,
						'password' => $result->password
						),
					'role' => $result->role,
					'status' => $result->status,
					'token' => $result->token
					)
				);
				echo json_encode($json);
				echo '}';
			}
		}
	}
	
}
