<?php
require('controller/islogin.php');

// menambahkan class database
require('db/database.php');
$db = new Database();

$username = @$_GET['username'];

// buat query untuk mengambil data di table
$db->query('SELECT * FROM admins WHERE username=:username');

// binding data query dengan variable
$db->bind(':username', $username);

// execute query ke database
$admin = $db->single();

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
            <h1>Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">
                  <?php
                  if ($username) {
                    echo 'Edit Admin';
                  } else {
                    echo 'Tambah Admin';
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
    
      <form enctype="multipart/form-data" action="<?php echo (@$username ? 'controller/update_admin.php' : 'controller/save_admin.php'); ?>" method= "POST">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">
                    <?php
                      if ($username) {
                        echo 'Edit Admin';
                      } else {
                        echo 'Tambah Admin';
                      }
                    ?>
                  </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                  <div class="card-body card dark-mode">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username " required <?= @$admin['username'] ? 'readonly' : ''; ?> value="<?php echo @$admin['username'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password" required value="<?php echo @$admin['password'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="jk">Jenis Kelamin</label>
                      <input type="number" class="form-control" name="jk" id="jk" placeholder="Masukan Jenis Kelamin" required value="<?php echo @$admin['jk'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                      <input type="number" class="form-control" name="status" id="status" placeholder="Masukan Status" required value="<?php echo @$admin['status'] ?>">
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
