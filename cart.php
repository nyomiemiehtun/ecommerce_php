<?php 

    session_start();
    if(isset($_POST['add_to_cart'])){

        //if user has already added a product to cart
        if(isset($_SESSION['cart'])){
            
            $products_array_ids = array_column($_SESSION['cart'],"product_id");//[2,3,4,10,15]
            //if product has already been added to cart or not

            if(!in_array($_POST['product_id'],$products_array_ids)){

                    $product_id = $_POST['product_id'];
                    $product_array = array(
                                    'product_id'=>$_POST['product_id'],
                                    'product_name'=>$_POST['product_name'],
                                    'product_price'=>$_POST['product_price'],
                                    'product_image'=>$_POST['product_image'],
                                    'product_quantity'=>$_POST['product_quantity']
                                            );

                    $_SESSION['cart'][$product_id]=$product_array;
                
                //product has already been added
            }else{
                    echo '<script>alert("Product was already to cart");</script>';
                }

                
               
        
                //if this is the first product
        }else{
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];

            $product_array = array('product_id'=>$product_id,
                                    'product_name'=>$product_name,
                                    'product_price'=>$product_price,
                                    'product_image'=>$product_image,
                                    'product_quantity'=>$product_quantity
                        );

            $_SESSION['cart'][$product_id]=$product_array;
            //[2=>[],3=>[],5=>[]]
                
         }





    //remove product from cart
}else if(isset($_POST['remove_product'])){

    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$_product_id]);

}else{
        header('location:index.php');
    }
    
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Mie Mie - Ecommerce</title>
<style>

.cart table{
    width:100%;
    border-collapse:collapse;
}
.cart .product-info{
    display:flex;
    flex-wrap:wrap;
}
.cart th{
    text-align:left;
    padding:5px 10px;
    color:#fff;
    background-color:#fb774b;
}
.cart td{
    padding:10px 20px;
}
.cart td img{
    width:80px;
    height:80px;
    margin-right:10px;
}
.cart td input{
    width:40px;
    height:30px;
    padding:5px;
}
.cart td a{
    color:#fb774b;
}
.cart .remove-btn{
    color:#fb774b;
    text-decoration:none;
    font-size:14px;
    background_color:#fff;
    border:none;
    width:100%;
}
.cart .edit-btn{
    color:#fb774b;
    text-decoration: none;
    font-size:15px;
}
.cart .product-info p{
    margin:3px;
}
.cart-total{
    display:flex;
    justify-content:flex-end;
}
 .cart-total table{
    width:100%;
    max-width:500px;
    border-top:3px solid #fb774b;
 }   
 td:last-child{
    text-align:right;
 }
 th:last-child{
    text-align:right;
 }
 .checkout-btn{
    background-color:#fb774b;
    color:#fff;
}
 .checkout-container{
    display:flex;
    justify-content: flex-end;
 } 



</style>
    
</head>
<body>


<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
    <div class="container-fluid">
    
      <img class="logo" src="assets/imgs/logo.jpeg" alt="logo">
        <h2 class="brand">Orange</h2>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.html">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
          <li class="nav-item">
            <i class="fas fa-shopping-bag"></i>
          </li>
          <li class="nav-item">
            <i class="fas fa-user"></i>
          </li>
          
        </ul>
      </div>
    </div>
</nav>


<!--Cart-->
    <section class="cart container my-5 py-5">
        <div class="conatiner mt-5">
            <h2 class="font-weight-bold">Your Cart</h2>
            <hr>
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
             </tr>


             <?php foreach($_SESSION['cart'] as $key => $value) {?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $value['product_image'];?>"/>
                        <div>
                            <p><?php echo $value['product_name'];?></p>
                            <small><span>$</span><?php echo $value['product_price'];?></small>
                            <br>
                            <form method="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>
                                <input type="submit" name="remove_product" class="remove-btn" value="remove"/>
                            
                            </form>
                        </div>
                    </div>
                </td>

                <td>
                    <input type="number" value="<?php echo $value['product_quantity'];?>"/>
                    <a class="edit-btn">Edit</a>
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price">155</span>
                </td>
            </tr>
            <?php } ?>
            
        </table>

        <div class="cart-total">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>$155</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>$155</td>
            </tr>
        </table>
        </div>

        <div class="checkout-container">
            <button class="btn checkout-btn">Checkout</button>
        </div>
    </section>






<!--Footer-->
<footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <img class="logo" src="assets/imgs/logo.jpeg"/>
        <p class="pt-3">We provide the best products for the most affordable prices</p>
      </div>
      
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">Featured</h5>
        <ul class="text-uppercase">
            <li><a href="#">men</a></li>
            <li><a href="#">women</a></li>
            <li><a href="#">boys</a></li>
            <li><a href="#">girls</a></li>
            <li><a href="#">arrivals</a></li>
            <li><a href="#">clothes</a></li>
        </ul>
      </div>
  
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">Contact Us</h5>
          <div>
              <h6 class="text-uppercase">Address</h6>
              <p>1234 Street Name, City</p>
          </div>
          <div>
            <h6 class="text-uppercase">Phone</h6>
            <p>123 456 7890</p>
          </div>
          <div>
          <h6 class="text-uppercase">Email</h6>
          <p>info@email.com</p>
          </div>
        </div>
  
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Instagram</h5>
                <div class="row">
                  <img src="assets/imgs/feature.jpeg" class="img-fluid w-25 h-100 m-2"/>
                  <img src="assets/imgs/feature01.jpeg" class="img-fluid w-25 h-100 m-2"/>
                  <img src="assets/imgs/feature1.jpeg" class="img-fluid w-25 h-100 m-2"/>
                  <img src="assets/imgs/feature4.jpeg" class="img-fluid w-25 h-100 m-2"/>
                  <img src="assets/imgs/coat1.jpeg" class="img-fluid w-25 h-100 m-2"/>
                </div>
            </div>
    </div>
    
  
    <div class="copyright mt-5">
      <div class="row container mx-auto">
        <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
          <img src="assets/imgs/payment.jpeg"/>
        </div>
        <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
          <p>eCommerce @ 2025 All Right Reserved</p>
        </div>
        <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
  </div>
  
  </footer>
  



    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>