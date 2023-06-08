<?php
include "connect.php";
$fullname = (isset($_POST['fullname'])) ? htmlentities($_POST['fullname']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$no_telepon = (isset($_POST['no_telepon'])) ? htmlentities($_POST['no_telepon']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";

if (!empty($_POST['input_user_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Email has been registered");
        window.location="customer"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO user (fullname, username, no_telepon, alamat, password, level) values ('$fullname', '$username', '$no_telepon', '$alamat', '$password', '$level')");
        if ($query) {
            $message = '<script>alert("Input Successful");
            window.location="customer"</script>';
        } else {
            $message = '<script>alert("Something wrong, please check your input!")</script>';
        }
    }
}
echo $message;
?>