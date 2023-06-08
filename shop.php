<?php
include "connect.php";
$query = mysqli_query($conn, "SELECT * FROM produk");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<style>
    .card:hover {
        box-shadow: 20px 20px 80px -44px #000;
        transition: .5s ease-in-out;
        cursor: pointer;
    }
</style>

<div class="container mt-5">
    <h1 class="text-center font-weight-normal">Kholis Coffee Catalog</h1>
</div>

<div class="container mt-3 d-flex mb-5">
    <div class="row row-cols-1 row-cols-md-4 g-5">
        <?php
        foreach ($result as $row) {
        ?>
            <div class="col">
                <div class="card">
                    <img src="img/<?php echo $row['gambar'] ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nama_produk'] ?></h5>
                        <p class="card-text"><?php echo $row['keterangan'] ?></p>
                        <p class="card-text text-info">IDR <?php echo $row['harga'] ?></p>
                        <button class="btn-sm text-light" style="background-color: #49281A; border: none;" data-bs-toggle="modal" data-bs-target="#ModalMore<?php echo $row['sku'] ?>">
                            More
                        </button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
if (empty($result)) {
    echo "No Data Available";
} else {
    foreach ($result as $row) {
?>
        <!-- Modal DESKRIPSI PRODUCT-->
        <div class="modal fade" id="ModalMore<?php echo $row['sku'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">PRODUCT DESCRIPTION</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="text-center mb-3">
                                    <img src="img/<?php echo $row['gambar'] ?>" class="img-thumbnail" alt="...">
                                </div>
                                <div class="form-floating mb-3">
                                    <p><?php echo $row['keterangan']?></p>
                                </div>
                                <div class="modal-footer">
                                    <button name="" value="12345" type="submit" class="btn btn text-light" style="background-color: #49281A; border: none;"><i class="bi bi-cart4"></i> ADD TO CART</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End DESKRIPSI PRODUCT -->
<?php
    }
}
?>