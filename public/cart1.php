<?php 
if(isset($_POST["resetBtn"])){
unset($_SESSION['cartItems']);
}
if(!isset($_SESSION['cartItems'])){
    $_SESSION['cartItems'] = [];
}
$cartItemCount = count($_SESSION['cartItems']);
$cartTotalSum = 0;
foreach($_SESSION['cartItems'] as $cartId => $cartItem){
    $cartTotalSum += $cartItem['price'] * $cartItem['quantity'];
}
?>
<div class="row">
    <div class="text-red col-lg-12 col-sm-12 col-12 main-section text-right">
        <button type="button" class="btn btn-info" data-toggle="dropdown">
             <i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart <span class="badge badge-pill badge-danger"><?=htmlentities($cartItemCount)?></span>
        </button>
        <div class="dropdown-menu">
            <div class="row total-header-section">
                <div class="col-lg-6 col-sm-6 col-6">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i><?=htmlentities($cartItemCount)?>
                    <span class="badge badge-pill badge-danger"></span>
                </div>
                <div class="col-lg-6 col-sm-6 col-6 text-right">
                    <form action="" method="POST">
                        <input type="submit" class="btn btn-info" name="resetBtn" value="remove">
                    </form>
                </div>
            </div>
            <hr>
            <?php foreach($_SESSION['cartItems'] as $cartId => $cartItem) { ?>
            <div class="row cart-detail">
                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                    <img src="<?=htmlentities($cartItem['img_url'])?>" width="20px" height="20px">
                </div>
                <div class="col-lg-8 col-sm-8 cart-detail-product">
                    <p><?=htmlentities($cartItem['title'])?></p>
                    <span class="price text-info"><?=htmlentities($cartItem['price'])?> Kr</span>
                    <span class="count">Total: <?=htmlentities($cartItem['quantity'])?></span>
                </div>
            </div>
            <hr>
            <?php } ?>
            <div class="col-lg-6 col-sm-6 col-6 total section text-right">
                <p>Total: 
                <span class="text-info"><?=htmlentities($cartTotalSum)?> kr</span>
                </p>
            </div>

            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                <a href="checkout.php" class="btn btn-primary btn-block">Checkout</a>
            </div>
        </div>
    </div>
</div>
