<?php
session_start();
include "connect.php";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";
if (!empty($_POST['submit_validate'])) {
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' && password = '$password'");
    $hasil = mysqli_fetch_array($query); 
    if ($hasil) {
        $_SESSION['username_kholiscoffee'] = $username;
        $_SESSION['level_kholiscoffee'] = $hasil['level'];
        header('location:aboutus');
    } else {
?>
        <script>
            alert('username and password not valid');
            window.location = 'login.php'
        </script>
<?php
    }
}
?>