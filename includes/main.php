</head>

<body>

  <header class="page-header">
    <!-- topline -->
    <div class="page-header__topline">
      <div class=" clearfix">

        <div class="currency">
          <a class="currency__change" href="customer/my_account.php?my_orders">
          <?php
if (!isset($_SESSION['customer_email'])) {
    echo "Welcome: <b>Guest</b>";
} else {
    echo "Welcome:<b> " . $_SESSION['customer_email'] . "</b>";
}
?>
          </a>
        </div>

        <div class="basket">
          <a href="cart.php" class="login__link">
            <i class="icon-basket"></i>
            <?php items();?> items
          </a>
        </div>


        <ul class="login">

<li class="login__item">
<?php
if (!isset($_SESSION['customer_email'])) {
    echo '<a href="customer_register.php" class="login__link">Register</a>';
} else {
    echo '<a href="customer/my_account.php?my_orders" class="login__link">My Account</a>';
}
?>
</li>


<li class="login__item">
<?php
if (!isset($_SESSION['customer_email'])) {
    echo '<a href="checkout.php" class="login__link">Sign In</a>';
} else {
    echo '<a href="./logout.php" class="login__link">Logout</a>';
}
?>

</li>
</ul>

      </div>
    </div>
    <!-- bottomline -->
    <div  class="page-header__bottomline">
      <div class="clearfix">

        <div class="logo">
          <a class="logo__link" href="index.php">
            <img class="logo__img" src="images/component.png" alt="logotype" width="80">
          </a>
        </div>

        <nav class="main-nav">
          <ul class="categories">

            <li class="categories__item">
              <a class="categories__link categories__link--active" href="shop.php">
                Shop
              </a>
            </li>

          <li class="categories__item">
              <a class="categories__link" href="customer/my_account.php?my_orders">
                My Account ⬇
              </a>
              <div class="dropdown dropdown--lookbook">
                <div class="clearfix">
                  <div class="dropdown__half">
                    <div class="dropdown__heading">Account Settings</div>
                    <ul class="dropdown__items">
                      <li class="dropdown__item">
                        <a href="customer/my_account.php?my_wishlist" class="dropdown__link">My Wishlist</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="customer/my_account.php?my_orders" class="dropdown__link">My Orders</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="customer/my_account.php?log_history" class="dropdown__link">View Log History</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="cart.php" class="dropdown__link">View Shopping Cart</a>
                      </li>
                    </ul>
                  </div>
                  <div class="dropdown__half">
                    <div class="dropdown__heading"></div>
                    <ul class="dropdown__items">
                      <li class="dropdown__item">
                        <a href="customer/my_account.php?edit_account" class="dropdown__link">Edit Account</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="customer/my_account.php?change_pass" class="dropdown__link">Change Password</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="customer/my_account.php?delete_account" class="dropdown__link">Delete Account</a>
                      </li>
                      <?php if (!isset($_SESSION['customer_email'])) {
    echo '<li class="dropdown__item">
                                <a href="checkout.php" class="dropdown__link">Sign in</a>
                              </li>';
} else {
    echo '<li class="dropdown__item">
                                <a href="logout.php" class="dropdown__link">Logout</a>
                              </li>';
}?>
                    </ul>
                  </div>
                </div>


              </div>

            </li>

          </ul>
        </nav>
      </div>
    </div>
  </header>