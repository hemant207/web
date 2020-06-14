<?php 
session_start();
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
  <body>
  <div class="header">
    
      <span
          id="span"
          style="font-size:30px;cursor:pointer;font-family: 'Times New Roman', Times, serif "
          onclick="openNav()"
          >&#9776; MENU</span
        >
        
      <h1 style=" font-family: 'Times New Roman', Times, serif ;font-size: 42px; font-weight:bold;margin-top:2%" >
        TIMEPIECE
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

if(isset($_GET["action"]))
{
    if($_GET["action"]=="delete")
    {
        $cookie_data = stripcslashes($_COOKIE["shopping_cart"]);
        $cart_data = json_decode($cookie_data,true);

        foreach($cart_data as $keys => $values)
        {
            if($cart_data[$keys]['item_id']== $_GET["id"])
            {
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie('shopping_cart' , $item_data , time() + (86400*30));
                header("location:cart.php?remove=1");
            }
        }
    }

    if($_GET['action']=="clear")
    {
      setcookie("shopping_cart", "" , time() - 3600);
      header("location:cart.php?clearall=1");
    }
}



if(isset($_GET["remove"]))
{
  echo '<div class="alert alert-danger" style="padding:20px; margin:40px;">
  '. $message = 'item remove to cart' .'
  </div>';
    

}

if(isset($_GET["clearall"]))
{

  echo '<div class="alert-danger" style="padding:20px; margin:40px;">
  '. $message="all item are cleared" .'
  </div>';
  ;
}

?>



    <div id="cart">

  <div id="order_table">
  
  <a href ="cart.php?action=clear" style="float:right; color:red; font-size:25px; margin-bottom:10x; margin-right:25px; "  ><b>CLEAR</b></a> 

    <table class="table table-striped ">

   

    <h3 > 
    
    <tr >
            <th width="30%"><h4><b> Product Name</b></h4> </th>
            <th width="10%"><h4><b> Quantity</b> </h4></th>
            <th width="20%"><h4><b> Price</b> </h4> </th>
            <th width="15%"><h4><b> Total</b> </h4></th>
            <th width="5%"><h4><b> Action</b> </h4></th>
        </tr>
        
</h3> 
        <?php

        if(isset($_COOKIE["shopping_cart"])){

          $q1=0;
            $total=0;
            $cookie_data = stripcslashes($_COOKIE['shopping_cart']);
            $cart_data=json_decode($cookie_data,true);

            foreach($cart_data as $keys => $values)
            {
              $q1+=$values["item_quantity"];
        ?>
         <tr>
                          <td> <?php echo $values["item_name"] ?></td>
                          <td><?php echo $values["item_quantity"] ?></td>
                          <td>£<?php echo number_format( $values["item_price"]) ?></td>
                          <td>£ <?php echo number_format($values["item_quantity"]*$values["item_price"],2)  ?> </td>
                          <td > <a href = "cart.php?action=delete&id= <?php echo $values["item_id"];?> "><p class="text-danger">Remove</p> </a></td>

                      </tr>

        <?php
               
               $total=$total +($values["item_quantity"]*$values["item_price"]);
               $_SESSION['total']=$total;
               $_SESSION['q1']=$q1;
               
            }
            
    
        ?>
      
        <tr>
            <td><b style="font-size:20px">Total</b></td>
            <td></td>
            <td></td>
            <td style="font-size:20px">£ <?php echo number_format($total,2); ?> </td>
            <td></td>
            
            
        </tr>

        <tr>
        <td></td>
        <td></td>
        <td></td>
        
        <td><a href=checkout.php class="btn btn-info" style="color:black;font-size:20px;" >checkout</a></td>
        <td></td>
        </tr>
        

        <?php

        

        }else{

            echo "no item in cart";
        }
        
        ?>

    <script src="JS/script.js"></script>
  </body>
</html>
