<!DOCTYPE html>
<html>
    <head>
        <title>Edit Produk</title>

        <link rel="stylesheet" type="text/css" href="assets/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditProduk">Edit Produk</h5>
                </div>
                <div class="modal-body">
                    <form class="" action="update.php" method="post">
                        <div class="form-group">
                            <label>Kategori :</label>
                            <select required="required" class="custom-select" name="id_kategori">             
                                <?php
                                $kode = mysqli_query(mysqli_connect('localhost', 'root', '', 'onlen'), "SELECT * FROM kategori");
                                while ($aku = mysqli_fetch_assoc($kode)) {
                                echo "<option value=".$aku['id_kategori']." selected>". $aku['nama_kategori'] ."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <?php
                        include 'koneksi.php';
                        include 'style.php';
                        $id = $_GET['id'];
                        $kode = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id'");
                        while ($value = mysqli_fetch_assoc($kode)) {
                        ?>
                        <div class="form-group">
                            <label>Nama Produk :</label>
                            <input type="hidden" name="id_produk" value="<?= $value['id_produk']; ?>">
                            <input required="required" type="text" class="form-control" name="nama" value="<?= $value['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Warna Produk :</label>
                            <input required="required" type="text" class="form-control" name="warna" value="<?= $value['warna']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Produk :</label>
                            <input required="required" type="number" class="form-control" name="jumlah" value="<?= $value['jumlah']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Harga Produk :</label>
                            <input required="required" type="number" class="form-control" name="harga" value="<?= $value['harga']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Merk Produk</label>
                            <select required="required" class="custom-select" name="id_merk">
                                <?php
                                $kode = mysqli_query(mysqli_connect('localhost', 'root', '', 'onlen'), "SELECT * FROM merk");
                                while ($aku = mysqli_fetch_array($kode)) {
                                echo "<option value=".$aku['id_merk']." selected>". $aku['nama_merk'] ."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keterangan :</label>
                            <textarea required="required" style="margin-top: 20px;" name="keterangan" rows="5"   class="form-control"><?= $value['keterangan']; ?></textarea>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="index.php" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>