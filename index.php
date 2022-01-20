<?php

session_start();

include "includes/db.php";
include "includes/header.php";
include "functions/functions.php";
include "includes/main.php";

?>


  <!-- Cover -->
  <main>

    <div class="hero">

      <h1>#SAGIP<b>TUBIG</b> </h1>
      <p>Take part in helping our marine species breath freely again by using our merch! </p>
      <br>
        <p> <b> <i>THEY NEED OUR HELP! 🐠🐡 </i></b>  </p>


      <a href="shop.php" class="btn1"><i class='fa fa-shopping-cart'></i> Shop now</a>
      <br><br><br><br>
      <?php
for ($i = 0; $i < 54; $i++) {
    echo "&nbsp;";
}
?>
      <img src="images/wave.png" alt="wave">
    </div>
    <!-- Main -->

    <div class="wrapper">
            <h1> <b> GET TO KNOW #</b>SAGIP<b>TUBIG</b><h1>
              <p>WELCOME  TO <b>#SAGIPTUBIG</b> MERCH STORE! 90% of the proceeds goes straightly to <b>#SAGIPTUBIG</b> FOUNDATION.</p>

      </div>
    <div class="wrapper">
            <h2> <b>CHECK OUR PRODUCTS</b><h2>

      </div>


    <div id="content" class="container"><!-- container Starts -->

    <div class="row"><!-- row Starts -->

    <?php

getPro();

?>

<br>
<img id="wave1" src="images/wave.png">
<img id="fish" src="images/fish.png">
<div class="wrapper">
      <br> <br>
        <h1> <b>HOW #</b>SAGIP<b>TUBIG WORKS</b><h1>
      </div>
      <img id="wave2" src="images/wave.png" alt="wave">
      <br> 
      <center>
      <img src="images/ship.png" alt="ship">
      <br><br>
      <img src="images/divider.png" alt="divider">
      </center>
</div>

<img id="thunder" src="images/thunder.png">
<img id="earth" src="images/earth.png" alt="earth">
<img id="trash" src="images/trash.png" alt="trash">

<img id="recy" src="images/recy.png" alt="recy">

<div class ="sub">
    <div class ="idea">
    THE BIG IDEA
    </div>

    <div class="mapping">
    MAPPING 
    </div>

    <div class="removal">
    REMOVAL
    </div>

    <div class="recycle">
    RECYCLING
    </div>
</div>


  <div class="idea2">
    &nbsp; &nbsp; This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
  </div>

  <div class="map2">
  &nbsp; &nbsp; This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
  </div>

  <div class="remove2">
    &nbsp; &nbsp; This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
  </div>

  <div class="recy2">
    &nbsp; &nbsp; This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
    This is some dummy text.This is some dummy text.This is some dummy text.
  </div>
  

    </div><!-- row Ends -->

    </div><!-- container Ends -->
    <!-- FOOTER -->
    <?php

include "includes/footer.php";

?>

</body>

</html>
