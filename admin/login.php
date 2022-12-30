
<?php include('header.php'); ?>

<?php


  include('../server/connection.php');

    if(isset($_SESSION['admin_logged_in'])){
      header('location: index.php');
      exit;
    }

  if(isset($_POST['login_btn'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins
     WHERE admin_email=? AND admin_password = ? LIMIT 1 ");
     $stmt->bind_param('ss',$email, $password);

     if($stmt->execute()){
      
        $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
        $stmt->store_result();

        if($stmt->num_rows()== 1){
          $stmt->fetch();
          $_SESSION['admin_id']=$admin_id;
          $_SESSION['admin_name']=$admin_name;
          $_SESSION['admin_email']=$admin_email;
          $_SESSION['admin_logged_in']=true;

          header('location: index.php?login_success=logged in successfully');

        }else{

          header('location: login.php?error=could not verify your account');
        }

     }else{
            //error
          header('location: login.php?error=something went wrong');
     }
  }




?>










    <style>
        #login-form{
            width:50%;
            margin:5px auto;
            text-align:center;
            padding:20px;
            border-top:1px solid #fb774b;
        }
        #login-form input{
            width:50%;
            margin:5px auto;
        }
        #login-form #login-btn{
            background-color:#fb774b;
            color:#fff;
        }
        #login-form #register-url{
            color:#fb774b;
        }



    </style> 
<!--Login-->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Login</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="login-form" method="POST" action="login.php">
            <p style="color:red" class="text-center"><?php if(isset($_GET['error'])) {echo $_GET['error'];} ?></p>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required/>
            </div>
            <div class="from-group">
                <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login"/>
            </div>
            <div class="from-group">
                <a id="register-url" href="register.php" class="btn">Don't have account? Register</a>
            </div>
        </form>
    </div>
</section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
