@include('layout/header')


<div class="container">


	<div class="well text-center">
		Well.. well.. well..<br />
		<br />
		vars: $nldOrders (50 pcs), $nlbeOrders (50?)
	</div>
	
	
	<div class="well">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<?php
				if(DB::connection()->getDatabaseName())
				{
				  echo "Conncted sucessfully to database: ".DB::connection()->getDatabaseName();
				} 
				?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				NL laatste orders fetched: <?php echo count($nldOrders); ?>
				<br />
				<br />
				NL-BE laatste orders fetched: <?php echo count($nlbeOrders); ?>
			</div>
		</div>
	</div><!-- // well .. -->
	
	<div class="col-md-6 col-sm-6 col-xs-6">
		<div id="chartContainer"></div>
	</div>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	
	<div class="div">

		<?php
			$totalNLorders	= 0;	// Lets count.
			$nldOrder 		= [];
			$today_date 	=  date('Ymd H:i:s');	
		
			foreach ($nldOrders as $nldOrder){
				$order_created 	= $nldOrder->created;
				$hourdiff 		= round((strtotime($today_date) - strtotime($order_created))/3600, 0);
				$total_price 	= number_format($nldOrder->subtotal + $nldOrder->shipping - $nldOrder->discount, 2, '.', '');
		
				if($hourdiff < 24 && $total_price > 0){
					$totalNLorders++;
					echo "Legit.." .$total_price. " - " .$totalNLorders. "<br />";
				}
			} 
		?>
		<?php
			$totalNLBEorders = 0;	// Lets count.
			$nldOrder 		 = [];
			$today_date 	 =  date('Ymd H:i:s');	
		
			foreach ($nlbeOrders as $nlbeOrder){
				$order_created 	= $nlbeOrder->created;
				$hourdiff 		= round((strtotime($today_date) - strtotime($order_created))/3600, 0);
				$total_price 	= number_format($nlbeOrder->subtotal + $nlbeOrder->shipping - $nlbeOrder->discount, 2, '.', '');
		
				if($hourdiff < 24 && $total_price > 0){
					$totalNLBEorders++;
					echo "Legit.." .$total_price. " - " .$totalNLBEorders. "<br />";
				}
			} 
		?>
		
		<h1> Total orders in Netherlands: <?php echo $totalNLorders; ?></h1>
		<h1> Total orders in Belgie: <?php echo $totalNLBEorders; ?></h1>
	
	</div>
	
	

	<script type="text/javascript">
		   window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer",
			{      
			  theme: "theme5",
			  title:{ text: "Last 30 days" },
			  animationEnabled: true,
			  axisY :{
				includeZero: false,
				valueFormatString: "#,,.",
				suffix: " ??"
			  },
			  toolTip: { shared: "true" },
			  
			  /* Nederland */
			  data: [
			  {        
				type: "spline", 
				showInLegend: true,
				name: "Fotoalbum.nl",
				markerSize: 6,        
				color: "orange",
				dataPoints: [
				{label: "1", y: 1},
				{label: "2", y: 2},        
				{label: "3", y: 3},        
				{label: "4", y: 4},        
				{label: "5", y: 3},        
				{label: "6", y: 2},        
				{label: "7", y: 4},        
				{label: "8", y: 5},        
				{label: "9", y: 4},        
				{label: "10", y: 2}        
				]
			  },
			  /* Belgie (fotoalbum.be) */
			  {        
				type: "spline", 
				showInLegend: true,
				markerSize: 5,
				name: "Fotoalbum.be",
				color: "yellow",
				dataPoints: [
				{label: "1", y: 2},        
				{label: "2", y: 3},        
				{label: "3", y: 4},        
				{label: "4", y: 3},        
				{label: "5", y: 2},        
				{label: "6", y: 4},        
				{label: "7", y: 5},        
				{label: "8", y: 4},        
				{label: "9", y: 2},
				{label: "10", y: 1}
				]
			  } ],legend:{cursor:"pointer",itemclick : function(e) {if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){e.dataSeries.visible = false;}else {e.dataSeries.visible = true;}chart.render();}},
			});

		chart.render();
		}
	</script>

	
	
</div>

@include('layout/footer')