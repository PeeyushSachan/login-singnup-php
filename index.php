<?php

require('dbcon.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {


 $email=$_POST["email"];
 $password=$_POST["password"];

$sql="select password from  login where email='$email'";

$result=mysqli_query($con,$sql);

if($result && mysqli_num_rows($result)==1){



    $row=mysqli_fetch_assoc($result);

    $password_hash=$row["password"];

    if(password_verify($password,$password_hash))
    {

        $_SESSION['email']= $email;

        header("Location:dashbord.php");

       

    }
    
    else
    {


      echo "email or pass incoorect";
      //  $_SESSION['incorect_pass']= "email your incorrect";

       // header("Location:index.php");
    }
  }


  }



?>


<!DOCTYPE html>
<html>

<head>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>

<?php




if(isset($_SESSION['registersuccess']))
{

    echo $_SESSION['registersuccess'];

    unset($_SESSION['registersuccess']);

}


?>

<form   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="container -fluid">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Email address</label>
    <input type="email" class="form-control" id="" name="email">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" required  >Password</label>
    <input type="password" class="form-control" id="" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



<p><a href="register.php"> reg here</a></p>
</div>


</body>
</html>