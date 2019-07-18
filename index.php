<html>
    <head>
        <title>Tabel Produk</title>
        <?php
        include 'koneksi.php';
        include 'style.php';
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">        
    </head>
    <body>
        <div class="container" style="margin-top: 30px;">
            <button class="tablink" onclick="openPage('Produk', this, 'grey')" id="defaultOpen">Produk</button>
            <button class="tablink" onclick="openPage('Merk', this, 'grey')">Merk</button>
            <button class="tablink" onclick="openPage('Kategori', this, 'grey')">Kategori</button>
            <div id="Produk" class="tabcontent">
                <h3>Produk</h3>
                <div class="row" style="margin-bottom: 10px;">
                    <h3 class="col-md-10">Tabel Produk</h3>
                    <button type="button" class="btn btn-primary col-md-1" data-toggle="modal" data-target="#tambahProduk">
                    Tambah +
                    </button>
                </div>
                <table class="table table-hover">
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
                            <th scope="col" colspan="2" align="center">Pilihan</th>
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
                                <a class="btn btn-info btn-sm" href="edit.php?id=<?= $row['id_produk']; ?>">Edit</a> |
                                <a data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm btn-hapus" href='hapus.php?id=<?php echo $row["id_produk"]; ?>'>Hapus</a>
                            </td>
                            <?php }}                              
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="Merk" class="tabcontent">
                <h3>Merk</h3>
                <div class="row" style="margin-bottom: 10px;">
                    <h3 class="col-md-10">Tabel Merk</h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahMerk">
                    Tambah +
                    </button>
                </div>
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
            <div id="Kategori" class="tabcontent">
                <h3>Kategori</h3>
                <div class="row" style="margin-bottom: 10px;">
                    
                    <h3 class="col-md-10">Tabel Kategori</h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKategori">
                    Tambah +
                    </button>
                </div>
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
            <div id="About" class="tabcontent">
                <h3>About</h3>
                <p>Who we are and what we do.</p>
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
        </div>
        <?php  mysqli_close($conn); 
        ?>

        <script type="text/javascript" src="assets/jsku.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        function openPage(pageName,elmnt,color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
                document.getElementById(pageName).style.display = "block";
                elmnt.style.backgroundColor = color;
        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        </script>
    </body>
</html>