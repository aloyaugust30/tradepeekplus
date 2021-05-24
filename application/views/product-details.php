<!-- Page Title -->
		<section class="page-title style-2 text-center">
			<div class="container relative clearfix">
				<div class="title-holder">
					<div class="title-text">
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url() ?>">Home</a>
							</li>
							
							<li class="active">
								<?php echo $product['title']; ?>
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

<div class="col-sm-6 col-xs-12 mb-60">

<div class="gallery-main" >

<div class="gallery-cell">
<a href="<?=base_url().'uploads/'.$product['pic1']?>" class="lightbox-product">
<img src="<?=base_url().'uploads/'.$product['pic1']?>" alt="" />
<i class="arrow_expand"></i>
</a>
</div>
<div class="gallery-cell">
<a href="<?=base_url().'uploads/'.$product['pic2']?>" class="lightbox-product">
<img src="<?=base_url().'uploads/'.$product['pic2']?>" alt="" />
<i class="arrow_expand"></i>
</a>
</div>
<div class="gallery-cell">
<a href="<?=base_url().'uploads/'.$product['pic3']?>" class="lightbox-product">
<img src="<?=base_url().'uploads/'.$product['pic3']?>" alt="" />
<i class="arrow_expand"></i>
</a>
</div>

</div> <!-- end gallery main -->

<div class="gallery-thumbs">

<div class="gallery-cell">
<img src="<?=base_url().'uploads/'.$product['pic1']?>" alt="" />
</div>
<div class="gallery-cell">
<img src="<?=base_url().'uploads/'.$product['pic2']?>" alt="" />
</div>
<div class="gallery-cell">
<img src="<?=base_url().'uploads/'.$product['pic3']?>" alt="" />
</div>


</div> <!-- end gallery thumbs -->

</div> <!-- end col img slider -->

<div class="col-sm-6 col-xs-12 product-description-wrap">
<h1 class="product-title"><?php echo $product['title']; ?></h1>
<label> Vendor: </label> <?php echo $product['shname']; ?>
<span class="price">

<ins>
<span class="ammount">₦<?php echo $product['price']; ?></span>
</ins>
</span>
<p class="product-description"><?php echo $product['description']; ?></p>




<ul class="product-actions clearfix">
<li>


<form action="<?php echo base_url(); ?>cart/add" method="post" enctype="multipart/form-data">
<label> Quantity: </label>
<input type='button' value='-' class='qtyminus' field='quantity' />
    <input type='text' name='quantity' value='1' min="1" class='qty'  style="max-width:100px;" />
    <input type='button' value='+' class='qtyplus' field='quantity' />
    

<input type="hidden" name="name" value="<?php echo $product['title']; ?>" />
<input type="hidden" name="price" value="<?php echo $product['price']; ?>"  />
<input type="hidden" name="pic1" value="<?php echo $product['pic1']; ?>"  />
<input type="hidden" name="id" value="<?php echo $product['prod_id']; ?>"  />
<input type="hidden" name="desc" value="<?php echo $product['description']; ?>"  />
<input type="hidden" name="slug" value="<?php echo $product['slug']; ?>"  />
<input type="hidden" name="ven_id" value="<?php echo $product['ven_id']; ?>"  /><br>
<input type="submit" name="submit" class="btn btn-dark btn-md add-to-cart" value="Add To Cart" />
</form>

</li>
<li>

</li>
<li>
<div class="icon-add-to-wishlist left">
</div>
</li>
</ul>

<div class="product_meta">
<span class="sku">SKU: <a href="#"><?php echo $product['quantity']; ?></a></span>
<span class="posted_in">Category: <a href="#"><?php echo $product['sub_category']; ?></a></span>

</div>

<div class="socials-share clearfix">
<span>Share:</span>

</div>
</div> <!-- end col product description -->
</div> <!-- end row -->

<!-- tabs -->
<div class="row">
<div class="col-md-12">
<div class="tabs">
<ul class="nav nav-tabs">
<li class="active">
<a href="#tab-description" data-toggle="tab">Description</a>
</li>

<li>
<a href="#tab-reviews" data-toggle="tab">Reviews</a>
</li>
</ul> <!-- end tabs -->

<!-- tab content -->
<div class="tab-content pb-0">

<div class="tab-pane fade in active" id="tab-description">
<p>
<?php echo $product['description']; ?>
</p>
</div>



<div class="tab-pane fade" id="tab-reviews">

<div class="reviews">
<ul class="reviews-list">

<?php foreach ($rate as $rate_item): ?>
<li>
<div class="review-body">
<div class="review-content">
<p class="review-author my-text"><strong><?php echo $rate_item['fname']; ?></strong> - <?php $date = strtotime($rate_item['date']); ?>
		<?php echo date('j F Y', $date); ?></p>
<div class="">
<div class="rating-left">
    <?php if($rate_item['rate']=='1'){ ?>
     <div id="rate1"></div>
</div>
<div class="rating-left">
    <?php }elseif($rate_item['rate']=='2'){ ?>
    <div id="rate2"></div>
</div>
<div class="rating-left">
    <?php }elseif($rate_item['rate']=='3'){ ?>
<div id="rate3"></div>
</div>
<div class="rating-left">
 <?php }elseif($rate_item['rate']=='4'){ ?>
<div id="rate4"></div>
</div>
<div class="rating-left">
     <?php }elseif($rate_item['rate']=='5'){ ?>
<div id="rate5"></div>
</div>
<div class="rating-left">
 <?php }else{?>
<div id="rate0"></div>
<?php  }?>
</div>
<div class="clearfix"> </div>
									</div>
<p class="my-text"><?php echo $rate_item['review']; ?></p>
</div>
</div>
</li>
<?php endforeach; ?>




</ul>
</div> <!--  end reviews -->
</div>

</div> <!-- end tab content -->

</div>
</div> <!-- end tabs -->
</div> <!-- end row -->


</div> <!-- end container -->
</section> <!-- end single product -->

<script>

jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 1) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
});

</script>