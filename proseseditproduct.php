<?php
include "connect.php";
$sku = (isset($_POST['sku'])) ? htmlentities($_POST['sku']) : "";
$nama_produk = (isset($_POST['nama_produk'])) ? htmlentities($_POST['nama_produk']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$stok = (isset($_POST['stok'])) ? htmlentities($_POST['stok']) : "";
$gambar = (isset($_POST['gambar'])) ? htmlentities($_POST['gambar']) : "";

$kode_rand = rand(10000, 99999) . "-";
$target_dir = "img/" . $kode_rand;
$target_file = $target_dir . basename($_FILES['gambar']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($_POST['edit_product_validate'])) {
    $cek = getimagesize($_FILES['gambar']['tmp_name']);
    if ($cek == false) {
        $message = "This is not an image file";
        $statusUploud = 0;
    } else {
        $statusUploud = 1;
        if (file_exists($target_file)) {
            $message = "The file already exists";
            $statusUploud = 0;
        } else {
            if ($_FILES['gambar']['size'] > 500000) {
                $message = "File is too large";
                $statusUploud = 0;
            } else {
                if ($imageType != 'jpg' && $imageType != 'png' && $imageType != 'jpeg' && $imageType != 'gif') {
                    $message = "Only JPG, PNG, JPEG and GIF images are supported";
                    $statusUploud = 0;
                }
            }
        }
    }

    if ($statusUploud == 0) {
        $message = '<script>alert("' . $message . ', Image is not supported");
                    window.location="product"</script>';
    } else {
        $select = mysqli_query($conn, "SELECT * FROM produk WHERE nama_produk='$nama_produk'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Product has been inputted");
            window.location="product"</script>';
        } else {
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
                $query = mysqli_query($conn, "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', keterangan='$keterangan', stok='$stok', gambar='" . $kode_rand . $_FILES['gambar']['name'] . "' WHERE sku='$sku'");
                if ($query) {
                    $message = '<script>alert("Input Successful");
                                window.location="product"</script>';
                } else {
                    $message = '<script>alert("Input Failed");
                                window.location="product"</script>';
                }
            } else {
                $message = '<script>alert("Something wrong, please check your input!")</script>';
            }
        }
    }
}
echo $message;
?>