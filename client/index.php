<html>
    <head>
        <title>Tabel Produk</title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php
        include 'koneksi.php';
        include 'style.php';
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php 
        session_start();
        if($_SESSION['status']!="on"){
            header("location:../index.php?pesan=belum_login");
        } elseif ($_SESSION['level'] != 'client') {
            header("location:../oraono.html");
        }
        ?>
    </head>
    <body>
        <div class="container" style="margin-top: 30px;">            
            <div class="row" style="margin-bottom: 10px; margin-top: 10px;">
                <h3>Produk yang Dibeli</h3>
                <button style="margin-left: 350px; align-self: center" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBeli">
                Beli +
                </button>
                <a style="margin-left: 10px; align-self: center;" href="logout.php" class="btn btn-primary">Logout</a>
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
                                <a class="btn btn-info btn-sm" href="selesai.php?id=<?= $row['id_transaksi']; ?>" title="Barang sudah sampai">Selesai</a>
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm btn-hapus" href='batal.php?id=<?php echo $row["id_transaksi"]; ?>' title="Batalkan Pesanan">Batal</a>
                            </td>
                            <?php }}
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            
            <!-- TAMBAH MODALS -->
            <div class="modal fade" id="tambahBeli" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahKaryawan">Tambah Data Pembelian</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form class="" action="tambahbeli.php" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" disabled="disabled" name="pembeli" value="<?= $_SESSION['username']; ?>">
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
            <!-- DELETE MODALS -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahKaryawan">Warning</h5>
                        </div>
                        <div class="modal-body">
                            Anda Yakin Ingin Membatalkan Pesanan?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                            <a id="btnmodalhapus" href='' class="btn btn-danger">Batalkan</a>
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
        </script>
    </body>
</html>