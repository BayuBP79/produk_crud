<html>
    <head>
        <title>tabel produk</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div class="container" style="margin-top: 30px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahKaryawan">Edit Pelanggan</h5>
                    </div>
                    <div class="modal-body">
                        <?php
                        $id = $_GET['id'];
                        $kode = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
                        while ($value = mysqli_fetch_assoc($kode)) {
                        ?>
                        <form method="post" action="updateDataPel.php">
                            <div class="container">
                                <div class="form-group row">
                                    <label>Nama</label>
                                    <input type="text" name="nama" value="<?php echo $value['namau']; ?>" class="form-control" id="inputPassword3" placeholder="Nama Produk">
                                    <input type="hidden" name="id" value="<?= $value['id']; ?>">
                                </div>
                                <div class="form-group row">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" placeholder="Alamat"><?php echo $value['alamat']; ?></textarea>
                                </div>
                                <div class="form-group row">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" name="jk" value="<?php echo $value['jk']; ?>" class="form-control" id="inputPassword3" placeholder="Jenis Kelamin">
                                </div>
                                <div class="form-group row">
                                    <label>Username</label>
                                    <input type="text" name="uname" value="<?php echo $value['uname']; ?>" class="form-control" id="inputPassword3" placeholder="Username">
                                </div>
                                <div class="form-group row">
                                    <label>Password</label>
                                    <input type="password" name="pass" value="<?php echo $value['pass']; ?>" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                                <div class="form-group row">
                                    <label>Level</label>
                                    <input type="text" name="level" value="<?php echo $value['level']; ?>" class="form-control" id="inputPassword3" placeholder="Level">
                                </div>
                                <?php
                                mysqli_close($conn); ?>
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>