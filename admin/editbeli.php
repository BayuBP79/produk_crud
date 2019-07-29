<!DOCTYPE html>
<html>
    <head>
        <title>Edit</title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php 
        include "koneksi.php"
        
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
                    <h5 class="modal-title" id="EditProduk">Edit Produk</h5>
                </div>
                <div class="modal-body">
                    <form class="" action="updatebeli.php" method="post">
                        <div class="form-group">
                            <label>Pembeli :</label>
                            <select required="required" class="custom-select" name="user">
                                <option>Siapa Yang Membeli</option>
                                ";
                                <?php
                                $kode = mysqli_query($conn, "SELECT * FROM user");
                                while ($aku = mysqli_fetch_assoc($kode)) {
                                echo "<option value=".$aku['id']." selected>". $aku['namau'] ."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Barang :</label>
                            <select required="required" class="custom-select" name="produk">
                                <option>Pilih Produk</option>
                                ";
                                <?php
                                $kode = mysqli_query($conn, "SELECT * FROM produk");
                                while ($aku = mysqli_fetch_assoc($kode)) {
                                echo "<option value=".$aku['id_produk']." selected>". $aku['nama'] ."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <?php
                        
                        
                        $id = $_GET['id'];
                        $kode = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi='$id'");
                        while ($value = mysqli_fetch_assoc($kode)) {
                        ?>
                        <div class="form-group">
                            <label>Jumlah Produk :</label>
                            <input required="required" type="number" class="form-control" name="jumlah" value="<?= $value['jumlah']; ?>">
                            <input type="hidden" class="form-control" name="id" value="<?= $value['id_transaksi']; ?>">
                        </div>
                        <?php } ?>
                        <div class="form-group">                            
                            <select required="required" class="custom-select" name="status">
                                <option>Pilih Status</option>
                                <option value="Diproses">Diproses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
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