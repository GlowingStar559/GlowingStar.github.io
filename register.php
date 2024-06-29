<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PRTG Bandwidth</title>
</head>
<style>
      body{
        background-color:#398F64;
      }
</style>

<body>
    <div class="row">
        <center><h2 style="color:white;">Sign Up</h2></center>
        <aside class="col-lg-12">
            <div class="side-nav border p-3 bg-light border-0" style="height:100vh;">
                <h2 style="color:black;">Register</h2>
                <?php 
 if(isset($_POST['register'])){
  extract($_POST);
  if(strlen($username)<3){ // Minimum 
      $error[] = 'Please enter Username using 3 charaters atleast.';
        }
if(strlen($username)>20){  // Max 
      $error[] = 'Username: Max length 20 Characters Not allowed';
        }
   
      if(strlen($username)<3){ // Change Minimum Lenghth   
            $error[] = 'Please enter Username using 3 charaters atleast.';
        }
  if(strlen($username)>50){ // Change Max Length 
            $error[] = 'Username : Max length 50 Characters Not allowed';
        } 
if(strlen($email)>50){  // Max 
            $error[] = 'Email: Max length 50 Characters Not allowed';
        }      
         if(strlen($password)>20){ // Max 
            $error[] = 'Password: Max length 20 Characters Not allowed';
        }
          $sql="select * from users where (username='$username' or email='$email');";
      $res=mysqli_query($dbc,$sql);
   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);

     if($username==$row['username'])
     {
           $error[] ='Username alredy Exists.';
          } 
       if($email==$row['email'])
       {
            $error[] ='Email alredy Exists.';
          } 
      }
         if(!isset($error)){ 
              $date=date('Y-m-d');
            $options = array("cost"=>4);
            $password = password_hash($password,PASSWORD_BCRYPT,$options);         
            $result = mysqli_query($dbc, "INSERT INTO users (username, email, phone, role, status, password) VALUES ('$username', '$email', '$phone', '$role', '$status', '$password')");

    if($result)
    {
     $done=2; 
    }
    else{
      $error[] ='Failed : Something went wrong';
    }
 }
 } ?>
                <?php if(isset($done)) 
              { ?>
                <div class=" "><br> <p class="bg-success p-2">You have registered
                    successfully .</p> <br> <form action="" method="POST">
                    <div class="mb-3 row">
                        <label style="color:black;" for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-10 p-4">
                            <input class="p-2" type="text" name="username">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label style="color:black;" for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="p-2" type="text" name="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label style="color:black;" for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input class="p-2" type="text" name="phone">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label style="color:black;" for="role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <input class="p-2" type="text" name="role" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label style="color:black;" for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input class="p-2" type="password" name="status" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label style="color:black;" for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input class="p-2" type="password" name="password">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" name="register" class="btn btn-warning mb-3">Register</button>
                        <p style="color:black;">If you already have an account please login <a
                                href="login.php">Login</a>
                        </p>
                    </div>
                </form>  </div>
                <?php  } else { ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label style="color:black;" for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input class="p-2" type="text" name="username">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label style="color:black;" for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="p-2" type="text" name="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label style="color:black;" for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input class="p-2" type="text" name="phone">
                        </div>
                    </div>
                    <div class="mb-3 row" style="display:none;">
                        <label style="color:black;" for="role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <input class="p-2" type="text" name="role" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row" style="display:none;">
                        <label style="color:black;" for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input class="p-2" type="text" name="status" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label style="color:black;" for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input class="p-2" type="password" name="password">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" name="register" class="btn mb-3 text-white" style="background-color:blue;">Register</button>
                        <p style="color:black;">If you already have an account please login <a
                                href="login.php">Login</a>
                        </p>
                        <?php } ?>
                    </div>
                </form>
              </div>
            </aside>
    
         </div>


        </div>











        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
</body>

</html>