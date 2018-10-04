<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Signin Page</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  </head>

  <body class="text-center">
      <?php
      
        if(isset($_POST['signin'])){
            $password = $_POST['password'];
            $email = $_POST['email'];
            $query = "SELECT * from `accounts`;";
            if(count(fetchAll($query)) > 0){ //this is to catch unknown error.
                  foreach(fetchAll($query) as $row){
                    if($row['email']==$email&&$row['password']==$password){
                        $_SESSION['login'] = true;
						$_SESSION['id']=$row['id'];
            $_SESSION['email']=$row['email'];
            $_SESSION['password']=$row['password'];
             $_SESSION['type'] = $row['type'];
						if($row['type']=="super_admin"){
                        header('location:home.php');
						}
						if($row['type']=="admin"){
                        header('location:admin.php');
						}
						if($row['type']=="user"){
                        header('location:users.php');
						}
            if(substr($row['type'],0,8)==="subadmin")
            {
                header('location:subs.php');
            }
						
						
                    }else{
                        echo "<script>alert('Wrong login details.')</script>";
                    }
                }
            }else{
                echo "<script>alert('Error.')</script>";
            }

        }
      
      ?>
      <div class="container">
            <form method="post" class="form-signin">
              <img class="mb-4" src="images/pic11.png" alt="" width="80" height="80">
              <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                
                
              <label for="inputEmail" class="sr-only">Email address</label>
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
			  <br>
              <label for="inputPassword" class="sr-only">Password</label>
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
               <br>
              <button name="signin" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			  <br>
              <a href="signup.php" class="mt-5 mb-3 text-muted">Create an account</a>
            </form>
          </div>
      
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
