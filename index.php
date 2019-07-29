<!DOCTYPE html>
<html>
    <head>
        <title> Login </title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php
        include 'koneksi.php';
        include 'style.php';
        
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "Login gagal! username dan password salah!";
            }else if($_GET['pesan'] == "logout"){
                echo "Anda telah berhasil logout";
            }else if($_GET['pesan'] == "belum_login"){
                echo "Anda harus login untuk mengakses halaman web";
            }
        }
        ?>
    </head>
    <body>
        <div class="container">
            <center>
            <h3 style="margin-top: 30px;">Silahkan Login</h3>
            <form action="cek_login.php" method="post">
                <div class="form-group col-md-4">
                    <input required="required" name="uname" class="form-control" type="username" placeholder="Username">
                </div>
                <div class="form-group col-md-4">
                    
                    <input required="required" type="password" class="form-control" name="pass" placeholder="Password">
                </div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-primary">Masuk</button>
                    <br>
                    <br>
                    Belum Punya Akun?
                    <a href="register.php">Registrasi</a>
                </div>
            </form>
            </center>
        </div>
        
    </body>
</html>
