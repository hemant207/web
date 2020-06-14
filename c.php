<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TIMEPIECE</title>
    <link href="CSS/style.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>

  <body>
  <div class="header" >
  
      <span
          id="span"
          style="font-size:30px;cursor:pointer;"
          onclick="openNav()"
          >&#9776; MENU</span
        >

        <img src="ASSETS\bag.JPG" onclick="location.href='cart.php'" width="2%" style="float:right; cursor: pointer;margin-top:0" />
        
        <h1>
            TIMEPIECE

            <?php 

            if(isset($_SESSION['uid'])){
              echo '<div class="btns" style="text-align: right; margin-right: 33px;">
              <button style="
              border: 0;
              padding: 7px;
              font-size: medium;
              cursor: pointer;
              background: transparent;
              color: inherit;
            "> 
              <a href="logout.php" style="color: inherit;text-decoration: none;" id="log-submit">LOG OUT</a>
               </button>'; 
            }
            else{
              echo '<div class="btns" style="text-align: right; margin-right: 33px;">
             <button style="
             border: 0;
             padding: 7px;
             font-size: medium;
             cursor: pointer;
             background: transparent;
             color: inherit;
           "> 
             <a href="log_in.html" style="color: inherit;text-decoration: none;" id="log-submit">LOG IN</a>
              </button>

              <button style="
              border: 0;
              padding: 7px;
              font-size: medium;
              cursor: pointer;
              background: none;
              color: inherit;
            ">
              <a href="signup.html" style="color: inherit; text-decoration: none;" id="log-submit">SIGN UP</a>
            </div>';
            }
            
            ?>
            
          </h1>
      
       
      
    </div>
    <div id="mynav" class="overlay">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
        >&times;</a
      >
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="c.php">SHOP NOW</a></li>
        
        <li><a href="cart.php">CART</a></li>
        <li><a href="aboutus.html">ABOUT US</a></li>
      </ul>
    </div>
   

  
 




  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "timepiece";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

//making cart with cookie

//checking that add to cart button is clicked
if(isset($_POST["add_to_cart"]))
{

    if(isset($_COOKIE["shopping_cart"]))
    {
      //remove the slashes from the data
        $cookie_data=stripcslashes($_COOKIE["shopping_cart"]);
        $cart_data=json_decode($cookie_data,true);

    }
else{
    $cart_data = array();
}
  //get id from the cart_data array 
    $item_id_list = array_column($cart_data,'item_id');


    //if id is already in the arry the run if block  

    if(in_array($_POST["hidden_id"],$item_id_list))
    {
        foreach($cart_data as $keys => $values)
        {
            if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
            {
                $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"]  + $_POST["quantity"];
            }
        }
    }

    else
    {
        $item_array = array(
            'item_id' => $_POST["hidden_id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $cart_data[] = $item_array;
    }

   
    $item_data = json_encode($cart_data);

    setcookie('shopping_cart',$item_data,time() + (86400 *30));
    header("location:c.php?success=1");
}


if(isset($_GET["success"]))
{
  echo '<div class="alert-success" style="padding:20px; margin:40px; background-color:#90EE90">
  '.  $message = 'item added to cart'.'
  </div>';
}







$sql = "SELECT * FROM product";
$result = $conn->query($sql);


    if(mysqli_num_rows($result)>0){
        
        while($row=mysqli_fetch_array ($result)){
            


            echo 
            
            ' <div class="column" >
            
            <div class="card"  >
           <form method="POST" >

              <img height="100%" width="100%"src="data:image;base64,'.base64_encode ($row["image"]).' "/> 
              <div class="container">
                    <h2>'.$row["name"].'</h2>
                    <p>'.$row["discription"].'</p>
                
                    <h2>£'.number_format( $row["price"] ).'</h2>

                   
                    <input type="hidden" name="hidden_name" value='.$row["name"].' >
                    <input type="hidden" name="hidden_price" value='. $row["price"].' > 
                    <input type="hidden" name="hidden_id" value='.$row["id"].' > 

                   <p> 

                   <input type="number" name="quantity" value="1" min="1" max="10">

                   <button  style="border: none;
                   outline: 0;
                   display: inline-block;
                   padding: 11px;
                   color: white;
                   background-color: #000;
                   text-align: center;
                   cursor: pointer;
                   width: 30%;"   type="submit" name="add_to_cart" class="add_to_cart" id='.$row["id"].' value="Add">ADD</button>
                  </p>

                  </div>
                  </form>
            </div>
          </div>
      

       
        
       ';

        }

    }
   
?>




<br/>




        

<script src="JS/script.js"></script>
                             
  </body>
</html>
