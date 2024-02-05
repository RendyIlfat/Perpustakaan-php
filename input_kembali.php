<?php
require('controller/islogin.php');

// menambahkan class database
require('db/database.php');
$db = new Database();

$no = @$_GET['id'];

// buat query untuk mengambil data buku di table
$db->query("SELECT * FROM loans l
    INNER JOIN books b ON l.no_induk = b.no_induk
    INNER JOIN customers c ON l.id_cus = c.id_cus
    WHERE id = :id;");

$db->bind(":id", $no);

$buku = $db->single();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?php
    require('template/header.php');
    ?>

    <?php
    require('template/sidebar.php');
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PEMINJAMAN BUKU</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">
                  <?php
                  if ($no) {
                    echo 'Edit Peminjaman Buku';
                  } else {
                    echo 'Tambah Peminjaman Buku';
                  }
                  ?>
              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    
      <form enctype="multipart/form-data" action="<?php echo (@$no ? 'controller/update_kembali.php' : 'controller/save_pinjam.php'); ?>" method= "POST">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">
                    <?php
                      if ($no) {
                        echo 'Edit Peminjaman Buku';
                      } else {
                        echo 'Tambah Peminjaman Buku';
                      }
                    ?>
                  </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                  <div class="card-body card dark-mode">
                    
                    <p>No Induk : <strong><?= $buku['no_induk'] ?></strong></p>
                    <p>Judul : <strong><?= $buku['judul'] ?></strong></p>
                    <p>ID Customer : <strong><?= $buku['id_cus'] ?></strong></p>
                    <p>Nama Customer : <strong><?= $buku['nama'] ?></strong></p>
                      
                    <?php
                    if ($no) {
                    ?>
                        <input name="id" type="hidden" value="<?= @$no ?>">  
                    <?php } ?>

                    <div class="form-group">
                      <label for="denda">Denda</label>
                      <input type="number" class="form-control" name="denda" id="denda" placeholder="Masukan Denda" required <?= @$customer['id_cus'] ? 'readonly' : ''; ?> value="<?php echo @$customer['id_cus'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="ket">Keterangan</label>
                      <input name="ket" class="form-control" rows="3" placeholder="Masukan Keterangan" style="height: 73px;"></textarea>
                    </div>
                  
                   <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                  </div>
              </div>
              <!-- /.card -->

            </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
    <?php
    require('template/footer.php');
    ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
