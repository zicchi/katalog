<?php
session_start();
include('../koneksi.php');
if (isset($_SESSION['id_user'])){
    $id_user = $_SESSION['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    //get foto
    $sql_foto = "SELECT `foto` FROM `user` WHERE `id_user`='$id_user'";
    $query_foto = mysqli_query($koneksi, $sql_foto);
    while($data_foto = mysqli_fetch_row($query_foto)){
        $foto = $data_foto;
    }

    if (empty($nama)){
        header("Location:editprofil.php?notif=editkosong&jenis=nama");
    }else if (empty($email)){
        header("Location:editprofil.php?notif=editkosong&jenis=email");
    }else{
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $nama_file = $_FILES['foto']['name'];
        $directori = 'foto/'.$nama_file;
        if (move_uploaded_file($lokasi_file, $directori)){
            if (!empty($foto)){
                unlink("foto/$foto");
            }
            $sql = "update `user` set `nama`='$nama', `email`='$email', `foto`='$nama_file' where `id_user`='$id_user'";
            mysqli_query($koneksi, $sql);
        }else{
            $sql = "update `user` set `nama`='$nama', `email`='$email' where `id_user`='$id_user'";
            mysqli_query($koneksi, $sql);
        }

        header("Location:profil.php?notif=editberhasil");
    }

}
