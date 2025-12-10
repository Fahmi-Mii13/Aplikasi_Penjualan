<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tambah User</title>
    <link rel="stylesheet" href="tampilan.css">
</head>

<body>
    <h1>TAMBAH USER</h1>
    <?php
    session_start();
    include "crudBarang.php";
    if ($role == "operator") {
        echo "<script>alert('Hak Akses anda tidak sesuai')</script>";
        echo "<script> window.location = 'index.php' </script>";
    } else {
        echo ("<h3 class='info'>User : $_SESSION[namauser]  <a href='logoutuser.php' class='btn'>Logout</a></h3><br>");

    ?>
        <center>
            <table>
                <form action="prosestambahuser.php" method="POST">
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" /></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" /></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" name="nama" /></td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td><input type="radio" name="role" value="operator" />Operator

                            <?php if ($role == "superadmin") {
                                echo "<input type='radio' name='role' value='admin' />Admin</td>";
                            } ?>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><input type="submit" value="Tambah" /></center>
                        </td>
                    </tr>
                </form>
            </table>
            <br><br><a href="bacauser.php" class="btn">KEMBALI</a>
            <a href="#" class="footer">@TrianandaFahmi</a>
        </center>
    <?php } ?>
</body>

</html>