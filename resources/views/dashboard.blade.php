@include('layout/header')


<div class="container">


	<div class="well text-center">
		Well.. well.. well..<br />
		<br />
		vars: $nldOrders (50 pcs), $nlbeOrders (50?)
	</div>
	
	
	<div class="well">
		NL laatste orders fetched: <?php echo count($nldOrders); ?>
		<br />
		<br />
		NL-BE laatste orders fetched: <?php echo count($nlbeOrders); ?>
	</div>
	
	
	<div class="div">
	
		<?php $i = "0"; ?>
		<?php
			$nldOrder = [];
		
		foreach ($nldOrders as $nldOrder){
	
		/*	echo "<pre>";
			var_dump($nldOrder->created);
			echo "</pre>";
		*/
			
		
			$order_created = $nldOrder->created;			
			$today_dt = date('Ymd', strtotime($order_created));

			$i++;

			if (time() - strtotime($order_created) < 60*60*24) {
				echo "ORDER VAN VANDAAG: ";
				echo $i;
				echo " -- ";
				echo $nldOrder->total;
				echo " -- ";
				echo $nldOrder->subtotal - $nldOrder->discount;
				echo "<br />";
				echo "<br />";
			}
	
			
	
		} ?>
		
	</div>
	
	
	
	
</div>

@include('layout/footer')