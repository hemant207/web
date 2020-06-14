<?php 

if(isset($_POST["s_submit"])){

session_start();

$name=$_POST["s_uname"];
$email=$_POST["s_email"];
$pass1=$_POST["s_pass"];
$pass2=$_POST["s_cpass"];
$address=$_POST["address"];
$postcode=$_POST["postcode"];



$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "timepiece";

  $conn=mysqli_connect($servername,$username,$password,$dbname);
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{

  if(empty($name) || empty($email) || empty($postcode) || empty($address)){
    header("location:signup.html?error=emptyfields&s_uname=".$name."&s_email=".$email."  ");
  }
  else if($pass1 !== $pass2){

    header("location:signup.html?error=passwordcheck&s_uname=".$name."&s_email=".$email."  ");
  }

   
 
  else{
    $sql="SELECT * FROM customer where username='$name'";

    $result=mysqli_query($conn,$sql);

    $num=mysqli_num_rows($result);

     
  if($num>0){
    echo "username already taken";
  }
  else{
    $reg = "INSERT INTO customer(username,email,password,address,postcode) VALUES ('$name','$email','$pass1','$address','$postcode')";
    mysqli_query($conn,$reg);
    header("location:log_in.html?signup=success");
    exit();
    
  }

  }


    }
    mysqli_close($conn);
}
else{
    header('location:signup.html');
    exit();
}


?>