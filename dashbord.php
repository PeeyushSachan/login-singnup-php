

<!DOCTYPE html>
<html>

<head>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>


</body>

</html>



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


     











    }
    else
    {

    }


    echo  $_SESSION['email'];

    ?>

    <html>
    <head>
    
    
    </head>
    <body>


    
    <h2> 

<h1>name:-  <?php  echo $row['name']; ?></h1><br/>
<h1>email-:<?php  echo $row['email']; ?></h1><br/>
<h1>PHone:-<?php  echo $row['mobile']; ?></h1><br/>
<h1>image:-<img src="<?php  echo $row['photo']; ?>"   width="200px" /></h1>


    <a href="upgrade.php">upgrade</a></h2>
    
    
    
    
    <a href="logout.php">logout_here</a></h2>
    </body>
    
    
    </html>
    
    <?php






}
else
{
    echo "  PLEASE LOGIN beacuse no session availale";
}






?>


