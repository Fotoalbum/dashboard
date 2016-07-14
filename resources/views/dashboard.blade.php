@include('layout/header')

<content id="dashboard">

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
	
	<div class="col-md-4 col-sm-4 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading"><strong>Last 30 days</strong> <span class="pull-right"><i class="fa fa-calendar" aria-hidden="true"></i></span></div>
			<div class="panel-body">
				<!-- Chart for last 30 days -->
				<div id="chartContainer"></div>	
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading"><strong>Last 24 hours</strong> <span class="pull-right"><i class="fa fa-hourglass-half" aria-hidden="true"></i></span></div>
			<div class="panel-body">
				
				
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<p>
							<strong>[FLAG] Netherlands  	<br />
									[FLAG] Belgium (NL) 	<br />
									[FLAG] Belgium (FRA) 	<br />
									[FLAG] France 			
							</strong>
						</p>	
					</div>		
					<div class="col-md-3 col-sm-3 col-xs-12 text-right">
						<p>
							<?php echo $nl_total_orders; ?><br />
							<?php echo $nlbe_total_orders; ?><br />
							<?php echo $frbe_total_orders; ?><br />
							<?php echo $fra_total_orders; ?>

						</p>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 text-right">
						<p>
							<?php echo $nl_total_money; ?><br />
							<?php echo $nlbe_total_money; ?><br />
							<?php echo $frbe_total_money; ?><br />
							<?php echo $fra_total_money; ?>
						</p>
					</div>
				</div><!-- // row -->

				<!-- Divider -->
				<div class="row"><div class="col-md-12"><div class="divider small">&nbsp;</div></div></div>
				<!-- // Divider -->					

				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h3 class="margintop0"><strong>Orders in total:</strong></h3>	
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 text-right">
						<h3 class="margintop0"><?php echo $total_orders; ?></h3>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 text-right">
						<h3 class="margintop0"><?php echo $total_money; ?></h3>
					</div>
				</div><!-- // row -->					
			</div>
		</div>
	</div>
	
</content><!-- // content -->






<script type="text/javascript">
 $(document).ready(function (){			
	var chart = new CanvasJS.Chart("chartContainer",
	{      
	 theme:"theme5",
      animationEnabled: true,
      axisY :{
        includeZero: false,
        // suffix: " k",
        //valueFormatString: "",
        prefix: "€",
		//suffix: ".-"
      },
      toolTip: {
        shared: "true"
      },
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

	/* Set Height of 30 day chart. */
	var heightOf30days = $("#chartContainer .canvasjs-chart-canvas").height();
	$("#chartContainer").css("height", heightOf30days);
});
</script>



@include('layout/footer')