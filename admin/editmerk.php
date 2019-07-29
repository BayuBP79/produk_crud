<html>
    <head>
        <title>Tabel Karywan</title>

        <link rel="stylesheet" type="text/css" href="assets/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php
        include 'koneksi.php';
        include 'style.php';
         
        session_start();
        if($_SESSION['status']!="on"){
            header("location:../index.php?pesan=belum_login");
        } elseif ($_SESSION['level'] != 'admin') {
            header("location:../oraono.html");
        }
        ?>
    </head>
    <body>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaltambahMerk">Tambah Merk</h5>
                </div>
                <div class="modal-body">
                    <?php
                    $id = $_GET['id'];
                    $kode = mysqli_query($conn, "SELECT * FROM merk WHERE id_merk='$id'");
                    while ($value = mysqli_fetch_assoc($kode)) {
                    ?>
                    <form class="" action="updatemerk.php" method="post">
                        <div class="form-group">
                            <input disabled="disabled" class="form-control" type="disabled" value="ID = <?= $value['id_merk']; ?>  ">
                            <input type="hidden" name="id_merk" value="<?= $value['id_merk']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Merk :</label>
                            <input required="required" type="text" class="form-control" name="nama_merk" value="<?= $value['nama_merk']; ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="index.php" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="assets/jsku.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    </body>
</html>