
<?php
session_start();




if ($_SERVER["REQUEST_METHOD"] == "POST") {

  

require('dbcon.php');


 $name=$_POST['name'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $password=$_POST['password'];

$hash=password_hash($password,PASSWORD_DEFAULT);



$sql="select email from  login where email='$email' or mobile='$phone'";
$result=mysqli_query($con,$sql);

if($result && mysqli_num_rows($result)==1){



    //$_SESSION['fake_entery']='email or phone alredy exits';

   // header('location:register.php');

   echo "email or phone alredy exits";






}
else{


  $insert="insert into  login(name, email, mobile, password)values('$name','$email','$phone','$hash')";


 if(mysqli_query($con,$insert));
 {
    $_SESSION['registersuccess']="log now you are registered successfully";

header('location:index.php');







 }
}
 

 
 

















}


?>




<html>
<head>
    

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>



<div class="container">
  <h2 class="text-center">SIGNUP FORM</h2>


<form    method="POST"  id="reg_form"  onsubmit="return formvalid();" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">name</label>
    <input  id="name" type="text" class="form-control"  aria-describedby="emailHelp" name="name"  required >
    <div id="emailHelp" class="form-text form-error text-danger"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">email</label>
    <input type="email" class="form-control"  aria-describedby="emailHelp" id="femail"  name="email" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >phone</label>
    <input type="number" class="form-control"  aria-describedby="emailHelp" id="fphone" name="phone"  required>

  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" minlenght="8" >Password</label  required >
    <input type="password" class="form-control"  name="password"  id="pass" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" required>confirm Password</label>
    <input type="password" class="form-control"    id="cpass" >
  </div>


  


  <button type="submit" class="btn btn-primary" id="submit"  >Submit</button>



</form>

<h2><a href="index.php"> login here </a></h2>

</div >



<script>

  function seterror(id,error)

  {

    element=document.getElementById(id);
     element.getElementByClass(form-error)[0].innerHTML =error;


  }
function formvalid(){

  var status=true;

  var name=document.forms['reg_form']["name"].value;
  var email=document.forms['reg_form']['email'].value;

  var phone=document.forms['reg_form']['name'].value;
  var pass=document.forms['reg_form']['password'].value;
  var cpass=document.forms['reg_form']['cpass'].value;
//document.write(name,email,phone,pass,cpass);

if(name.lenght<5)
{


     seterror( "name","lenght of name is too short" );
 status=false;

}




return status;
}


</script>


    </body>

</html>


