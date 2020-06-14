<?php 

if(isset($_POST["login"])){


$name=$_POST["l_username"];
$pass=$_POST["l_password"];



$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "timepiece";

  $conn=mysqli_connect($servername,$username,$password,$dbname);

    if(empty($name) || empty($pass)){
        header("location:log_in.html?error=emptyfields");
        exit();
    }
   else {
    $sql="SELECT * FROM customer where username='$name' &&  password='$pass' ";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);

    if ($num==1){
        if($row=mysqli_fetch_assoc($result)){
          session_start();
           $_SESSION['uid'] = $row['cust_id'];
           $_SESSION['uname'] = $row['username'];
   
           header("location:index.php?login=success");
           exit();
        }
        else{
            header('location:log_in.html&error=invaliduser');
            }
    }
    else{
        header("location:log_in.html?error=loginerror");
    }

}

}

?>