<?php

// Username is root
$user = 'root';
$password = '';

// Database name is gfg
$database = 'dbms_project';

// Server is localhost with
// port number 3308
$servername = 'localhost:3306';
$mysqli = new mysqli(
  $servername,
  $user,
  $password,
  $database
);

// Checking for connections
if ($mysqli->connect_error) {
  die('Connect Error (' .
    $mysqli->connect_errno . ') ' .
    $mysqli->connect_error);
}

// SQL query to select data from database
//$sql = "SELECT * FROM newsletter_subs";
//$result = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html>
<title>One Stop Shop</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .w3-sidebar a {
    font-family: "Roboto", sans-serif
  }

  body,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  .w3-wide {
    font-family: "Montserrat", sans-serif;
  }
</style>

<body class="w3-content" style="max-width:1200px; background-color: rgb(255, 255, 255);">


  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16" style="background-color: rgb(255, 255, 255);">
      <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
      <h3 class="w3-wide"><a href="https://www.linkedin.com/company/brainium-ai/" target="_blank"><img src="brainium.jpg" href="https://www.linkedin.com/company/brainium-ai" height="70%" width="70%"></a></h3>
    </div>
    <div class="w3-padding-64 w3-large" style="font-weight:bold;background-color: rgb(255, 255, 255);">
      <!--a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a-->
      <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
        Kurtas <i class="fa fa-caret-down"></i>
      </a>
      <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
        <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Casual</a>
        <a href="#" class="w3-bar-item w3-button">Ethnic</a>
        <a href="#" class="w3-bar-item w3-button">Indo-Western</a>
      </div>
      <a href="#" class="w3-bar-item w3-button">Jackets</a>
      <a href="#" class="w3-bar-item w3-button">Gymwear</a>
      <a href="#" class="w3-bar-item w3-button">Blazers</a>
      <a href="#" class="w3-bar-item w3-button">Shoes</a>
    </div>
    <a href="#footer" class="w3-bar-item w3-button w3-padding">Add a product</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a>
    <a href="#footer" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('reg').style.display='block'">Make an account</a>
  </nav>

  <!-- Top menu on small screens -->
  <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
    <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
  </header>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:250px">

    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>

    <!-- Top header -->
    <header class="w3-container w3-xlarge" style="background-color: transparent;">
      <p class="w3-left">Your one stop shop for all things fashion!</p>
      <p class="w3-right">
        <a href="cart.php" target="_blank"><i class="fa fa-shopping-cart w3-margin-right"></i></a>
        <i class="fa fa-search"></i>
      </p>
    </header>

    <!-- Image header -->
    <div class="w3-display-container w3-container">
      <img src="kurta1.jpg" alt="Jeans" style="width:100%;">
      <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
        <h1 class="w3-jumbo w3-hide-small" style="color: rgb(70, 62, 62);">Kurtas</h1>
        <h1 class="w3-hide-large w3-hide-medium">Kurtas</h1>
        <h1 class="w3-hide-small" style="color: black;"></h1>
        <p><a href="#jeans" class="w3-button w3-black w3-padding-large w3-large">SHOP NOW</a></p>
      </div>

    </div>

    <!-- Product grid -->
    <div class="w3-row ">
      <div class="w3-col l3 s6">
        <!--div class="w3-container">
          <img src="kurta1.jpg" style="width:100%">
          <p>Casual Kurta<br><b>Rs. 24.99</b></p>
        </div-->
        <?php   // LOOP TILL END OF DATA 
        $sql = "SELECT * FROM products";
        $result = $mysqli->query($sql);
        while ($rows = $result->fetch_assoc()) {
        ?>
          <div class="w3-container">
            <form action="add2cart.php" method="post" name="addBtn">
            <img src="<?php echo $rows['img_src']; ?>" style="width:100%"><input type="text" style="display:none" id="c_name" name="c_name" value="<?php echo $rows['name']; ?>">
            <input type="text" style="display:none" id="c_pid" name="c_pid" value="<?php echo $rows['pid']; ?>">
            <input type="number" min="1" required id="c_qt" name="c_qt" placeholder="Quantity">
            <input type="text" style="display:none" id="c_cost" name="c_cost" value="<?php echo $rows['cost']; ?>">
            <input type="text" style="display:none" id="c_imgsrc" name="c_imgsrc" value="<?php echo $rows['img_src']; ?>">
            <p><?php echo $rows['name']; ?> <input type="submit" value="+" onclick="add2cart.php"><br><b>Rs. <?php echo $rows['cost']; ?></b></p>
            </form>
          </div>

        <?php
        }
        ?>

      </div>

      <!-- Footer -->
      <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
        <div class="w3-row-padding">
          <div class="w3-col s4">
            <h4>Add a product</h4>
            <!--p>Questions? Go ahead.</p-->
            <form action="product_entering.php" method="post">
              <p><input class="w3-input w3-border" type="text" placeholder="Product ID" name="ID" id="ID" required></p>
              <p><input class="w3-input w3-border" type="text" placeholder="Product name" name="PName" id="PName" required></p>
              <p><input class="w3-input w3-border" type="text" placeholder="Category" name="category" id="category" required></p>
              <p><input class="w3-input w3-border" type="text" placeholder="Cost" name="cost" id="cost" required></p>
              <p><input class="w3-input w3-border" type="text" placeholder="Image URL" name="imgsrc" id="imgsrc" required></p>
              <button type="submit" class="w3-button w3-block w3-black">Send</button>
            </form>
          </div>

          <div class="w3-col s4">
            <h4>About the website</h4>
            <p>This website uses HTML, CSS, PHP and XAMPP stack.</p>
            <!--p><a href="#">About us</a></p-->

          </div>

          <div class="w3-col s4 w3-justify">
            <h4>About us</h4>
            <p><i class="fa fa-fw fa-map-marker"></i> One Stop Shop</p>
            <p><i class="fa fa-fw fa-phone"></i> +91 9107800114</p>
            <p><i class="fa fa-fw fa-envelope"></i> onestopshop@gmail.com</p>
            <!--h4>Accepted payment methods</h4>
            <p><i class="fa fa-fw fa-cc-amex"></i> Visa</p>
            <p><i class="fa fa-fw fa-credit-card"></i> RuPay</p>
            <br-->
            <!--i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-large"></i-->
          </div>
        </div>
      </footer>

      <!--div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

      <!-- End page content -->
    </div>

    <!-- Newsletter Modal -->
    <div id="newsletter" class="w3-modal">
      <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
        <div class="w3-container w3-grey w3-center">
          <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
          <h2 class="w3-wide">NEWSLETTER</h2>
          <p>Enter your email to get offers and exciting updates!</p>
          <form name="news_form" method="post" action="newsletter_entering.php"><input class="w3-input w3-border" type="text" name="email" id="email" placeholder="Enter e-mail">
            <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
          </form>
        </div>
      </div>
    </div>

        <!-- User registration Modal -->
        <div id="reg" class="w3-modal">
      <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
        <div class="w3-container w3-grey w3-center">
          <i onclick="document.getElementById('reg').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
          <h2 class="w3-wide">Sign up</h2>
          <p>Sign up to access exclusive deals!</p>
          <form name="user_form" method="post" action="user_entering.php">
            <input class="w3-input w3-border" type="text" name="email" id="email" placeholder="Enter e-mail">
            <input class="w3-input w3-border" type="password" name="password" id="password" placeholder="Enter password">
            <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('reg').style.display='none'">Sign up</button>
          </form>
        </div>
      </div>
    </div>

    <script>
      // Accordion 
      function myAccFunc() {
        var x = document.getElementById("demoAcc");
        if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
        } else {
          x.className = x.className.replace(" w3-show", "");
        }
      }

      // Click on the "Jeans" link on page load to open the accordion for demo purposes
      document.getElementById("myBtn").click();


      // Open and close sidebar
      function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
      }

      function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
      }
    </script>

</body>

</html>