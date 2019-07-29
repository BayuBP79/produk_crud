<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        include 'koneksi.php';
        include 'style.php';
        ?>
    </head>
    <body>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah produk</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="admin/tambahDataPel.php">
                            <div class="container">                                
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="jk" class="form-control" placeholder="Jenis Kelamin">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="uname" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="level" class="form-control" value="2">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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