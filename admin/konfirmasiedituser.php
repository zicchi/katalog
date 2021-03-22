<?php
    session_start();
    include('../koneksi.php');
    
    if(isset($_SESSION['id_user'])){
        $id_user = $_SESSION['id_user'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $level = $_POST['level'];
        if(empty($nama)){
            header("Location:edituser.php?data=".$id_user."¬if=namakosong");
        }else if(empty($email)){
            header("Location:edituser.php?data=".$id_user."¬if=emailkosong"); 
        }else if(empty($password)){
            header("Location:edituser.php?data=".$id_user."¬if=passwordkosong");
        }else if(empty($username)){
            header("Location:edituser.php?data=".$id_user."¬if=usernamekosong");                   
        }else{
            $sql = "update `user` set `nama`='$nama',`email`='$email',`username`='$username',`password`='$password',`level`='$level' where `id_user`='$id_user'";
            mysqli_query($koneksi,$sql);
            header("Location:user.php?notif=editberhasil");
        }
    }
?>