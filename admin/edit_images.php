<?php include('header.php'); ?>

<?php 

if(isset($_GET['product_id'])){

    $product_id = $_GET['product_id'];
    $product_name = $_GET['product_name'];

}else{
    header('location: product.php');
}

?>
    

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
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
                        <h1 class="mt-4">Static Navigation</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Orders </li>
                        </ol>
                        
                        
        <!--Edit-->
        <section class="my-5 py-1">
            <div class="container text-left mt-2 pt-2">
                <h2 class="form-weight-bold">Update Product Images</h2>
                <hr class="mx-auto">
            </div>
            <div class="mx-auto container">
                <form id="edit-form" enctype= "multipart/form-data" method="POST" action="update_images.php">
                    <p style="color:red" class="text-center"><?php if(isset($_GET['error'])) {echo $_GET['error'];} ?></p>
                    <div class="form-group mt-2">

                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>"/>
                    <input type="hidden" name="product_name" value="<?php echo $product_name; ?>"/>

                    <div class="form-group mt-2">
                        <label>Image 1</label>
                        <input type="file" class="form-control" id="image1" name="image1" placeholder="Image 1" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 2</label>
                        <input type="file" class="form-control" id="image2" name="image2" placeholder="Image 2" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 3</label>
                        <input type="file" class="form-control" id="image3" name="image3" placeholder="Image 3" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 4</label>
                        <input type="file" class="form-control" id="image4" name="image4" placeholder="Image 1" required/>
                    </div>   
                        
                    
                    <div class="from-group mt-3">
                        <input type="submit" class="btn btn-primary" id="edit-btn" name="update_images" value="Update"/>
                    </div>

                    
                </form>
            </div>
        </section>




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
