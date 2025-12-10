<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="tampilan.css">
</head>

<body>
    <h1>EDIT USER</h1>

    <?php
    session_start();
    include "crudbarang.php";

    if ($role == "operator") {
        echo "<script>alert('Hak Akses anda tidak sesuai')</script>";
        echo "<script> window.location='index.php' </script>";
        exit();
    }

    $username = $_GET['username'];
    $sql = "SELECT * FROM user WHERE username='$username'";
    $data = bacaUser($sql);

    if ($data == null) {
        echo "<script>alert('User tidak ditemukan')</script>";
        echo "<script> window.location='bacauser.php' </script>";
        exit();
    }

    $user = $data[0];

    echo ("<h3 class='info'>User : $_SESSION[namauser] <a href='logoutuser.php' class='btn'>Logout</a></h3><br>");
    ?>

    <center>
        <table>
            <form action="prosesubahuser.php" method="POST">

                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo $user['username']; ?>" readonly></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Kosongkan jika tidak ingin diubah"></td>
                </tr>

                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="<?php echo $user['nama']; ?>"></td>
                </tr>

                <tr>
                    <td>Role</td>
                    <td>
                        <input type="radio" name="role" value="operator"
                            <?php if ($user['role'] == "operator") echo "checked"; ?>> Operator

                        <?php
                        if ($role == "superadmin") {
                            echo "<input type='radio' name='role' value='admin' ";
                            if ($user['role'] == "admin") echo "checked";
                            echo "> Admin";
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <center><input type="submit" value="Update" class="btn"></center>
                    </td>
                </tr>

            </form>
        </table>

        <br><br><a href="bacauser.php" class="btn">KEMBALI</a>
        <a href="#" class="footer">@TrianandaFahmi</a>
    </center>

</body>

</html>