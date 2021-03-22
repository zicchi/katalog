<?php
    include('../koneksi.php');
    $id_user = $_SESSION['id_user'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $level = $_POST['level'];
        if(empty($nama)){
            header("Location:tambahuser.php?notif=namakosong");
        }else if(empty($email)){
            header("Location:tambahuser.php?notif=emailkosong"); 
        }else if(empty($password)){
            header("Location:tambahuser.php?notif=passwordkosong");
        }else if(empty($username)){
            header("Location:tambahuser.php?notif=usernamekosong");                   
        }else{
        $sql = "insert into `user` (`nama`,`email`,`username`,`password`,`level`)
        values ('$nama','$email','$username',MD5('$password'),'$level')";
        mysqli_query($koneksi,$sql);
        header("Location:user.php?notif=tambahberhasil");
    }
?>