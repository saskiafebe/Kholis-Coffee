<nav class="navbar navbar-expand-lg" style="background-color: #DFB78C;">
    <div class="container-lg">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <img src="img/Logo 2.png" width="100" height="auto">
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <?php if ($hasil['level'] == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'aboutus') ? 'active link-light' : 'link-dark'; ?>" aria-current="page" href="aboutus" style="font-size: 20px;">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'shop') ? 'active link-light' : 'link-dark'; ?>" href="shop" style="font-size: 20px;">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'myorder') ? 'active link-light' : 'link-dark'; ?>" href="myorder" style="font-size: 20px;">My Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'cart') ? 'active link-light' : 'link-dark'; ?>" href="cart"><i class="bi bi-cart4" style="font-size: 24px;"></i></a>
                    </li>
                <?php } ?>


                <?php if ($hasil['level'] == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'dashboard') ? 'active link-light' : 'link-dark'; ?>" aria-current="page" href="dashboard" style="font-size: 20px;">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'product') ? 'active link-light' : 'link-dark'; ?>" href="product" style="font-size: 20px;">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'customer') ? 'active link-light' : 'link-dark'; ?>" href="customer" style="font-size: 20px;">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'order') ? 'active link-light' : 'link-dark'; ?>" href="order" style="font-size: 20px;">Order</a>
                    </li>
                <?php } ?>


                <li class="nav-item dropdown">
                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'profile') ? 'active link-light' : 'link-dark'; ?> dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person" style="font-size: 24px;"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item disabled"><?php echo $hasil['username']; ?></a></li>
                        <li><a class="dropdown-item" style="text-align: right;" href="#" data-bs-toggle="modal" data-bs-target="#ModalProfile">Profile</a></li>
                        <li><a class="dropdown-item" style="text-align: right;" href="logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>