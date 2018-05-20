<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!'); 
session_start();
if(isset($_SESSION['email']))
{
    unset($_SESSION['email']);
    header('location:admin.php?c=login');
}else{
    header('location:admin.php?c=login');
}
?>  