<header id='header'>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="http://localhost/shop/index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i>Shopping Cart
            </h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle='collapse' data-target='#navbarNavAltMarkup' data-controls='navbarNavAltMarkup' aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggle-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id='navbarNavAltMarkup'>
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="http://localhost/shop/backend/cart.php" class="nav-item nav-link active">
                   <h5 class="px-5 cart head5">
                    <i class="fas fa-shopping-cart"></i>Cart
                    <?php
                        if(isset($_SESSION['cart'])){
                            $count=count($_SESSION['cart']);
                            echo "<span id=\"count\" class=\"text-warning \">$count</span>";
                        } else{
                            echo "<span id=\'count\'>0</span>";
                        }
                    ?>
                    
                   </h5>
               </a>
            </div>
        </div>
    </nav>
</header>
<style>
   .head5{
    margin-left: 777px !important;
   }
</style>