<div class="main-wrapper oh">

<!-- Page Title -->
		<section class="page-title style-2 text-center">
			<div class="container relative clearfix">
				<div class="title-holder">
					<div class="title-text">
                    <h1 class="uppercase">Checkout</h1>
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url() ?>">Home</a>
							</li>
							
							<li class="active">
								Checkout
							</li>
						</ol>
					</div>
				</div>
			</div>
		</section> <!-- end page title -->
  
<!-- Single Product -->
<section class="section-wrap-small single-product">
<div class="container relative">
<div class="row">

<div class="col-sm-9 col-xs-12 ">

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
<?php echo $items['qty']; ?>
</div>
</td>
<td class="product-subtotal">
<span class="amount">₦<?php echo $this->cart->format_number($items['subtotal']); ?></span>
</td>


</tr>

<?php endforeach; ?>

<tr>
        <td colspan="2"> </td>
       
        <td class="right"><strong>Total</strong></td>
        <td class="">₦<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>		
</tbody>
</table>
</div>
    <hr />

<form action="<?php echo base_url(); ?>pay/getAuthURL" method="post" enctype="multipart/form-data" class="text">
    <div id="shippingText">
    <h3 >Choose Shipping option</h3><br />
    
  
  
 <ul class="radio-buttons">
 <li class="text">   
  <input type="radio" name="shipping" class="input-radio" value="standard" id="radio1" required="required" onclick="calculateTotal()"> <label for="radio1">Standard Shipping ₦1000.00</label><br>
  </li>
  <li class="text">
  <input type="radio" name="shipping" class="input-radio" value="express" id="radio2" required="required" onclick="calculateTotal()"> 
  <label for="radio2">Express Shipping ₦2000.00</label><br>
  </li>
 
</ul>

    </div>
    <hr />
    
</div> <!-- end col img slider -->

<div class="col-sm-3 col-xs-12 order-details">
<h3>Order Details</h3><br />
<div class="order">
<ul>
<li>No of Items: <?php echo $rows = count($this->cart->contents()); ?> items </li>

<li>Price: ₦<?php echo $this->cart->format_number($this->cart->total()); ?>  </li>
</ul>
</div>
<div class="produced">
<input type="hidden" name="total" id="total" value="" />
<input type="hidden" name="title" value="<?php echo $items['name']; ?>" />
<input type="hidden" name="prod_id" value="<?php echo $items['id']; ?>" />
<input type="hidden" name="qty" value="<?php echo $items['qty']; ?>" />

<div class="small-space"></div>
<?php   
				
$price= "<div id='totalPrice'></div>";
?>
<strong><?php  echo $price; ?></strong>


<div class="small-space"></div>
Pay Online with:<br />
 <button class=""><img src="<?php echo base_url(); ?>images/paystack.png" width="200" height="50" alt="paystack" /> </button>
 

</form>
</div> <!-- end row -->




</div> <!-- end container -->
</section> <!-- end single product -->




<script>
 
 var shipping_prices = new Array();
shipping_prices["standard"]=1000;
shipping_prices["express"]=2000;






// getCakeSizePrice() finds the price based on the size of the cake.
// Here, we need to take user's the selection from radio button selection
function getShippingPrice() {
	var cakeRadio = document.getElementsByName('shipping');

	for (i=0; i < cakeRadio.length; i++) {
		if (cakeRadio[i].checked) {
			user_input = cakeRadio[i].value;
		}
	}

	return shipping_prices[user_input];
}   



var price = document.getElementById('price');


<?php
$amt = $this->cart->format_number($this->cart->total());

 $new_amt = str_replace(",","",$amt); ?>	 

var x = "<?php echo $new_amt; ?>";
function calculateTotal() {
	
	var y = getShippingPrice();
	var total = parseInt(y) + parseInt(x) ;

	var totalEl = document.getElementById('totalPrice');
	
	document.getElementById('totalPrice').innerHTML = "Your Total is: ₦" + total;
	totalEl.style.display = 'block';
	document.getElementById("total").value = total;
}




 
 </script>