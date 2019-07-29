<html>
    <head>
        <title>Tabel Produk</title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        include 'koneksi.php';
        include 'style.php';
        ?>
        <?php 
        session_start();
        if($_SESSION['status'] != "on"){
            header("location:../index.php?pesan=belum_login");
        } elseif ($_SESSION['level'] != 'admin') {
            header("location:../oraono.html");
        }
        ?>
    </head>
    <body>
        <div class="container" style="margin-top: 30px;">
            <center>
            <a style="margin-bottom: 20px;" href="logout.php" class="btn btn-primary">Logout</a>
            </center>
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#produk">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kategori">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#merk">Merk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#pelanggan">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#transaksi">Transaksi</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="produk">
                    <div class="row" style="margin-bottom: 10px; margin-top: 10px;">
                        <h3 class="col-md-10">Tabel Produk</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahProduk">
                        Tambah +
                        </button>
                    </div>
                    <div class="d-flex flex-column flex-lg-row">
                        <table class="table table-hover table-responsive fixed">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Warna</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Merek</th>
                                    <th scope="col" colspan="2" style="width: 100px;" align="center">Pilihan</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $sql = "SELECT produk.*, merk.*, kategori.* FROM produk, merk, kategori WHERE produk.id_kategori = kategori.id_kategori AND merk.id_merk = produk.id_merk";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td scope="row"><?=$no++ ; ?></td>
                                    <td><?= $row['nama_kategori'] ; ?></td>
                                    <td><?= $row['nama'] ; ?></td>
                                    <td><?= $row['warna'] ; ?></td>
                                    <td><?= $row['jumlah'] ; ?></td>
                                    <td><?= $row['keterangan'] ; ?></td>
                                    <td><?= $row['harga'] ; ?></td>
                                    <td><?= $row['nama_merk'] ; ?></td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="edit.php?id=<?= $row['id_produk']; ?>">Edit</a>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm btn-hapus" href='hapus.php?id=<?php echo $row["id_produk"]; ?>'>Hapus</a>
                                    </td>
                                    <?php }}
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show" id="transaksi">
                    <div class="row" style="margin-bottom: 10px; margin-top: 10px;">
                        <h3 class="col-md-10">Tabel Produk</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBeli">
                        Tambah +
                        </button>
                    </div>
                    <div class="d-flex flex-column flex-lg-row">
                        <table class="table table-hover table-responsive fixed">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Pembeli</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Merk</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" colspan="2" style="width: 100px;" align="center">Pilihan</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $sql = "SELECT transaksi.Status, transaksi.id_transaksi, transaksi.tgl_transaksi, transaksi.jumlah, transaksi.harga, produk.nama, user.namau, merk.nama_merk
                            FROM transaksi
                            LEFT JOIN produk
                            ON transaksi.id_produk = produk.id_produk
                            LEFT JOIN user
                            ON transaksi.id_pelanggan = user.id
                            LEFT JOIN merk
                            ON produk.id_merk = merk.id_merk";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td scope="row"><?=$no++ ; ?></td>
                                    <td><?= $row['namau'] ; ?></td>
                                    <td><?= $row['nama'] ; ?></td>
                                    <td><?= $row['nama_merk'] ; ?></td>
                                    <td><?= $row['tgl_transaksi'] ; ?></td>
                                    <td><?= $row['jumlah'] ; ?></td>
                                    <td><?= $row['harga'] ; ?></td>
                                    <td><?= $row['Status'] ; ?></td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="editbeli.php?id=<?= $row['id_transaksi']; ?>">Edit</a>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm btn-hapus" href='hapusbeli.php?id=<?php echo $row["id_transaksi"]; ?>'>Hapus</a>
                                    </td>
                                    <?php }}
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="kategori">
                    <div class="row" style="margin-bottom: 10px; margin-top: 10px;">
                        <h3 class="col-md-10">Tabel Kategori</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKategori">
                        Tambah +
                        </button>
                    </div>
                    <div class="d-flex flex-column flex-lg-row">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col" colspan="2" align="center">Pilihan</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $sql = "SELECT * FROM kategori";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td scope="row"><?=$no++ ; ?></td>
                                    <td><?= $row['nama_kategori'] ; ?></td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="editkategori.php?id=<?= $row['id_kategori']; ?>">Edit</a> |
                                        <a data-toggle="modal" data-target="#DeleteKategori" class="btn btn-danger btn-sm btn-hapus-kategori" href='hapuskategori.php?id=<?php echo $row["id_kategori"]; ?>'>Hapus</a>
                                    </td>
                                </tr>
                                <?php }}
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="merk">
                    <div class="row" style="margin-bottom: 10px; margin-top: 10px;">
                        <h3 class="col-md-10">Tabel Merk</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahMerk">
                        Tambah +
                        </button>
                    </div>
                    <div class="d-flex flex-column flex-lg-row">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Merk</th>
                                    <th scope="col" colspan="2" align="center">Pilihan</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $sql = "SELECT * FROM merk";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td scope="row"><?=$no++ ; ?></td>
                                    <td><?= $row['nama_merk'] ; ?></td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="editmerk.php?id=<?= $row['id_merk']; ?>">Edit</a> |
                                        <a data-toggle="modal" data-target="#deleteMerkModal" class="btn btn-danger btn-sm btn-merk-hapus" href='hapusmerk.php?id=<?php echo $row["id_merk"]; ?>'>Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php }}
                            ?>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="pelanggan">
                    <div class="row" style="margin-bottom: 10px; margin-top: 10px;">
                        <h3 class="col-md-10">Tabel Pelanggan</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPelanggan">
                        Tambah +
                        </button>
                    </div>
                    <div class="d-flex flex-column flex-lg-row">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Password</th>
                                    <th scope="col" colspan="2" align="center">Pilihan</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $sql = "SELECT * FROM user";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td scope="row"><?=$no++ ; ?></td>
                                    <td><?= $row['namau']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['jk']; ?></td>
                                    <td><?= $row['uname']; ?></td>
                                    <td><?= $row['pass']; ?></td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="editDataPel.php?id=<?= $row['id']; ?>">Edit</a> |
                                        <a data-toggle="modal" data-target="#deleteMerkModal" class="btn btn-danger btn-sm btn-merk-hapus" href='HapusDataPel.php?id=<?php $row["id"]; ?>'>Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php }}
                            ?>
                        </table>
                    </div>
                </div>
                
                
            </div>
            
            <!-- TAMBAH MODALS -->
            <div class="modal fade" id="tambahProduk" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahKaryawan">Tambah Produk</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form class="" action="tambah.php" method="post">
                                <div class="form-group">
                                    <select required="required" class="custom-select" name="id_kategori">
                                        <option>Pilih Kategori</option>
                                        ";
                                        <?php
                                        $kode = mysqli_query($conn, "SELECT * FROM kategori");
                                        while ($aku = mysqli_fetch_assoc($kode)) {
                                        echo "<option value=".$aku['id_kategori'].">". $aku['nama_kategori'] ."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input required="required" type="text" class="form-control" name="nama" placeholder="Nama Produk">
                                </div>
                                <div class="form-group">
                                    <input required="required" type="text" class="form-control" name="warna" placeholder="Warna Produk">
                                </div>
                                <div class="form-group">
                                    <input required="required" type="number" class="form-control" name="jumlah" placeholder="Jumlah Produk">
                                </div>
                                <div class="form-group">
                                    <input required="required" type="number" class="form-control" name="harga" placeholder="Harga">
                                </div>
                                <div class="form-group">
                                    <select required="required" class="custom-select" name="id_merk">
                                        <option>Pilih Merek</option>
                                        <?php
                                        $kode = mysqli_query($conn, "SELECT * FROM merk");
                                        while ($aku = mysqli_fetch_array($kode)) {
                                        echo "<option value=".$aku['id_merk'].">". $aku['nama_merk'] ."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea required="required" style="margin-top: 20px;" name="keterangan" rows="5" placeholder="Keterangan" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="tambahMerk" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modaltambahMerk">Tambah Merk</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form class="" action="tambahmerk.php" method="post">
                                <div class="form-group">
                                    <input required="required" disabled="disabled" class="form-control" type="disabled" name="id_merk" placeholder="ID AUTO">
                                </div>
                                <div class="form-group">
                                    <input required="required" type="text" class="form-control" name="nama_merk" placeholder="Nama Merk">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahKaryawan">Tambah Kategori</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form class="" action="tambahkategori.php" method="post">
                                <div class="form-group">
                                    <input required="required" disabled="disabled" class="form-control" type="disabled" name="id_kategori" placeholder="ID AUTO">
                                </div>
                                <div class="form-group">
                                    <input required="required" type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="tambahPelanggan" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="tambahDataPel.php">
                                <div class="container">
                                    <div class="form-group">
                                        <input type="disabled" disabled="disabled" name="id" class="form-control" id="inputEmail3" placeholder="Auto ID">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control" id="inputPassword3" placeholder="Nama Produk">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="jk" class="form-control" id="inputPassword3" placeholder="Jenis Kelamin">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="uname" class="form-control" id="inputPassword3" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="level" class="form-control" id="inputPassword3" placeholder="Level">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="tambahBeli" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahKaryawan">Tambah Data Pembelian</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form class="" action="tambahbeli.php" method="post">
                                <div class="form-group">
                                    <select required="required" class="custom-select" name="user">
                                        <option>Siapa Yang Membeli</option>
                                        ";
                                        <?php
                                        $kode = mysqli_query($conn, "SELECT * FROM user");
                                        while ($aku = mysqli_fetch_assoc($kode)) {
                                        echo "<option value=".$aku['id'].">". $aku['namau'] ."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select required="required" class="custom-select" name="produk">
                                        <option>Pilih Produk</option>
                                        ";
                                        <?php
                                        $kode = mysqli_query($conn, "SELECT * FROM produk");
                                        while ($aku = mysqli_fetch_assoc($kode)) {
                                        echo "<option value=".$aku['id_produk'].">". $aku['nama'] ."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="tambahPelanggan" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="tambahDataPel.php">
                                <div class="container">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Id</label>
                                        <div class="col-sm-10">
                                            <input type="disabled" disabled="disabled" name="id" class="form-control" id="inputEmail3" placeholder="Auto ID">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" id="inputPassword3" placeholder="Nama Produk">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="jk" class="form-control" id="inputPassword3" placeholder="Jenis Kelamin">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="uname" class="form-control" id="inputPassword3" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Level</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="level" class="form-control" id="inputPassword3" placeholder="Level">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DELETE MODALS -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahKaryawan">Warning</h5>
                        </div>
                        <div class="modal-body">
                            Anda Yakin Ingin Menghapus Data ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                            <a id="btnmodalhapus" href='' class="btn btn-danger">hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="deleteMerkModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modaltambahMerk">Warning</h5>
                        </div>
                        <div class="modal-body">
                            Anda Yakin Ingin Menghapus Data ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                            <a id="btnmodalhapusmerk" href='' class="btn btn-danger">hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="DeleteKategori" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahKaryawan">Warning</h5>
                        </div>
                        <div class="modal-body">
                            Anda Yakin Ingin Menghapus Data ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                            <a id="btnmodalhapuskategori" href='' class="btn btn-danger">hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahKaryawan">Warning</h5>
                        </div>
                        <div class="modal-body">
                            Anda Yakin Ingin Menghapus Data ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                            <a id="btnmodalhapus" href='' class="btn btn-danger">hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <?php  mysqli_close($conn);
        ?>
        <script type="text/javascript" src="assets/jsku.js"></script>
        <script type="text/javascript">
        $(function(){
            $('.btn-hapus').on('click', function(e){
                $('#btnmodalhapus').attr('href', e.target.href);
            });
            });
            $(function(){
                $('.btn-merk-hapus').on('click', function(e){
                    $('#btnmodalhapusmerk').attr('href', e.target.href);
                });
            });
            $(function(){
                $('.btn-hapus-kategori').on('click', function(e){
                    $('#btnmodalhapuskategori').attr('href', e.target.href);
                });
            });
        
        </script>
    </body>
</html>