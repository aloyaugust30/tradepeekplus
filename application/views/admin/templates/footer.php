<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
<li><a href="<?php echo base_url(); ?>admin/index"><i class="fa fa-tachometer"></i> <span>Home</span></a></li>

<li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>Products</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										 <ul id="menu-academico-sub" >
<li id="menu-academico-avaliacoes" ><a href="<?php echo base_url(); ?>admin/new_product">Post Product</a></li>
<li id="menu-academico-boletim" ><a href="<?php echo base_url(); ?>admin/products">View Products</a></li>

										  </ul>
									 </li>
<li><a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-users"></i> <span>All Users</span></a></li>
<li><a href="<?php echo base_url(); ?>admin/vendors"><i class="fa fa-users"></i> <span>All Vendors</span></a></li>
<li><a href="<?php echo base_url(); ?>admin/orders"><i class="fa fa-money"></i> <span>Orders</span></a></li>
<li><a href="<?php echo base_url(); ?>admin/change_level"><i class="lnr lnr-pencil"></i> <span>Change User Level</span></a></li>
<li><a href="<?php echo base_url(); ?>admin/all_admin"><i class="fa fa-user"></i> <span>View Admins</span></a></li>
<li><a href="<?php echo base_url(); ?>account/admin_reg"><i class="fa fa-users"></i> <span>Register Admins</span></a></li>
<li><a href="<?php echo base_url(); ?>account/admin_logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>

								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="<?php echo base_url(); ?>js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url(); ?>js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
  
   <!-- real-time -->
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.flot.js"></script>
	<script type="text/javascript">

	$(function() {

		// We use an inline data source in the example, usually data would
		// be fetched from a server

		var data = [],
			totalPoints = 300;

		function getRandomData() {

			if (data.length > 0)
				data = data.slice(1);

			// Do a random walk

			while (data.length < totalPoints) {

				var prev = data.length > 0 ? data[data.length - 1] : 50,
					y = prev + Math.random() * 10 - 5;

				if (y < 0) {
					y = 0;
				} else if (y > 100) {
					y = 100;
				}

				data.push(y);
			}

			// Zip the generated y values with the x values

			var res = [];
			for (var i = 0; i < data.length; ++i) {
				res.push([i, data[i]])
			}

			return res;
		}

		// Set up the control widget

		var updateInterval = 30;
		$("#updateInterval").val(updateInterval).change(function () {
			var v = $(this).val();
			if (v && !isNaN(+v)) {
				updateInterval = +v;
				if (updateInterval < 1) {
					updateInterval = 1;
				} else if (updateInterval > 2000) {
					updateInterval = 2000;
				}
				$(this).val("" + updateInterval);
			}
		});

		var plot = $.plot("#placeholder", [ getRandomData() ], {
			series: {
				shadowSize: 0	// Drawing is faster without shadows
			},
			yaxis: {
				min: 0,
				max: 100
			},
			xaxis: {
				show: false
			}
		});

		function update() {

			plot.setData([getRandomData()]);

			// Since the axes don't change, we don't need to call plot.setupGrid()

			plot.draw();
			setTimeout(update, updateInterval);
		}

		update();

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
<!-- /real-time -->

		

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->




</body>
</html>