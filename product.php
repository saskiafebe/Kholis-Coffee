<?php
include "connect.php";
$query = mysqli_query($conn, "SELECT * FROM produk");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="container">
    <div class="row">
        <div class="col mt-5 d-flex justify-content-end">
            <button class="btn text-light" style="background-color: #49281A; border: none;" data-bs-toggle="modal" data-bs-target="#ModalAddProduct">
                ADD PRODUCT
            </button>
        </div>
    </div>

    <!-- Modal ADD PRODUCT -->
    <div class="modal fade" id="ModalAddProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">FORM PRODUCT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate action="prosesinputproduct.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input name="nama_produk" type="text" class="form-control" id="floatingInput" placeholder="Product's Name" required>
                                    <label for="floatingInput">Product's Name</label>
                                    <div class="invalid-feedback">
                                        PLEASE ENTER PRODUCTS'S NAME
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input name="harga" type="text" class="form-control" id="floatingInput" placeholder="Product's Price" required>
                                    <label for="floatingInput">Price</label>
                                    <div class="invalid-feedback">
                                        PLEASE ENTER PRODUCTS'S PRICE
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="stok" type="number" class="form-control" id="floatingInput" placeholder=" 00" required>
                            <label for="floatingInput">Stock</label>
                            <div class="invalid-feedback">
                                PLEASE ENTER STOCK
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="keterangan" type="text" class="form-control" id="" placeholder="Description" style="height: 100px;" required></textarea>
                            <label for="floatingInput">Description</label>
                            <div class="invalid-feedback">
                                PLEASE ENTER DESCRIPTION
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="gambar" type="file" class="form-control" id="floatingInput" placeholder="Images" required>
                            <div class="invalid-feedback">
                                PLEASE ENTER IMAGE
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="input_product_validate" value="12345" type="submit" class="btn btn text-light" style="background-color: #49281A; border: none;">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End ADD PRODUCT -->

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
                        <th scope="col">Product's Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Images</th>
                        <th scope="col">Action</th>
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
                                <td><?php echo $row['nama_produk'] ?></td>
                                <td><?php echo $row['harga'] ?></td>
                                <td><?php echo $row['keterangan'] ?></td>
                                <td><?php echo $row['stok'] ?></td>
                                <td>
                                    <div style="width: 90px"><img src="img/<?php echo $row['gambar'] ?>" class="img-thumbnail" alt="..."></div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm text-light me-2" style="background-color: #49281A; border: none;" data-bs-toggle="modal" data-bs-target="#ModalEditProduct<?php echo $row['sku'] ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm text-light" data-bs-toggle="modal" data-bs-target="#ModalDeleteProduct<?php echo $row['sku'] ?>">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
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