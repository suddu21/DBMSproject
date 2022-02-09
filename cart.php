<!DOCTYPE html>
<html>
<title>Cart</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body class="w3-content" style="max-width:1300px">

<!-- First Grid: Logo & About -->
<div class="w3-row">
  <div class="w3 w3-black w3-container w3-center" style="height:700px">
  <div class="w3 w3-black w3-container w3-center" style="height:700px">
    <div class="w3-padding-64">
      <h1>Cart items</h1>
    </div>
    <div class="w3-col l3 s6">
        <?php   // LOOP TILL END OF DATA 
        $mysqli = new mysqli('localhost', 'root', '','dbms_project');
        $sql = "SELECT * FROM cart";
        $result = $mysqli->query($sql);
        $total = 0;
        while ($rows = $result->fetch_assoc()) {
        ?>
          <div class="w3-container">
          <form action="delCart.php" method="post">
            <img src="<?php echo $rows['img_src']; ?>" style="width:100%">
            <p><?php echo $rows['name']; ?></p>
            <p>Quantity = <?php echo $rows['quantity']; ?>
              <input type="text" style="display:none" name="d_pid" value="<?php echo $rows['pid']; ?>">
              <input type="text" style="display:none" name="d_qt" value="<?php echo $rows['quantity']; ?>">
              <input type="submit" value="Remove">
            </form>
            <br><b><?php echo $rows['quantity']; ?> x Rs. <?php echo $rows['cost']; $total=$total+($rows['quantity']*$rows['cost']); ?></b></p>
          </div>

        <?php
        }
        ?>

      </div>
    <!--div class="w3-padding-64">
      <a href="#" class="w3-button w3-black w3-block w3-hover-blue-grey w3-padding-16">Home</a>
      <a href="#work" class="w3-button w3-black w3-block w3-hover-teal w3-padding-16">My Work</a>
      <a href="#work" class="w3-button w3-black w3-block w3-hover-dark-grey w3-padding-16">Resume</a>
      <a href="#contact" class="w3-button w3-black w3-block w3-hover-brown w3-padding-16">Contact</a>
    </div>
  </div>
  <div class="w3-half w3-blue-grey w3-container" style="height:700px">
    <div class="w3-padding-64 w3-center">
      <h1>About Me</h1>
      <img src="/w3images/avatar3.png" class="w3-margin w3-circle" alt="Person" style="width:50%">
      <div class="w3-left-align w3-padding-large">
        <p>Lorem ipusm sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
        <p>Lorem ipusm sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
  </div>
</div-->



<!-- Footer -->
<footer class="w3-container w3-black w3-padding-16">
  <p>Total amount = <?php echo $total ?></p><br>
  <button>Buy now</button>
</footer>

</body>
</html>
