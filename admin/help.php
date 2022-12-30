<?php include('header.php'); ?>
    <?php
        if(!isset($_SESSION['admin_logged_in'])){
            header('location: login.php');
            exit();
        }

    ?>

    

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="bi bi-list-ul"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    
                    <a class="nav-link" href="order.php">
                        <div class="sb-nav-link-icon"><i class="bi bi-list-ul"></i></div>
                        Orders
                    </a>
                    <a class="nav-link" href="product.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Products
                    </a>
                    <a class="nav-link" href="account.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Account
                    </a>
                    <a class="nav-link" href="add_product.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Add New Product
                    </a>
                    <a class="nav-link" href="help.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Help
                    </a>
                    
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 h2">Admin Account </h1>
                <hr class="mx-auto">
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">

                    </div>

                </div>
            
                <div class="container mt-3">

                    <p>Please contact admin@gmail.com</p>
                    <p>Please call 12345678</p>
                    
                </div>
                




                <div style="height: 100vh"></div>
                <!--<div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page.
                        This is the end of the static navigation demo.</div></div>-->
                        
            </div>
            
        </main>
        
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
