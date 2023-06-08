<?php
include "connect.php";
$sku = (isset($_POST['sku'])) ? htmlentities($_POST['sku']) : "";

if (!empty($_POST['delete_product_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM produk WHERE sku = '$sku'");

    if ($query) {
        $message = '<script>alert("Delete Successful");
        window.location="product"</script>';
    } else {
        $message = '<script>alert("Cannot delete, please try again!");
        window.location="product"</script>';
    }
}
echo $message;
?>