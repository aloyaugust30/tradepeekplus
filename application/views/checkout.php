<!-- Page Title -->
		<section class="page-title style-2 text-center">
			<div class="container relative clearfix">
				<div class="title-holder">
					<div class="title-text">
						<h1 class="uppercase">Shopping Cart</h1>
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url() ?>">Home</a>
							</li>
							
							<li class="active">
								Shopping Cart
							</li>
						</ol>
					</div>
				</div>
			</div>
		</section> <!-- end page title -->
      
<!-- Cart -->
		<section class="section-wrap-small shopping-cart">
<div class="container relative">
<div class="row">

<div class="col-md-12">
<div class="table-wrap mb-30">
<table class="shop_table cart table">
<thead>
<tr>
<th class="product-name" colspan="2">Product</th>
<th class="product-price">Price</th>
<th class="product-quantity">Quantity</th>
<th class="product-subtotal">Total</th>
</tr>
</thead>
<tbody>
<?php foreach ($this->cart->contents() as $items): ?>

<form action="<?php echo base_url(); ?>cart/update/<?php echo $items['rowid'] ?>" method="post" enctype="multipart/form-data">

<tr class="cart_item">
<td class="product-thumbnail">
<a href="#">
<img src="<?=base_url().'uploads/'.$items['image']?>" alt="">
</a>
</td>
<td class="product-name">
<a><?php echo $items['name']; ?></a>
<ul>
<li><p class="text"><?php $string = $items['desc']; ?>
<?php echo $string = character_limiter($string, 250); ?> </p></li>
</ul>
</td>
<td class="product-price">
<span class="amount">₦<?php echo $items['price']; ?></span>
</td>
<td class="product-quantity">
<div class="quantity buttons_added">
<input type="number" name="qty" min="1"  style="max-width:100px;" value="<?php echo $items['qty']; ?>" >
</div>
</td>
<td class="product-subtotal">
<span class="amount">₦<?php echo $this->cart->format_number($items['subtotal']); ?></span>
</td>
<td class="product-remove">
<input type="submit" name="submit" class="btn btn-dark btn-md add-to-cart" value="Update Cart" /> 
</td>

<td class="product-remove">
<a href="<?php echo base_url(); ?>cart/remove/<?php echo $items['rowid'] ?>" class="remove" title="Remove this item"></a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 shipping-calculator-form">






</div> <!-- end col shipping calculator -->

<div class="col-md-6">
<div class="cart_totals">
<h2 class="heading relative heading-small uppercase bottom-line style-2 left-align mb-30">Cart Totals</h2>

<table class="table shop_table">
<tbody>


<tr class="order-total">
<th><strong>Order Total</strong></th>
<td>
<strong><span class="amount">₦<?php echo $this->cart->format_number($this->cart->total()); ?></span></strong>
</td>
</tr>
</tbody>
</table>

<div class="actions right">

<div class="wc-proceed-to-checkout">
<?php if ($this->session->userdata('user') == 'friends'){ ?>
    
    <a href="<?php echo base_url(); ?>billing/address" class="btn btn-md btn-color">Procced to Checkout</a><br>
     <?php } else { ?>
     
     <a href="<?php echo base_url(); ?>home/celebrants" class="btn btn-md btn-color">Continue Shopping</a><br> <a href="<?php echo base_url(); ?>billing/address" class="btn btn-md btn-color">Procced to Checkout</a><br>  <a href="<?php echo base_url(); ?>basket/add" class="btn btn-md btn-color">Select as Celebrant</a> 
      <?php } ?>

</div>
</div>
</div>
</div> <!-- end col cart totals -->

</div> <!-- end row -->
		


</div>
</section>
