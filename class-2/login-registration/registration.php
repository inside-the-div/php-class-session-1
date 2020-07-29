<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "php_mysql_login_regi";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password,$db_name);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

?>


<!-- data gula dori  -->

<?php 
  
    $message = "";
    
  if(isset($_POST['registration_btn'])){


    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $confirm_password = $_POST['user_confirm_password'];


    if($name == "" || $email == "" || $password == "" || $confirm_password == ""){
      $message = "Apni sob gula fileds fill koren!";
    }else{
      
      if($password != $confirm_password){
         $message  = "Password 2 ta mile nai";
      }else{
        

        $query = "select * from uses where email = '".$email."' "; // query build
        $row   = mysqli_query($conn,$query); // query run
        $total = mysqli_num_rows($row); // data count


        if($total > 0){
          $message = "ei email use kora hoyce !";
        }else{

          $query = 'insert into uses(name,email,password) values("'.$name.'","'.$email.'","'.$password.'")';
          $row   = mysqli_query($conn,$query);
          if($row){
            header('Location: login.php');
          }else{
            $message =  "Something Wrong !";
          }

  
        }


      } // end

    } // empty check end

  } // end isset

?>





















<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Registration</title>
</head>
<body>


  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="index.php">LOGO</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
              </li>
            </ul>

            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registration.php">Registration</a>
              </li>
            </ul>

          </div>
        </nav>
      </div>
    </div>
  </div>


  <div class="container pt-5">
    <div class="row">
      <div class="col-12">
        <div class="jumbotron mb-0">
          <h1 class="display-4 text-center">Registration</h1>

          
          <div class="row mt-5">
              
              <div class="col-12 col-lg-8 offset-lg-2">
                 <form action="registration.php" method="POST">

                  <dl class="row">
                    <dt class="col-sm-4 text-info font-secondary">Name*</dt>
                    <dd class="col-sm-8"><input  name="user_name"  type="text" class="form-control" placeholder="Name"></dd>

                    <dt class="col-sm-4 text-info font-secondary">Email*</dt>
                    <dd class="col-sm-8">
                      <input name="user_email" type="Email" class="form-control text-info" placeholder="Email">
                    </dd>

                    <dt class="col-sm-4 text-info font-secondary">Password*</dt>
                    <dd class="col-sm-8"><input name="user_password" type="password" class="form-control" placeholder="***********"></dd>

                    <dt class="col-sm-4 text-truncate text-info font-secondary">Confirm Password*</dt>
                    <dd class="col-sm-8"><input name="user_confirm_password" type="password" class="form-control" placeholder="***********"></dd>


                  </dl>
                  <div class="row">
                    <div class="col-sm-12">

                      <p class="text-center text-danger"><?php echo $message;?></p>


                      <input type="submit" name="registration_btn" class="form-control bg-info text-light font-secondary" value="Registration" >
                    </div>
                  </div>
                </form>



              </div>

          </div>

  

       </div>
     </div>
   </div>
 </div>








 <footer>
  <div class="container pt-5">
    <div class="row">
      <div class="col-12 text-center">
        <h6 class="text-white bg-dark py-5">Copyright &copy; InsideTheDiv</h6>
      </div>
    </div>
  </div>
</footer>















<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>