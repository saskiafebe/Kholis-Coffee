<?php
include "connect.php";
$query = mysqli_query($conn, "SELECT pesanan.*, fullname, total FROM pesanan
        LEFT JOIN user ON user.user_id = pesanan.user_id
        LEFT JOIN keranjang ON keranjang.qty = pesanan.qty_produk
        LEFT JOIN produk ON produk.harga = pesanan.harga_produk
        GROUP BY pesanan_id");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="container">
    <div class="row">
        <div class="col mt-5 d-flex justify-content-end">
            <!-- <button class="btn text-light" style="background-color: #49281A; border: none;" data-bs-toggle="modal" data-bs-target="#ModalAddProduct">
                Add PRODUCT
            </button> -->
        </div>
    </div>

    <?php
    if (empty($result)) {
        echo "No Data Available";
    } else {
        foreach ($result as $row) {
    ?>
            <!-- Modal EDIT PRODUCT-->
            <div class="modal fade" id="ModalEditProduct<?php echo $row['sku'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT PRODUCT</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proseseditproduct.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="sku" value="<?php echo $row['sku'] ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input name="nama_produk" type="text" class="form-control" id="floatingInput" placeholder="Product's Name" value="<?php echo $row['nama_produk'] ?>" required>
                                            <label for="floatingInput">Product's Name</label>
                                            <div class="invalid-feedback">
                                                PLEASE ENTER PRODUCTS'S NAME
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input name="harga" type="text" class="form-control" id="floatingInput" placeholder="Product's Price" value="<?php echo $row['harga'] ?>" required>
                                            <label for="floatingInput">Price</label>
                                            <div class="invalid-feedback">
                                                PLEASE ENTER PRODUCTS'S PRICE
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="stok" type="number" class="form-control" id="floatingInput" placeholder="00" value="<?php echo $row['stok'] ?>" required>
                                    <label for="floatingInput">Stock</label>
                                    <div class="invalid-feedback">
                                        PLEASE ENTER STOCK
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="keterangan" type="text" class="form-control" id="floatingInput" placeholder="Description" value="<?php echo $row['keterangan'] ?>" required>
                                    <label for="floatingInput">Description</label>
                                    <div class="invalid-feedback">
                                        PLEASE ENTER DESCRIPTION
                                    </div>
                                </div>
                                <div style="width: 90px"><img src="img/<?php echo $row['gambar'] ?>" class="img-thumbnail" alt="..."></div>
                                <div class="input-group mb-3">
                                    <input name="gambar" type="file" class="form-control" id="floatingInput" placeholder="Images">
                                    <div class="invalid-feedback">
                                        PLEASE ENTER IMAGE
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button name="edit_product_validate" value="12345" type="submit" class="btn btn text-light" style="background-color: #49281A; border: none;">SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End EDIT PRODUCT -->

            <!-- Modal DELETE EDIT ID-->
            <div class="modal fade" id="ModalDeleteProduct<?php echo $row['sku'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ARE YOU SURE WANT TO DELETE THIS PRODUCT?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="prosesdeleteproduct.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="sku" value="<?php echo $row['sku'] ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input name="nama_produk" type="text" class="form-control" id="floatingInput" placeholder="Product's Name" value="<?php echo $row['nama_produk'] ?>" disabled>
                                            <label for="floatingInput">Product's Name</label>
                                            <div class="invalid-feedback">
                                                PLEASE ENTER PRODUCTS'S NAME
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input name="harga" type="text" class="form-control" id="floatingInput" placeholder="Product's Price" value="<?php echo $row['harga'] ?>" disabled>
                                            <label for="floatingInput">Price</label>
                                            <div class="invalid-feedback">
                                                PLEASE ENTER PRODUCTS'S PRICE
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="stok" type="number" class="form-control" id="floatingInput" placeholder="00" value="<?php echo $row['stok'] ?>" disabled>
                                    <label for="floatingInput">Stock</label>
                                    <div class="invalid-feedback">
                                        PLEASE ENTER STOCK
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="keterangan" type="text" class="form-control" id="floatingInput" placeholder="Description" value="<?php echo $row['keterangan'] ?>" disabled>
                                    <label for="floatingInput">Description</label>
                                    <div class="invalid-feedback">
                                        PLEASE ENTER DESCRIPTION
                                    </div>
                                </div>
                                <div style="width: 90px"><img src="img/<?php echo $row['gambar'] ?>" class="img-thumbnail" alt="..."></div>
                                <div class="modal-footer">
                                    <button name="delete_product_validate" value="12345" type="submit" class="btn btn text-light" style="background-color: #49281A; border: none;">DELETE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End DELETE EDIT ID -->
    <?php
        }
    }
    ?>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product's Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (empty($result)) {
                        echo "";
                    } else {
                        foreach ($result as $row) {
                    ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['pesanan_id'] ?></td>
                                <td><?php echo $row['fullname'] ?></td>
                                <td><?php echo $row['nama_produk'] ?></td>
                                <td><?php echo $row['qty_produk'] ?></td>
                                <td><?php echo $row['harga_produk'] ?></td>
                                <td><?php echo $row['total'] ?></td>
                                <td><?php echo $row['tanggal'] ?></td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm text-light me-2" style="background-color: orange; border: none;" data-bs-toggle="modal" data-bs-target="#ModalEditProduct<?php echo $row['sku'] ?>">
                                            <i class="bi bi-hand-thumbs-up"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm text-light" style="background-color: green; border: none;" data-bs-toggle="modal" data-bs-target="#ModalDeleteProduct<?php echo $row['sku'] ?>">
                                            <i class="bi bi-check2-circle"></i>
                                        </button>
                                    </div>
                                </td>
                                <td><?php echo $row['status'] ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>