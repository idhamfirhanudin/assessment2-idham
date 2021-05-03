<?php 
    session_start();

    if (empty($_SESSION['user'])) {
        header("location: login.php");
        exit;
    }
    
    require '../config.php';

    $conn = new mysqli($host, $username, $password, $dbname);
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data IP</title>

    <link rel="icon" type="image/png" href="../assets/img/tutwuri.jpg">

    <!-- Custom fonts for this template -->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<?php include 'view/header.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!------------------------->

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="font-weight-bold text-primary" style="margin-bottom: -5px;">Tambah Data IP</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="user" method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="judul">Jumlah IP</label>
                                        <input autocomplete="off" name="jumlah_ip" type="text" class="form-control" id="judul" placeholder="Masukkan jumlah IP anda"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Keterangan Smester</label>
                                        <input autocomplete="off" name="keterangan" type="text" class="form-control" id="deskripsi" placeholder="smester x"></input>
                                    </div>
                                <a href="ip.php" class="btn btn-danger btn-sm">Batal</a>
                                <button type="submit" name="submit" class="btn btn-success btn-sm">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!------------------------->

    </div>
    <!-- /.container-fluid -->

<?php include 'view/footer.php'; ?>

</html>

<?php 
	if (isset($_POST['submit'])) {
	    $jumlah_ip = htmlspecialchars($_POST['jumlah_ip']);
	    $keterangan = htmlspecialchars($_POST['keterangan']);

	    $sql = "INSERT INTO ip(jumlah_ip, keterangan) 
	    VALUES ('$jumlah_ip','$keterangan')";
	    $result = $conn->query($sql);
	    echo "<script> alert('Data berhasil ditambahkan');</script>";
	    echo "<script> location='ip.php'; </script>";
	}
 ?>