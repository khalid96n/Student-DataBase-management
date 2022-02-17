<?php
session_start();
include 'dbconnect.php';
 $email_err=$pws_err= $success=$error='';
if (isset($_POST['submit'])) {
    
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);


    $query ="select * from register where email = '$email'";
    $run = mysqli_query($conn,$query);
    $row = mysqli_num_rows($run);

    if ($row>0) {
            $email_err= "Email id already exist!  please try with another email id";
    }elseif ($password !== $cpassword) {
        $pws_err= "Your password does not match ! please try  again";
    }
    else{
        $sql="insert into register (fname,email,password,cpassword) values ('$fname','$email','$pass','$cpass') ";
        $run = mysqli_query($conn,$sql);

        if ($run) {
            $success="Registered successfully.......wow";
        }
        else{
            $error="was unable to register....please try again";
        }

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Portal</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<script >
  
  <!-- register form -->
    function register() {
        document.getElementById('register').style.display="block";
        document.getElementById('login').style.display="none";
    }
// login form
   function login() {
        document.getElementById('register').style.display="none";
        document.getElementById('login').style.display="block";
    }

</script>
</head>
<body>
    <section class="">
        <p class="text-center text-warning font-weight-bold"><?php echo @$_SESSION['login_first']; ?></p>
      <h2 class="text-center text-dark pt-5 font-weight-bold py-3">Student Portal</h2>

      <p class="text-center text-danger font-weight-bold"><?php echo @$_GET['error']?></p>

      <div class="container  bg-dark" id="formsetting" > <!-- container starts -->

       <h3 class="text-white text-center py-3">login or register</h3>

       <div class="row"> <!-- row starts -->

        <div class="col-md-5 col-sm-5 col-12"> 
            <img src="image/studentPortal.png" class="rounded-circle mx-auto d-block py-5" alt="Cinque Terre">
          </div>

        <div class="col-md-5 col-sm-5 col-12">

            <button class="btn btn-info px-5" onclick="register()">Register</button>
            <!-- <button class="btn btn-info px-5" onclick="login()">Login</button> -->

            <div id="register" style="display: block;" class="mt-2">
            <form method="post" action="">
                <div class="form-group ">
                    <label class="text-white">Full Name</label>
                    <input type="text" name="fname" placeholder="Enter your name" class="form-control" required="required">
                    
                </div>

                <div class="form-group">
                    <label class="text-white">Email id</label>
                    
                    <input type="email" name="email" placeholder="Enter your email.id" class="form-control" required="required"> 
                    <span class=" text-white font-weight-bold"><?php echo $email_err; ?></span>
                </div>


                <div class="form-group">
                    <label class="text-white">Password</label>
                    <input type="password" name="password" placeholder="Enter your Password" class="form-control" required="required">
                    
                </div>

                <div class="form-group">
                    <label class="text-white">Confirm Password</label>
                    
                    <input type="password" name="cpassword" placeholder="Re-enter your Password" class="form-control" required="required">

                    <span class=" text-white font-weight-bold"><?php echo $pws_err; ?></span>
                    
                </div>

                <input type="submit" name="submit" value="Register" class="btn btn-success px-5">

                <span class=" text-white font-weight-bold"> <?php echo $success; echo $error; ?></span>

                </form>
            </div>

            <div id="login" style="display:none;" class="mt-2" >
                <form method="post" action="">

                <div class="form-group">
                    <label class="text-white">Email id</label>
                    <input type="email" name="email" placeholder="Enter your email.id" class="form-control">
                </div>


                <div class="form-group">
                    <label class="text-white">Password</label>
                    <input type="password" name="password" placeholder="Enter your Password" class="form-control">
                </div>

                <input type="submit" name="submit1" value="login" class="btn btn-success px-5">
                </form>
                
            </div>
        </div>
           
       </div> <!-- row ends -->

      </div> <!-- container ends -->

    </section>
</body>
</html>


<!-- login option -->

<?php

if (isset($_POST['submit1'])) {
    
    $email = $_SESSION['email']=$_POST['email'];
    $pwd = $_POST['password'];
    $sql = "select * from register where email = '$email'";
    $run = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($run);

    $pwd_fetch = $row['password'];
    $pwd_decode  =password_verify($pwd,$pwd_fetch);

    if ($pwd_decode) {
        echo "<script>window.open('main.php?success=loggedin successfully','_self')</script>";
    }
    else{

        echo "<script>window.open('index.php?error=username or password incorrect','_self')</script>";
    }


}


?>