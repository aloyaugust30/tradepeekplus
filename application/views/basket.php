<!-- Page Title -->
		<section class="page-title style-2 text-center">
			<div class="container relative clearfix">
				<div class="title-holder">
					<div class="title-text">
						<h1 class="uppercase">Celebrant Cart</h1>
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url() ?>">Home</a>
							</li>
							
							<li class="active">
								Celebrant Cart
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
<th class="product-quantity">Desired Price</th>

</tr>
</thead>
<tbody>
<?php foreach ($this->cart->contents() as $items): ?>

<form action="<?php echo base_url(); ?>basket/add/<?php echo $items['id'] ?>" method="post"
 enctype="multipart/form-data">

<tr class="cart_item rowid<?php echo $items['rowid'] ?>">
<td class="product-thumbnail">
<a href="">
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
<input type="text" name="ownprice" style="max-width:100px;" value="<?php echo $items['price']; ?>" >

<input type="hidden" name="title" value="<?php echo $items['name'] ?>">
            <input type="hidden" name="price" value="<?php echo $items['price'] ?>">
            <input type="hidden" name="prod_id" value="<?php echo $items['id'] ?>">
</div>
</td>

<td class="product-remove">
<input type="submit" name="submit" class="btn btn-dark btn-md add-to-cart" value="Confirm" /> 
</td>


</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>

 <!-- end row -->
		


</div>
</section>
