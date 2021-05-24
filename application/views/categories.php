<!-- Page Title -->
		<section class="page-title style-2 text-center">
			<div class="container relative clearfix">
				<div class="title-holder">
					<div class="title-text">
						<h1 class="uppercase"><?php echo $cat ?></h1>
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url() ?>">Home</a>
							</li>
							
							<li class="active">
								<?php echo $cat ?>
							</li>
						</ol>
					</div>
				</div>
			</div>
		</section> <!-- end page title -->
        
        
<!-- Catalogue -->
		<section class="section-wrap pt-70 pb-40 catalogue">
			<div class="container relative">
				<div class="row">

					<div class="col-md-9 catalogue-col right mb-50">

						<div class="shop-filter">
							<div class="view-mode hidden-xs">
								
							</div>
							<div class="filter-show hidden-xs">
								
							</div>
							
						</div>

						<div class="shop-catalogue list-view left">

							<div class="row items-grid">
<?php if( !empty($product) ) { ?>
                 <?php foreach ($product as $products){ ?>
								


        <div class="col-md-4 col-xs-6 product product-list">
    <div class="product-item">
    <div class="product-img hover-1">
    <a href="<?php echo base_url('product/'.$products['slug']); ?>">
    <img src="<?=base_url().'uploads/'.$products['pic1']?>" alt="">
   
    </a>
    <div class="hover-overlay">
    <div class="product-add-to-wishlist">
    <a href="#"><i class="fa fa-heart-o"></i></a>
    </div>
    <div class="product-actions">
    <form action="<?php echo base_url(); ?>cart/add" method="post" enctype="multipart/form-data">
<input type="hidden" name="quantity" min="1"  style="max-width:50px;" value="1" >
<input type="hidden" name="name" value="<?php echo $products['title']; ?>" />
<input type="hidden" name="price" value="<?php echo $products['price']; ?>"  />
<input type="hidden" name="pic1" value="<?php echo $products['pic1']; ?>"  />
<input type="hidden" name="id" value="<?php echo $products['prod_id']; ?>"  />
<input type="hidden" name="desc" value="<?php echo $products['description']; ?>"  />
<input type="hidden" name="slug" value="<?php echo $products['slug']; ?>"  />


      <input type="submit" value= "Add to Cart" class="btn btn-dark btn-md">
     		
						
                       </form>
   
   
    </div>
    <div class="product-quickview">
    
    </div>
    </div>
    </div>
    
    <div class="product-details">
    <h3><?php $string = $products['title']; ?>
    <a class="product-title" href="<?php echo base_url('product/'.$products['slug']); ?>"><?php echo $string = character_limiter($string, 50); ?></a>
    </h3>
    <?php if(round($products['rating'])=='1'){ ?>
         <div id="rate1"></div>
         <?php }elseif(round($products['rating'])=='2'){ ?>
         <div id="rate2"></div>
         <?php }elseif(round($products['rating'])=='3'){ ?>
          <div id="rate3"></div>
          <?php }elseif(round($products['rating'])=='4'){ ?>
           <div id="rate4"></div>
          <?php }elseif(round($products['rating'])=='5'){ ?>
          <div id="rate5"></div>
          <?php }else{?>
         <div id="rate0"></div>
         <?php  }?><br>
    
    <span class="price">
    <ins>
    <span class="ammount">₦<?php echo $products['price']; ?></span>
    </ins>
    </span>
    </div>
    
    <div class="product-list-details">
    <p class="product-description"><?php echo $products['description']; ?></p>
    <ul class="product-actions clearfix">
    <li>
   <form action="<?php echo base_url(); ?>cart/add" method="post" enctype="multipart/form-data">
<input type="hidden" name="quantity" min="1"  style="max-width:50px;" value="1" >
<input type="hidden" name="name" value="<?php echo $products['title']; ?>" />
<input type="hidden" name="price" value="<?php echo $products['price']; ?>"  />
<input type="hidden" name="pic1" value="<?php echo $products['pic1']; ?>"  />
<input type="hidden" name="id" value="<?php echo $products['prod_id']; ?>"  />
<input type="hidden" name="desc" value="<?php echo $products['description']; ?>"  />
<input type="hidden" name="slug" value="<?php echo $products['slug']; ?>"  />


      <input type="submit" value= "Add to Cart" class="btn btn-dark btn-md">
     		
						
                       </form>
    </li>
    <li>
    <div class="icon-add-to-wishlist left">
    
    </div>
    </li>
    </ul>
    </div>
    </div>
    </div><hr />


							
                            
                            
                            
                            
  <?php }} else{?>
   <div style="text-align:center">
   <strong><em>No Product is this category Yet.. Check Back Soon</em></strong>
   </div>
   
   <?php  } ?>                             
            

							</div> <!-- end row -->

						</div> <!-- end grid mode -->

						<!-- Pagination -->
						<nav class="pagination clear">
	<div class="row"><?php echo $this->pagination->create_links(); ?></div>
						</nav>

					</div> <!-- end col -->