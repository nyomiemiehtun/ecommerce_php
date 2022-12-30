<?php include('header.php'); ?>
    <?php
        if(!isset($_SESSION['admin_logged_in'])){
            header('location: login.php');
            exit();
        }

    ?>

    <?php 

                //1.determine page no
                if(isset($_GET['page_no']) && $_GET['page_no'] !=""){

                    //if user has already entered page then page number is the one that they selected
                    $page_no = $_GET['page_no'];
                }else{
                    //if user just entered the page then default page is 1
                    $page_no = 1;
                }
        
        
                
                    
                    
                //2.return number of products
                $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM orders");
                
                $stmt1->execute();
                $stmt1->bind_result($total_records);
                $stmt1->store_result();
                $stmt1->fetch();
        
        
                //3.products per page
                $total_records_per_page = 5;
                $offset = ($page_no -1) * $total_records_per_page;
                $privious_page = $page_no - 1;
                $next_page = $page_no + 1;
                $adjacents = "2";
                $total_no_of_pages = ceil($total_records/$total_records_per_page);
        
        
                //4.get all products
                $stmt2 = $conn->prepare("SELECT * FROM orders LIMIT $offset, $total_records_per_page");
                
                $stmt2->execute();
                $orders = $stmt2->get_result();//[]
        



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
                <h1 class="mt-4">Static Navigation</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Orders </li>
                </ol>

                <?php if(isset($_GET['order_updated'])) { ?>
                    <p class="text-center" style="color: green;"><?php echo $_GET['order_updated']; ?></p>
                <?php } ?>

                <?php if(isset($_GET['order_failed'])) { ?>
                    <p class="text-center" style="color: red;"><?php echo $_GET['order_failed']; ?></p>
                <?php } ?>


            <div class="card mb-4">
                <div class="card-body">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">User Phone</th>
                        <th scope="col">User Address</th>
                        <th scope="col">Edit</th>
                        <th scope="col"> Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) { ?>
                        <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['order_status']; ?></td>
                        <td><?php echo $order['user_id']; ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                        <td><?php echo $order['user_phone']; ?></td>
                        <td><?php echo $order['user_address']; ?></td>
                        <td><a class="btn btn-primary" href="edit_order.php?order_id=<?php echo $order['order_id']; ?>">Edit </a></td>
                        <td><a class="btn btn-danger">Delete </a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>

                </div>
            
            </div>
                
                <nav aria-label="Page navigation example" class="mx-auto">
                <ul class="pagination mt-5 mx-auto">

                    <li class="page-item <?php if($page_no<=1){echo 'disabled';} ?> ">
                    <a class="page-link" href="<?php if($page_no<=1){echo "#";}else {echo "?page_no=".($page_no - 1);}?>">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                    <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

                    <?php if($page_no >=3) { ?>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no;?>"> <?php echo $page_no;  ?></a></li>
                    <?php } ?>

                    <li class="page-item <?php if($page_no>= $total_no_of_pages){echo 'disabled';} ?> ">
                        <a class="page-link" href="<?php if($page_no>= $total_no_of_pages){echo "#";}else {echo "?page_no=".($page_no + 1);}?>">Next</a></li>
                </ul>
            </nav>




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
