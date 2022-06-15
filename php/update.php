<?php

    if(isset($_GET['id'])) {
        include "db_conn.php";

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        
        }

        $id = validate($_GET['id']);

        $sql = "SELECT * FROM users WHERE id=$id";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        }else {
            header("Location: read.php");
        }

    }else if(isset($_POST['update'])){
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
        $id = validate($_POST['id']);


        if (empty($name)) {
            header("Location:../update.php?id=$id&error=Name is required");
        }else if (empty($email)) {
            header("Location:../update.php?id=$id&error=Email is required");
        }else if (empty($pembimbing)) {
            header("Location:../update.php?id=$id&error=Pembimbing is required");
        }else if (empty($sekolah)) {
            header("Location:../update.php?id=$id&error=Sekolah is required");
        }else if (empty($staff)) {
            header("Location:../update.php?id=$id&error=Staff is required");
        }else if (empty($tgl_masuk)) {
            header("Location:../update.php?id=$id&error=Tanggal Masuk is required");
        }else if (empty($tgl_keluar)) {
            header("Location:../update.php?id=$id&error=Tanggal Keluar is required");
        }else{
            
            $sql = "UPDATE users
                    SET name='$name', email='$email', pembimbing='$pembimbing', sekolah='$sekolah', staff='$staff', tgl_masuk='$tgl_masuk', tgl_keluar='$tgl_keluar'
                    WHERE id=$id ";
                    

            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location:../read.php?success=successfully updated");
            }else{
                header("Location:../update.php?id=$id&error=unknown error occurred&$user_data");
            }
        }
    }else {
        header("Location: read.php");
    }
?>
