<?php include 'header.php'; ?>

<style>
    .whatsapp-icon {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 9999;
      width: 60px;
      height: 60px;
      background-color: #6FA7E4;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      font-size: 24px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25);
    }
  </style>

  
<a href="<?php echo base_url();?>index.php/App/dishSearchPage"  class="whatsapp-icon">
    <i class="fa fa-plus"></i> <!-- Add your own WhatsApp icon here -->
</a>

	<!-- Table Order -->
	<div class="checkout app-pages app-section">
		<div class="container">
			<div class="pages-title">
				<h3>Recent Orders</h3>
			</div>
			<div class="entry">
				<div class="order shadow">
					<h5>Table Order</h5>
					<div class="row">
						<div class="col s8">
							<h6>Fashion Style</h6>
						</div>
						<div class="col s4 text-right">
							<h6>$140.00</h6>
						</div>
						<div class="col s8">
							<h5><span>Total</span></h5>
						</div>
						<div class="col s4 text-right">
							<h5><span>$306</span></h5>
						</div>
						<button class="button shadow">Process to Checkout</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Table Order -->


    <!-- New Table Order -->
	<div class="checkout app-pages app-section" style="margin-top:-2.5rem;">
		<div class="container">
			<div class="pages-title">
				<h3>New Orders </h3>
			</div>
			<div class="entry">
				<div class="order shadow">
					<h5>Table Order</h5>
					<div class="row">
						<div class="col s8">
							<h6>Fashion Style</h6>
						</div>
						<div class="col s4 text-right">
							<h6>$140.00</h6>
						</div>
						<div class="col s8">
							<h5><span>Total</span></h5>
						</div>
						<div class="col s4 text-right">
							<h5><span>$306</span></h5>
						</div>
						<button class="button shadow">Process to Checkout</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End New Table Order -->

    <?php include 'footer.php'; ?>