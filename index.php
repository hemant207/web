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
  <style>
  .main1 {
  background-image: url("https://content.rolex.com/dam/homepage/roller/all-watches/watches_datejust_m126333-0010_1802jva_001_r.jpg?imwidth=470");
  height: 600px;
  margin-left:3%;
  background-repeat: no-repeat;
  background-position:left;
  background-attachment: fixed;
  
}
.main2 {
  background-image: url("https://content.rolex.com/dam/homepage/roller/all-watches/watches_oyster-perpetual_m114300_0004_1809jva_001.jpg?imwidth=470");
  height: 600px;
  margin-left:3%;
  background-repeat: no-repeat;
  background-position:right;
  background-attachment: fixed;
  
}
.main3 {
  background-image: url("https://content.rolex.com/dam/homepage/roller/all-watches/watches_cosmograph-daytona_m116518ln_0040_1706jva_001_r.jpg?imwidth=470");
  height: 600px;
  margin-left:3%;
  background-repeat: no-repeat;
  background-position:left;
  background-attachment: fixed;
  
}

h3{
    font-size:20px;
    padding-top: 10px;
  }

@media screen and (max-width: 950px) {
  .m{
    display : none;
  }
  

}

@media screen and (min-width: 950px) {
  
  .resp{
    display : none;
  }


}


    </style>

  </head>
  <body>
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

    <div class="slideshow">
      <div class="one">
        <video autoplay loop muted>
          <source src="ASSETS/video.mp4" />
        </video>

        <div class="header">
          <span
            id="span"
            style="font-size: 30px; cursor: pointer;"
            onclick="openNav()"
            ><h4>&#9776; MENU</h4>
          </span>

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
               echo '<p style="font-size:20px"> Hii '.$_SESSION['uname'].'</p> ';
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
      </div>
    </div>
    <div class=m>
    <div class="intro"  style="background-color:#FFF8f0 ;padding : 13%;">
      <h2 style="font-size:50px;">ROLEX WATCHES ARE CRAFTED WITH SCRUPULOUS ATTENTION TO DETAIL.</h2>
      <h3 style="font-size:24px">Explore the Rolex collection of prestigious, high-precision timepieces. Rolex offers a wide assortment of Classic and Professional watch models to suit any wrist. Discover the broad selection of Rolex watches to find a perfect combination of style and functionality.</h3>
    </div>


    <div class="main1" > <h3 style="margin-left:490px;"><p style="font-size:40px;">Universal symbols</p><br/>
The aesthetics of the Oyster Perpetual models set them apart as symbols of universal and classic style. They embody timeless form and function, firmly rooted in the pioneering origins of Rolex. The simplicity of an original.</h3>
    </div>
   <div class="main2"><h3 style="margin-right:490px;"><p style="font-size:40px;">The Oyster Perpetual Datejust is the epitome of the classic Rolex watch. </p><br/>
   Created in 1945, the Datejust was the first self-winding waterproof chronometer wristwatch to display the date in a window at 3 o’clock on the dial – hence its name. With its timeless aesthetics, functions and rich history, the Datejust is a watchmaking icon and one of the brand’s most recognizable watches.</h3></div>
    <div class="main3"><h3 style="margin-left:490px;">
   <p style="font-size:40px;"> The Oyster Perpetual is the purest expression of the Oyster concept, providing a clear and accurate time display.</p>
    <br/>
    <br/>

This watch is the direct descendant of the original Oyster launched in 1926, the first waterproof wristwatch in the world and the foundation on which Rolex has built its reputation.</h3></div>
          </div> 

<!--------------------------------------------------------------------------------------------------------------------------------->
<div class="resp">
<div style="background-color:#FFF8f0 ;padding : 13%;">
      <h2 >ROLEX WATCHES ARE CRAFTED WITH SCRUPULOUS ATTENTION TO DETAIL.</h2>
      <h3 >Explore the Rolex collection of prestigious, high-precision timepieces. Rolex offers a wide assortment of Classic and Professional watch models to suit any wrist. Discover the broad selection of Rolex watches to find a perfect combination of style and functionality.</h3>
    </div>


    <div >
      <img src="https://content.rolex.com/dam/homepage/roller/all-watches/watches_datejust_m126333-0010_1802jva_001_r.jpg?imwidth=350">
       <h3 ><p style="font-size:24px;" >Universal symbols</p><br/>
The aesthetics of the Oyster Perpetual models set them apart as symbols of universal and classic style. They embody timeless form and function, firmly rooted in the pioneering origins of Rolex. The simplicity of an original.</h3>
    </div>

   <div >
     <img src="https://content.rolex.com/dam/homepage/roller/all-watches/watches_oyster-perpetual_m114300_0004_1809jva_001.jpg?imwidth=470">
   <h3><p style="font-size:24px;">The Oyster Perpetual Datejust is the epitome of the classic Rolex watch. </p><br/>
   Created in 1945, the Datejust was the first self-winding waterproof chronometer wristwatch to display the date in a window at 3 o’clock on the dial – hence its name. With its timeless aesthetics, functions and rich history, the Datejust is a watchmaking icon and one of the brand’s most recognizable watches.</h3></div>
    
   <div >
   <img src="https://content.rolex.com/dam/homepage/roller/all-watches/watches_cosmograph-daytona_m116518ln_0040_1706jva_001_r.jpg?imwidth=470">
   <h3 >
   <p > The Oyster Perpetual is the purest expression of the Oyster concept, providing a clear and accurate time display.</p>
    <br/>
    <br/>

This watch is the direct descendant of the original Oyster launched in 1926, the first waterproof wristwatch in the world and the foundation on which Rolex has built its reputation.</h3></div>
          </div>
    <script src="JS/script.js"></script>
  </body>
</html>
