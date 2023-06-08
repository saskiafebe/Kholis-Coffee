<?php
include "connect.php";
$query = mysqli_query($conn, "SELECT * FROM user");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="container">
    <div class="row">
        <div class="col mt-5 d-flex justify-content-end">
            <button class="btn text-light" style="background-color: #49281A; border: none;" data-bs-toggle="modal" data-bs-target="#ModalAddAdmin">
                Add USER
            </button>
        </div>
    </div>

    <!-- Modal ADD USER -->
    <div class="modal fade" id="ModalAddAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">FORM USER ID</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate action="prosesinputuser.php" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input name="fullname" type="text" class="form-control" id="floatingInput" placeholder="Full Name" required>
                                    <label for="floatingInput">Full Name</label>
                                    <div class="invalid-feedback">
                                        PLEASE ENTER FULL NAME
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                    <label for="floatingInput">Email</label>
                                    <div class="invalid-feedback">
                                        PLEASE ENTER EMAIL
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="no_telepon" type="number" class="form-control" id="floatingInput" placeholder=" 08-XXXXX" required>
                            <label for="floatingInput">Phone Number</label>
                            <div class="invalid-feedback">
                                PLEASE ENTER PHONE NUMBER
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="alamat" type="text" class="form-control" id="floatingInput" placeholder="Address" required>
                            <label for="floatingInput">Address</label>
                            <div class="invalid-feedback">
                                PLEASE ENTER ADDRESS
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                            <div class="invalid-feedback">
                                PLEASE ENTER PASSWORD
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="level" class="form-select" aria-label="Default select example" required>
                                <option selected hidden value="">Choose Level</option>
                                <option value="1">Owner/Admin</option>
                                <option value="2">Customer</option>
                            </select>
                            <label for="floatingInput">Level User</label>
                            <div class="invalid-feedback">
                                PLEASE CHOOSE LEVEL USER
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="input_user_validate" value="12345" type="submit" class="btn btn text-light" style="background-color: #49281A; border: none;">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End ADD USER -->

    <?php
    if (empty($result)) {
        echo "No Data Available";
    } else {
        foreach ($result as $row) {
            // Rest of the code for modals
    ?>
            <!-- Modal EDIT ID-->
            <div class="modal fade" id="ModalEditID<?php echo $row['user_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT USER ID</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="prosesedituser.php" method="POST">
                                <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input name="fullname" type="text" class="form-control" id="floatingInput" placeholder="Full Name" value="<?php echo $row['fullname'] ?>" required>
                                            <label for="floatingInput">Full Name</label>
                                            <div class="invalid-feedback">
                                                PLEASE ENTER FULL NAME
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $row['username'] ?>" required>
                                            <label for="floatingInput">Email</label>
                                            <div class="invalid-feedback">
                                                PLEASE ENTER EMAIL
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="no_telepon" type="number" class="form-control" id="floatingInput" placeholder=" 08-XXXXX" value="<?php echo $row['no_telepon'] ?>" required>
                                    <label for="floatingInput">Phone Number</label>
                                    <div class="invalid-feedback">
                                        PLEASE ENTER PHONE NUMBER
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="alamat" type="text" class="form-control" id="floatingInput" placeholder="Address" value="<?php echo $row['alamat'] ?>" required>
                                    <label for="floatingInput">Address</label>
                                    <div class="invalid-feedback">
                                        PLEASE ENTER ADDRESS
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="level" class="form-select" aria-label="Default select example" required>
                                        <?php
                                        $data = array("Owner/Admin", "Customer");
                                        foreach ($data as $key => $value) {
                                            if ($row['level'] == $key + 1) {
                                                echo "<option selected value = " . ($key + 1) . ">$value</option>";
                                            } else {
                                                echo "<option value = " . ($key + 1) . ">$value</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingInput">Level User</label>
                                    <div class="invalid-feedback">
                                        PLEASE CHOOSE LEVEL USER
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn text-light" name="edit_user_validate" value="12345" style="background-color: #49281A; border: none;">SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End EDIT ID -->

            <!-- Modal DELETE EDIT ID-->
            <div class="modal fade" id="ModalDeleteID<?php echo $row['user_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ARE YOU SURE WANT TO DELETE THIS USER ID?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="prosesdeleteuser.php" method="POST">
                                <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input name="fullname" type="text" class="form-control" id="floatingInput" placeholder="Full Name" value="<?php echo $row['fullname'] ?>" disabled>
                                            <label for="floatingInput">Full Name</label>
                                            <div class="invalid-feedback">
                                                PLEASE ENTER FULL NAME
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $row['username'] ?>" disabled>
                                            <label for="floatingInput">Email</label>
                                            <div class="invalid-feedback">
                                                PLEASE ENTER EMAIL
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="level" class="form-select" aria-label="Default select example" disabled>
                                        <?php
                                        $data = array("Owner/Admin", "Customer");
                                        foreach ($data as $key => $value) {
                                            if ($row['level'] == $key + 1) {
                                                echo "<option selected value = " . ($key + 1) . ">$value</option>";
                                            } else {
                                                echo "<option value = " . ($key + 1) . ">$value</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingInput">Level User</label>
                                    <div class="invalid-feedback">
                                        PLEASE CHOOSE LEVEL USER
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <?php
                                    if ($row['username'] == $_SESSION['username_kholiscoffee']) {
                                        echo "<div class='alert alert-danger'>Cannot delete yourself</div>";
                                    }
                                    ?>
                                    <button type="submit" class="btn btn-danger text-light" name="delete_user_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_kholiscoffee']) ? 'disabled' : ''; ?>>DELETE</button>
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
                        <th scope="col">Full Name</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Level</th>
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
                                <td><?php echo $row['fullname'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['no_telepon'] ?></td>
                                <td><?php echo $row['alamat'] ?></td>
                                <td><?php
                                    if ($row['level'] == 1) {
                                        echo "Admin";
                                    } elseif ($row['level'] == 2) {
                                        echo "Customer";
                                    }
                                    ?></td>
                                <td class="d-flex">
                                    <button class="btn btn-sm text-light me-2" style="background-color: #49281A; border: none;" data-bs-toggle="modal" data-bs-target="#ModalEditID<?php echo $row['user_id'] ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm text-light" data-bs-toggle="modal" data-bs-target="#ModalDeleteID<?php echo $row['user_id'] ?>">
                                        <i class="bi bi-trash"></i>
                                    </button>
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