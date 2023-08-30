



<?php

session_start();


require('dbcon.php');

if(isset( $_SESSION['email']))

{   

  $semail=  $_SESSION['email'];


    $sql="select * from  login where email='$semail'";
    $q=mysqli_query($con,$sql);

    if(mysqli_num_rows($q)==1)
    {
    $row= mysqli_fetch_assoc( $q);


   // echo $row['id'];

    // echo $row['email'];


    
if(isset($_SESSION['upgrade']))
{

    echo $_SESSION['upgrade'];

    unset($_SESSION['upgrade']);

}
?>

<html>

<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>


<form action="upg.php" method="post" enctype="multipart/form-data">

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name"  value="<?php echo $row['name'] ?>" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="email" required  disabled value="<?php echo $row['email'] ?>">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >phone</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $row['mobile'] ?>" name="phone" required disabled>

  </div>

  

  
  <select  name="gender"  value="<?php echo $row['gender'] ?>" >

<option  value="male">male</option>
<option  value="female">female</option>



</select>  
<label for="photo"></label>
<input type="file"   name="photo">


  <button type="submit" class="btn btn-primary" id="submit">Submit</button>



</form>


</body>
</html>



     


     


     
     
     
     
     
     
     
  

     <?php


     


    }
    else
    {

    }


  

    ?>

    <html>
    <head>
    
    
    </head>
    <body>


    
    <h2> 
    <a href="upgrade.php">Logout</a></h2>
    
    
    
    
    <a href="dashbord.php">dashboard</a></h2>
    </body>
    
    
    </html>
    
    <?php






}
else
{
    echo "  PLEASE LOGIN beacuse no session availale";
}






?>


