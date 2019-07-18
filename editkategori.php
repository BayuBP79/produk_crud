<html>
    <head>
        <title>Tabel Karywan</title>
        <?php
        include 'koneksi.php';
        include 'style.php';
        ?>
    </head>
    <body>
        <div class="container" style="margin-top: 30px;">
            
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahKaryawan">Edit Kategori</h5>
                    </div>
                    <div class="modal-body">
                        <?php
                        $id = $_GET['id'];
                        $kode = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori='$id'");
                        while ($value = mysqli_fetch_assoc($kode)) {
                        ?>
                        <form class="" action="updatekategori.php" method="post">
                            <div class="form-group">
                                <input required="required" disabled="disabled" class="form-control" type="disabled" value="Mengedit Data <?= $value['id_kategori']; ?>">
                                <input type="hidden" name="id_kategori" value="<?= $value['id_kategori']; ?>">
                            </div>
                            <div class="form-group">
                                <input required="required" type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" value="<?php echo $value['nama_kategori']; ?>">
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
            
        </body>
    </html>