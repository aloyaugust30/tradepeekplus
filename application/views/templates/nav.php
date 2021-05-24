<!-- Preloader -->
	<div class="loader-mask">
		<div class="loader">
			"Loading..."
		</div>
	</div>

	<header class="nav-type-1">

		<div class="top-bar hidden-xs">
			<div class="container">
				<div class="row">
					<div class="top-bar-links">
						<ul class="col-sm-6">
							<li class="top-bar-email">
								<i class="fa fa-envelope"></i><a href="mailto:info@tradpeek.com">info@tradpeek.com</a>
							</li>
							<li class="top-bar-phone">
								<i class="fa fa-phone"></i><span>+ 1 888 1554 456 123</span>
							</li>
						</ul>

						<div class="col-sm-6 account">
                        
							
<?php if ($this->session->userdata('user_id') == TRUE) {?>
  <a href="<?php echo base_url(); ?>account/index"><i class="fa fa-tachometer"></i> Dashboard</a> | <a href="<?php echo base_url(); ?>account/logout"> <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>  
  <?php } else { ?>
  <a href="<?php echo base_url(); ?>account/register"> <i class="fa fa-user-plus" aria-hidden="true"></i> Register</a> | <a href="<?php echo base_url(); ?>account/login"> <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a> 
  
  <?php } ?>							
						</div>

					</div>
				</div>
			</div>
		</div> <!-- end top bar -->

		<nav class="navbar navbar-static-top">
<div class="navigation">
<div class="container relative">

<form action="<?php echo base_url(); ?>page/search" method="post" enctype="multipart/form-data" class="search-wrap">
<input type="search" name="search" class="form-control" placeholder="Type &amp; Hit Enter">
</form>

<div class="row">

<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div> <!-- end navbar-header -->

<!-- Logo -->
<div class="logo-container">
<div class="logo-wrap">
<a href="<?php echo base_url(); ?>">
<img class="logo" src="<?php echo base_url(); ?>images/logo.png" alt="logo">
</a>
</div>
</div>

<!-- Mobile Cart -->
<div class="cart-mobile hidden-lg hidden-md">
<div class="nav-cart">
<div class="cart-outer">
<div class="cart-inner">
<a class="shopping-cart relative" href="<?php echo base_url(); ?>cart/checkout">
<i class="fa fa-shopping-cart"></i>
<span><?php echo $rows = count($this->cart->contents()); ?></span>
</a>
</div>
</div>
</div>
</div>

<div class="col-md-9 nav-wrap right">
<div class="collapse navbar-collapse" id="navbar-collapse">

<ul class="nav navbar-nav navbar-right">

<li class="active">
<a href="<?php echo base_url() ?>" >Home</a>

</li>
<li class="active">
<a href="<?php echo base_url() ?>home/celebrants" >Celebrants</a>

</li>
<li class="active">
<a href="<?php echo base_url() ?>home/friends" >Friends &amp; Family</a>

</li>
<li class="active">
<a href="<?php echo base_url() ?>account/vendors" >Vendors</a>

</li>




<!-- end features -->

<li id="mobile-search" class="hidden-lg hidden-md">
<form action="<?php echo base_url(); ?>page/search" method="post" class="mobile-search" enctype="multipart/form-data">
<input type="search" name="search" class="form-control" placeholder="Search...">
<button type="submit" class="search-button">
<i class="fa fa-search"></i>
</button>
</form>
</li>

<li>
<a href="#" class="nav-search">
<i class="fa fa-search search-trigger"></i>
<i class="fa fa-times search-close"></i>
</a>
</li>

<!-- Cart -->
<li class="nav-cart-wrap style-1 hidden-sm hidden-xs">
<div class="nav-cart">
<div class="cart-outer">
<div class="cart-inner">
<a class="shopping-cart relative" href="<?php echo base_url(); ?>cart/checkout">
<i class="fa fa-shopping-cart"></i>
<span><?php echo $rows = count($this->cart->contents()); ?></span>
</a>
</div>
</div>
<div class="nav-cart-container">
<div class="nav-cart-items">

<?php foreach ($this->cart->contents() as $items): ?>

<div class="nav-cart-item clearfix">
<div class="nav-cart-img">
<a href="#">
<img src="<?=base_url().'uploads/'.$items['image']?>" alt="">
</a>
</div>
<div class="nav-cart-title">
<a href="#">
<?php echo $items['name']; ?>
</a>
<div class="nav-cart-price">
<span><?php echo $items['qty']; ?> x</span>
<span>₦<?php echo $items['price']; ?></span>
</div>
</div>
<div class="nav-cart-remove">
<a href="#"></a>
</div>
</div>
<?php endforeach; ?>

</div>

<div class="nav-cart-summary">
<span>Cart Subtotal</span>
<span class="total-price">₦<?php echo $this->cart->format_number($this->cart->total()); ?></span>
</div>

<div class="nav-cart-actions mt-20">
<a href="<?php echo base_url() ?>cart/checkout" class="btn btn-md btn-dark">View Cart</a>
<a href="shop-checkout.html" class="btn btn-md btn-color mt-10">Proceed to Checkout</a>
</div>
</div>

</div>
</li> <!-- end cart -->

</ul> <!-- end menu -->
</div> <!-- end collapse -->
</div> <!-- end col -->

</div> <!-- end row -->
</div> <!-- end container -->
</div> <!-- end navigation -->
</nav>
 <!-- end navbar -->
	</header>