<?php include('header.php'); ?>

   <?php

        if(isset($_GET['order_id'])){

                $order_id = $_GET['order_id'];
                $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id=?");
                $stmt->bind_param('i', $order_id);      
                $stmt->execute();

                $order = $stmt->get_result();//[]

            }else if(isset($_POST['edit_order'])){

                    $order_status=$_POST['order_status'];
                    $order_id=$_POST['order_id'];

                    $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
                    $stmt->bind_param('si',$order_status, $order_id);

                    if($stmt->execute()) {

                    header('location: index.php?order_updated=Product has been updated successfully');

                    }else{
                    header('location: product.php?order_failed=Error occured, try again');
                    }


                }else{
                    header('index.php');
                    exit;
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
        <section class="my-2 py-1">
            <div class="container text-left mt-2 pt-2">
            <hr class="mx-auto">
                <h2 class="form-weight-bold">Edit Orders</h2>
                
            </div>
            <div class="mx-auto container">
                <form id="edit-form" method="POST" action="edit_order.php">

                    <?php foreach ($order as $r) { ?>
                    <p style="color:red" class="text-center"><?php if(isset($_GET['error'])) {echo $_GET['error'];} ?></p>
                    <div class="form-group my-3">

                     <label>OrderId</label>
                        <p class="my-3"><?php echo $r['order_id']; ?></p>
                    </div>

                    <div class="form-group mt-3">
                        <label>OrderPrice</label>
                        <p class="my-3"><?php echo $r['order_cost']; ?></p>
                    </div>

                    <input type="hidden" name="order_id" value="<?php echo $r['order_id']; ?>" /> 

                    <div class="form-group my-3">
                        <label>Order Status</label>
                        <select class="form-select" required name="order_status">

                            <option value="not paid" <?php if($r['order_status']=='not paid'){echo "selected";} ?>> Not Paid</option>
                            <option value="paid" <?php if($r['order_status']=='paid'){echo "selected";} ?>>Paid</option>
                            <option value="shipped" <?php if($r['order_status']=='shipped'){echo "selected";} ?>>Shipped</option>
                            <option value="delivered" <?php if($r['order_status']=='delivered'){echo "selected";} ?>>Delivered</option>
                        </select>
                    </div>

                    <div class="form-group my-3">
                        <label>OrderDate</label>
                        <p class="m3-4"><?php echo $r['order_date']; ?></p>
                    </div>
                    
                    <div class="from-group mt-3">
                        <input type="submit" class="btn btn-primary" id="edit-btn" name="edit_order" value="Edit"/>
                    </div>

                    <?php } ?>
                    
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
