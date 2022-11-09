<?php

  /*
      not paid
      shipped
      delivered
  */


    include('server/connection.php');

    if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){

      $order_status = $_POST['order_status'];

      $order_id = $_POST['order_id'];

      $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id =?");

      $stmt->bind_param('i', $order_id);

      $stmt->execute();

      $order_details = $stmt->get_result();

      $order_total_price = calculateTotalOrderPrice($order_details);


    }else{
      header('location: account.php');
      exit;
    }


    
    function calculateTotalOrderPrice($order_details){

      $total = 0;

      foreach($order_details as $row){
        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];
        $total = $total + ($product_price*$product_quantity);
      }

       return $total;
        
    }

?>

<?php include('layouts/header.php'); ?>

    <style>
         #account-form{
            width:50%;
            margin:35px auto;
            text-align:center;
            padding:20px;
            
        }
        #account-form input{
             margin:5px auto;
        }
        #account-form #change-pass-btn{
            background-color:#fb774b;
            color:#fff;
        }
        #account-info #order-btn{
            color:#fb774b;
            text-decoration: none;
        }

        .orders table{
            width:100%;
            border-collapse:collapse;
        }
        .orders .product-info{
            display:flex;
            flex-wrap: wrap;
        }
        .orders th{
           /* text-align:left;*/
            padding:5px 10px;
            color:#fff;
            background-color:#fb774b;
        }
        .orders th:nth-child(2){
           /* text-align: right;*/
        }
        .orders td{
            padding:10px 20px;
        }
        .orders td img{
            width:80px;
            height:80px;
            margin-right: 10px;
        }
        .orders .order-details-btn{
          color: #fff;
          background-color: #fb774b;
        }


    </style>
        






<!--Order details-->
<section id="orders" class="orders container my-5 py-3">
    <div class="conatiner mt-5">
        <h2 class="font-weight-bold text-center">Order details</h2>
        <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5 mx-auto">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>

        <?php foreach($order_details as $row){ ?>
        <tr>
            <td>
                <div class="product-info">
                     <img src="assets/imgs/<?php echo $row['product_image']; ?>"/>  
                      <div>
                        <p class="mt-3"><?php echo $row['product_name']; ?></p>
                      </div>
                </div>
                
            </td>

            <td>
              <span> <?php echo $row['product_price']; ?></span>
            </td>

            <td>
              <span><?php echo $row['product_quantity']; ?></span>
            </td>

            </tr>  
            

            <?php } ?>

        
    </table>
  
    <?php if($order_status == "not paid") { ?>

      <form style="float:right;" method="POST" action="payment.php">
        <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>"/>
        <input type="hidden" name="order_status" value="<?php echo $order_status;?>" />
        <input type="submit" name="order_pay_btn" class="btn btn-primary" value="Pay Now"/>
      </form>

      <?php } ?>
        
    
</section>






<?php include('layouts/footer.php'); ?>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>