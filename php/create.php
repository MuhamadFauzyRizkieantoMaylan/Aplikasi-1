<?php 
    if(isset($_POST['create'])) {

        include "../db_conn.php";

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        
        }

        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        $pembimbing = validate($_POST['pembimbing']);
        $sekolah = validate($_POST['sekolah']);
        $staff = validate($_POST['staff']);
        $tgl_masuk = validate($_POST['tgl_masuk']);
        $tgl_keluar = validate($_POST['tgl_keluar']);
        

        $user_data = 'name='.$name. 'email='.$email. 'pembimbing='.$pembimbing. 'sekolah='.$sekolah. 'staff='.$staff. 'tgl_masuk='.$tgl_masuk. '&tgl_keluar='.$tgl_keluar;

        if (empty($name)) {
            header("Location:../index.php?error=Nama is required&$user_data");
        }else if (empty($email)) {
            header("Location:../index.php?error=Email is required&$user_data");
        }else if (empty($pembimbing)) {
            header("Location:../index.php?error=Pembimbing is required&$user_data");
        }else if (empty($sekolah)) {
            header("Location:../index.php?error=Sekolah is required&$user_data");
        }else if (empty($staff)) {
            header("Location:../index.php?error=Staff is required&$user_data");
        }else if (empty($tgl_masuk)) {
            header("Location:../index.php?error=Tanggal Masuk is required&$user_data");
        }else if (empty($tgl_keluar)) {
            header("Location:../index.php?error=Tanggal Keluar is required&$user_data");
        }else{
            
            $sql = "INSERT INTO users(name,email,pembimbing,sekolah,staff,tgl_masuk,tgl_keluar)
                    VALUES('$name', '$email', '$pembimbing', '$sekolah', '$staff', '$tgl_masuk', '$tgl_keluar')";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location:../read.php?success=successfully created");
            }else{
                header("Location:../index.php?error=unknown error occurred&$user_data");
            }
        }
    }
?>