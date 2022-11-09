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

          //calculate total
          calculateTotalCart();



    //remove product from cart
}else if(isset($_POST['remove_product'])){

    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);

    //calculate total
    calculateTotalCart();
  
}else if(isset($_POST['edit_quantity'])){
    //we get id and quantity from the form
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    //get the product array from the session
    $product_array =$_SESSION['cart'][$product_id];

    //update product quantity
    $product_array['product_quantity'] = $product_quantity;

      //return array back its place
    $_SESSION['cart'][$product_id] = $product_array;

    //claculate total
    calculateTotalCart();

}else{
       // header('location:index.php');
    }


    function calculateTotalCart(){

      $total_price = 0;
      $total_quantity = 0;

      foreach($_SESSION['cart'] as $key => $value){
        $product = $_SESSION['cart'][$key];
        $price = $product['product_price'];
        $quantity = $product['product_quantity'];

        $total_price = $total_price + ($price * $quantity);
        $total_quantity = $total_quantity + $quantity;
      }

        $_SESSION['total'] = $total_price;
        $_SESSION['quantity']=$total_quantity;
        
    }




    
?>





<?php include('layouts/header.php'); ?>
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
    background_color:#fff;
    border:none;
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
 
 .cart-quantity{
    background-color:#fb774b;
    color:#fff;
    padding:2px 5px;
    border-radius: 50%;
    margin:-5px;
    font-size:1rem;
}


</style>




           


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
                    <form method="POST" action="cart.php">
                      <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>
                      <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'];?>"/>
                      <input type="submit" class="edit-btn" value="edit" name="edit_quantity"/>
                    </form>
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price']; ?></span>
                </td>
            </tr>
            <?php } ?>
            
        </table>

        <div class="cart-total">
        <table>
           <!-- <tr>
                <td>Subtotal</td>
                <td>$155</td>
            </tr>-->
            <tr>
                <td>Total</td>
                <td>$<?php echo $_SESSION['total']; ?></td>
            </tr>
        </table>
        </div>

        <div class="checkout-container">
              <form method = "POST" action = "checkout.php">
               <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">
             </form>
        </div>
    </section>




    <?php include('layouts/footer.php'); ?>

