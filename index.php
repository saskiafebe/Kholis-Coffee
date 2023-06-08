  <?php
  session_start();


  if (isset($_GET['x']) && $_GET['x'] == 'aboutus') {
    $page = 'aboutus.php';
    include "main.php";
  } elseif (isset($_GET['x']) && $_GET['x'] == 'shop') {
    $page = 'shop.php';
    include "main.php";
  } elseif (isset($_GET['x']) && $_GET['x'] == 'myorder') {
    $page = 'myorder.php';
    include "main.php";
  } elseif (isset($_GET['x']) && $_GET['x'] == 'cart') {
    $page = 'cart.php';
    include "main.php";


  } elseif (isset($_GET['x']) && $_GET['x'] == 'dashboard') {
    if ($_SESSION['level_kholiscoffee'] == 1) {
      $page = 'dashboard.php';
      include "main.php";
    } else {
      $page = 'aboutus.php';
      include "main.php";
    }
  } elseif (isset($_GET['x']) && $_GET['x'] == 'product') {
    if ($_SESSION['level_kholiscoffee'] == 1) {
      $page = 'product.php';
      include "main.php";
    } else {
      $page = 'aboutus.php';
      include "main.php";
    }
  } elseif (isset($_GET['x']) && $_GET['x'] == 'customer') {
    if ($_SESSION['level_kholiscoffee'] == 1) {
      $page = 'customer.php';
      include "main.php";
    } else {
      $page = 'aboutus.php';
      include "main.php";
    }
  } elseif (isset($_GET['x']) && $_GET['x'] == 'order') {
    if ($_SESSION['level_kholiscoffee'] == 1) {
      $page = 'order.php';
      include "main.php";
    } else {
      $page = 'aboutus.php';
      include "main.php";
    }

  } elseif (isset($_GET['x']) && $_GET['x'] == 'registrasi') {
    include "registrasi.php";
  } elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
  } elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    include "proseslogout.php";
  } else {
    $page = 'aboutus.php';
    include "login.php";
  }
  ?>