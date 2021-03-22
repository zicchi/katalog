<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php") ?> 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
            include('../koneksi.php');
              if((isset($_GET['aksi']))&&(isset($_GET['data']))){
                if($_GET['aksi']=='hapus'){

                  $id_user = $_GET['data'];
                  //hapus kategori buku
                  $sql_dh = "delete from `user` where `id_user` = '$id_user'";
                  mysqli_query($koneksi,$sql_dh);
                }
              }
          ?>
<div class="wrapper">
<?php include("includes/header.php") ?>

  <?php include("includes/sidebar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Data User</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Data User</h3>
                <div class="card-tools">
                  <a href="tambahuser.php" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah User</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12">
                  <form method="post" action="#">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="kunci2">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div><!-- .row -->
                  </form>
                </div><br>
                <?php if(!empty($_GET['notif'])){?>
                      <?php if($_GET['notif']=="tambahberhasil"){?>
                        <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                      <?php } else if($_GET['notif']=="editberhasil"){?>
                        <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                      <?php } else if($_GET['notif']=="hapusberhasil"){?>
                        <div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>
                      <?php }?>
                    <?php }?>
                </div>
                <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%">No</th>
                        <th width="30%">Nama</th>
                        <th width="30%">Email</th>
                        <th width="20%">Level</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $sql_k = "SELECT `id_user`,`nama`,`email`,`level` FROM `user` ORDER BY `id_user`";
                      $query_k = mysqli_query($koneksi,$sql_k);
                      $no = 1;
                      while($data_k = mysqli_fetch_row($query_k)){
                      $id_user = $data_k[0];
                      $nama = $data_k[1];
                      $email = $data_k[2];
                      $level = $data_k[3];
                  ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $level; ?></td>
                        <td align="center">
                        <a href="edituser.php?data=<?php echo $id_user;?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                      <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nama; ?>?'))window.location.href ='user.php?aksi=hapus&data=<?php echo $id_user;?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i>Hapus</a>                  
                        </td>
                      </tr>
                      <?php $no++;}?>
                      
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("includes/footer.php") ?>

</div>
<!-- ./wrapper -->

<?php include("includes/script.php") ?>
</body>
</html>
