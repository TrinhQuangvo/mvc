<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!'); 
session_start();
if(isset($_SESSION['email']))
    header('location:admin.php?c=home');
class Login_Controller extends Base_Controller
{
    public function index()
    {        
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);
            //kiem tra co ton tai khong
		    $conn = FT_Database::instance()->getConnection();
            $query = mysqli_query($conn,"SELECT email, password, role, status FROM users WHERE email='$email'");
            
            if(mysqli_num_rows($query) == 0){
                echo  "<script>alert('Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại.')</script>";
            }
            else{
                //lay mat khau trong database
                $row = mysqli_fetch_array($query);
                //so sanh mat khau
                if($password != $row['password']){
                    echo "<script>alert('Mật khẩu không đúng. Vui lòng nhập lại.')</script>";
                }
                else{  
                    if($row['role'] != 'admin'){
                        echo "<script>alert('bạn không có quyền truy cập. Vui lòng quay lại.')</script>";
                    }
                    else if($row['status'] != 'visible'){
                            echo "<script>alert('Tài khoản của bạn đã bị chặn. Vui lòng quay lại.')</script>";
                    }
                    else{
                             //luu ten dang nhap
                            $_SESSION['email'] = $email;
                                        
                            $sql = "select email, password from users";     
                            $query = $conn -> query($sql);
                            if(mysqli_num_rows($query)){
                                header('location: admin.php?c=home');
                            }
                            else{
                                echo "error";
                            }
                        }
                    }
                }
            }
        // Load view
        $this->view->load('login/login');
    }
}