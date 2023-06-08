<?php
include "connect.php";
$user_id = (isset($_POST['user_id'])) ? htmlentities($_POST['user_id']) : "";

if (!empty($_POST['delete_user_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM user WHERE user_id = '$user_id'");

    if ($query) {
        $message = '<script>alert("Delete Successful");
        window.location="customer"</script>';
    } else {
        $message = '<script>alert("Cannot delete, please try again!")</script>';
    }
}
echo $message;
?>