<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mie Mie - Ecommerce</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>

<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
    <div class="container-fluid">
    
      <img class="logo" src="assets/imgs/logo.jpeg" alt="logo">
        <h2 class="brand">Orange</h2>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
      aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>

          <li class="nav-item">
            <a href="cart.php">
              <i class="fas fa-shopping-bag">
                <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity']!= 0) { ?>
                    <span class="cart-quantity"><?php echo $_SESSION['quantity']; ?></span>
                  <?php } ?>
              </i>
            </a>
          </li>

          <li class="nav-item">
            <a href="account.php"><i class="fas fa-user"></i></a>
          </li>
          
        </ul>
      </div>
    </div>
</nav>