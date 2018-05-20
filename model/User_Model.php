<?php
class User_Model{
	public $id;
	public $email;
	public $password;
  public $role;
	public $status;
	public $token;

	public function all(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from users';
		$result = mysqli_query($conn, $sql);
		$list_user = array();

		if(!$result)
			die('Error: '.mysqli_query_error());

		while ($row = mysqli_fetch_assoc($result)){
            $user = new User_Model();
            $user->id = $row['id'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->role = $row['role'];
            $user->token = $row['token'];
            $list_user[] = $user;
        }

        return $list_user;
	}

	public function save(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("INSERT INTO users (email, password, role, token) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $this->email, $this->password, $this->role, $this->token);
		$rs = $stmt->execute();
		$this->id = $stmt->insert_id;
		$stmt->close();
		return $rs;
	}

	public function findById($id){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from users where id='.$id;
		$result = mysqli_query($conn, $sql);

		if(!$result)
			die('Error: ');

		$row = mysqli_fetch_assoc($result);
        $user = new User_Model();
        $user->id = $row['id'];
        $user->email = $row['email'];
        $user->password = $row['password'];
        $user->role = $row['role'];

        return $user;
	}

	public function delete(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'delete from users where id='.$this->id;
		$result = mysqli_query($conn, $sql);

		return $result;
	}

	public function update(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("UPDATE users SET email=?, password=?, role=? WHERE id=?");
		$stmt->bind_param("sssi", $this->email, $this->password, $this->role, $_POST['id']);
		$stmt->execute();
		$stmt->close();
	}
}
?>
