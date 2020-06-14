<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "timepiece";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

#assign values for inserting into databases

$c_name=$_POST["card_name"];
$p_total=$_SESSION['total'];
$p_quantity=$_SESSION['q1'];
$c_id = $_SESSION['uid'];
$p_id = $c_id.$c_name;

#check if button is cliked or not

if(isset($_POST["add_to_cart"])){

  #inster data into table cart
  $sql_pay="INSERT INTO cart (quantity,total,cust_id,pay_id) VALUES ('$p_quantity','$p_total','$c_id','$p_id')";
  $result=mysqli_query($conn,$sql_pay);
 


  #insert data into payment table
  $sql_p="INSERT INTO payment (card_name,pay_amount) VALUES ('$c_name','$p_total')";
  $result=mysqli_query($conn,$sql_p);
  

  #update product quantity after payment into table product
  if(isset($_COOKIE["shopping_cart"])){

     $q1=0;
      $total=0;
      $cookie_data = stripcslashes($_COOKIE['shopping_cart']);
      $cart_data=json_decode($cookie_data,true);
  
      
      foreach($cart_data as $key => $values){
  
        #accessing product id and product quantity fromm cart
        $item_after_id=$values["item_id"];
       $item_after_q= $values["item_quantity"];
  
       #get quantity from product table
       $sql_up1="SELECT * FROM product WHERE id='$item_after_id';";
       $result1=mysqli_query($conn,$sql_up1);
       
  
  
       if(mysqli_num_rows($result1)>0){
          
        while($row=mysqli_fetch_array ($result1)){
          $after_q= $row["available_quantity"]-$item_after_q;
        }
      }
      
      #update avilable quantity value in the table
      $sql_up2="UPDATE product set available_quantity='$after_q' WHERE id='$item_after_id';";
      $update_q=mysqli_query($conn,$sql_up2);
  

      #making order if quantity is less then 10
      if($after_q<10){
        $sql_making_order="INSERT INTO order_making (making_id ,order_quantity) VALUES ('$item_after_id','50');";
        $result_making_order=mysqli_query($conn,$sql_making_order);
        


         
         
       }

      setcookie("shopping_cart", "" , time() - 3600);

      header("location:cart.php?checkout=sucessful");
  
      }
  
  }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TIMEPIECE</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="CSS/style.css" rel="stylesheet" type="text/css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    

    <style>

     body{
      background-color:#2B547E ;
      position: relative;
     }

      .all{
        position: relative;
        background-color:#1569C7;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        margin:35%;
        margin-top:5%;
        margin-bottom:5%;
        
      }

      #logo{
        padding:20%;
        padding-left:30%;
      
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        background-color:white;
        
      }

      input[type=text] {
        width:97%;
        box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.2);
        margin:2%;
        
        color: white;
      } 
      input[type=submit]{
        margin-bottom:0;
        width:100%;
        padding:15px;
        background-color:#990012;
        color:white;
      }

      input::placeholder{
      color:white;
}
  

          .a{
            margin:2%;
            margin-bottom:50%;
            background-color:#1580C7 ;
           
           
          }

         
          
          @media screen and (max-width: 1250px){
            .all{
              margin:30%;
              margin-top:5%;
        margin-bottom:5%;
            }
          }
          @media screen and (max-width: 1000px){
            .all{
              
              margin:25%;
              margin-top:5%;
        margin-bottom:5%;
            }
          }
          @media screen and (max-width: 900px){
            .all{
              
              margin:20%;
              margin-top:5%;
        margin-bottom:5%;
            }
          }
          @media screen and (max-width: 650px){
            .all{

              margin:15%;
            }
          }
    

     
      
     

      </style>


    <body>
      <div class="all">

      <div id="logo">
       <img  alt="Credit Card Logos" title="Credit Card Logos" src="http://www.credit-card-logos.com/images/visa_credit-card-logos/new_visa_big.gif"/>
      </div>

      <div id="p-det">
        <div class="a" >
        
   <form method="post">
    <input type="text" name="card_name" placeholder="CARD HOLDER NAME"><br/>

    <input type="text" name="card_number" placeholder="CARD NUMBER"><br/>
    
    <input type="text" name="card_month" placeholder="MM" style="display:inline-block;width:45%">
    <input type="text" name="card_year" placeholder="YY" style="display:inline-block;width:45%">
    <input type="text" name="card_date" placeholder="CVV  " style="display:inline-block;width:45%">

    
        </div>

      </div>
      <button  style="border: none;
                   outline: 0;
                   display: inline-block;
                   padding: 11px;
                   color: white;
                   background-color: #000;
                   text-align: center;
                   cursor: pointer;
                   width: 100%;"  type="submit" name="add_to_cart"  value="PAY NOW">PAY NOW</button>
        </div>
        </form>

    



    </body>
</html>
