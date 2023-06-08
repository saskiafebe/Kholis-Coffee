<?php
include "connect.php";
$user_id = (isset($_POST['user_id'])) ? htmlentities($_POST['user_id']) : "";
$fullname = (isset($_POST['fullname'])) ? htmlentities($_POST['fullname']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$no_telepon = (isset($_POST['no_telepon'])) ? htmlentities($_POST['no_telepon']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";

if (!empty($_POST['edit_user_validate'])) {
    $query = mysqli_query($conn, "UPDATE user SET fullname = '$fullname', username = '$username', no_telepon = '$no_telepon', alamat = '$alamat', level = '$level' WHERE user_id = '$user_id'");

    if ($query) {
        $message = '<script>alert("Update Successful");
        window.location="customer"</script>';
    } else {
        $message = '<script>alert("Update failed, please check your data!")</script>';
    }
}
echo $message;
?>