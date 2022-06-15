<?php 
    session_start();
    

include 'db_conn.php';

if (isset($_POST['btnlogin'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    

        if($username=="zeni"){
        if($password=="zeni123"){

            $_SESSION['btnlogin']=true;
            
            header("location: index.php");
        }else{
            header("location: login.php?pesan=Password yang anda masukkan Salah");
        }
    }else{
        header("location: login.php?pesan=Username yang anda masukkan Salah");
    }
}
?>