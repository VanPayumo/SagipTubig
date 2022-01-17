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

    <?php
      for ($i = 0; $i < 54; $i++) {
          echo "&nbsp;";
      }
      ?>

    <img style="padding-bottom:1em;" src="images/cloud1.png" alt="cloud1">

    <?php
        for ($i = 0; $i < 160; $i++) {
            echo "&nbsp;";
        }
    ?>

    <img  src="images/cloud2.png" alt="cloud2">
    <?php
        for ($i = 0; $i < 85; $i++) {
            echo "&nbsp;";
        }
    ?>

    <img style="padding-bottom:4em;" src="images/cloud3.png" alt="cloud3">

      <h1>#SAGIP<b>TUBIG</b> </h1>
      <p>Take part in helping our marine species breath freely again by using our merch! </p>
      <br>
        <p> <b> <i>THEY NEED OUR HELP! 🐠🐡 </i></b>  </p>


      <a href="shop.php" class="btn1">Shop now</a>
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

    </div><!-- row Ends -->

    </div><!-- container Ends -->
    <!-- FOOTER -->
    <footer class="page-footer">


      <div class="page-footer__subline">
        <div class="clearfix">

          <div class="copyright">
            &copy; <?php echo date("Y"); ?> SagipTubig&trade;
          </div>

          <div class="developer">
            Developed by G3 BSCS-3A
          </div>

          <div class="designby">
            Design by LALS, MTC
          </div>

        </div>
      </div>
    </footer>
</body>

</html>
