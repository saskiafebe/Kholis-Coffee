<?php
session_start();
include "connect.php";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$comment = (isset($_POST['comment'])) ? htmlentities($_POST['comment']) : "";

if (!empty($_POST['input_comment_validate'])) {
    $query = mysqli_query($conn, "INSERT INTO forum (nama, comment) values ('$nama', '$comment')");
    if ($query) {
        $message = '<script>alert("Comment Published");
            window.location="aboutus"</script>';
    } else {
        $message = '<script>alert("Something wrong, please check try again!")</script>';
    }
}
echo $message;
?>