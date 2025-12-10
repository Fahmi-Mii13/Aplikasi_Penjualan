<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Daftar User</title>
    <link rel="stylesheet" href="tampilan.css">
</head>

<body>
    <?php
    session_start();
    include('crudbarang.php');
    if ($role == "operator") {
        echo "<script>alert('Hak Akses anda kurang')</script>";
        echo "<script>  window.location.replace('index.php')  </script>";
    } else {
    ?>
        <center>
            <h2>Daftar User</h2>
            <?php
            echo ("<h3 class='info'>User : $_SESSION[namauser] <a href='logoutuser.php' class='btn'>LOGOUT</a></h3>");
            if ($role == "superadmin") {
                echo "<a href='tambahuser.php' class='btn'>Tambah User</a><br><br>";

                $sql = "select * from user";
                $data = bacaUser($sql);
                if ($data == null) {
                    echo "Record Tidak Ditemukan";
                }
            } else if ($role == "admin") {
                $sql = "select * from user where role = 'operator'";
                $data = BacaUser($sql);
                if ($data == null) {
                    echo "record tidak ditemukan";
                }
            }
            ?>

            <table border=1>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
                <?php
                foreach ($data as $user) {
                    $username = $user['username'];
                    $password = $user['password'];
                    $userrole = $user['role'];
                    $nama = $user['nama'];

                    echo "
        <tr>
            <td>$username</td>
            <td>$password</td>
            <td>$userrole</td>
			<td>$nama</td>
            <td><a href = 'hapususer.php?username=$user[username]';> Hapus </a> |  <a href= 'ubahuser.php?username=$user[username]';> Edit </a></td>
        </tr>
        ";
                }
                ?>
            </table>
            <h2><a href="index.php" class="btn">Kembali</h2></a>
            <a href="#" class="footeruser">@TrianandaFahmi</a>
        </center>
    <?php
    }
    ?>
</body>

</html>