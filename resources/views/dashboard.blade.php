@include('layout/header')

<content id="dashboard">

	<div class="well text-center">
		Well.. well.. well..<br />
		<br />
		vars: $nldOrders (50 pcs), $nlbeOrders (50?)
	</div>
	

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
		<!-- Last 24 hour stats -->
		<div class="panel panel-primary">
			<div class="panel-heading"><strong>Last 24 hours</strong> <span class="pull-right"><i class="fa fa-hourglass-half" aria-hidden="true"></i></span></div>
			<div class="panel-body">
				
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<p>
							<strong><img src="{{ url('static/images/country-flags/nl.png') }}" class="countryflag">Fotoalbum.nl<br />
									<img src="{{ url('static/images/country-flags/be.png') }}" class="countryflag">Fotoalbum.be<br />
									<img src="{{ url('static/images/country-flags/be.png') }}" class="countryflag">Albumphoto.be<br />
									<img src="{{ url('static/images/country-flags/fr.png') }}" class="countryflag">Albumphoto.fr<br />	
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
						<h3 class="margintop0 marginbottom0"><strong>Orders in total:</strong></h3>	
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 text-right">
						<h3 class="margintop0 marginbottom0"><?php echo $total_orders; ?></h3>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 text-right">
						<h3 class="margintop0 marginbottom0"><?php echo $total_money; ?></h3>
					</div>
				</div><!-- // row -->					
			</div>
		</div>
		<!-- // Last 24 hour stats -->
		
		<div class="panel panel-primary">
			<div class="panel-heading"><strong>XXX</strong> <span class="pull-right"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span></div>
			<div class="panel-body">
				
				<div class="row">
				
				</div><!-- // row -->
			
			</div>
		</div>
	</div>
	
	<div class="col-md-3 col-sm-3 col-xs-12">
		<div class="panel panel-primary uptimeDowntime">
			<div class="panel-heading">
				<strong>Uptime &amp; Information</strong>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-1">
						X<br />
						X<br />
						X<br />
						X<br />
					</div>
					<div class="col-md-6">
						Fotoalbum.nl<br />
						Fotoalbum.be<br />
						ServiceName<br />
						ServiceName<br />
					</div>
					<div class="col-md-5 text-right">
						<span class="dutchwebsitespeed">0.00s</span><br />
						<span class="dutchbelgiumwebsitespeed">0.00s</span><br />
						UptimeSpeed<br />
						UptimeSpeed<br />
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
	<div class="col-md-2 col-sm-2 col-xs-12">
		
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
	  {        
		type: "spline", 
		showInLegend: true,
		markerSize: 5,
		name: "Fotoalbum.be",
		color: "#FBEA7E",
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
	  },  
	  {        
		type: "spline", 
		showInLegend: true,
		markerSize: 5,
		name: "Albumphoto.be",
		color: "black",
		dataPoints: [        
		{label: "3", y: 4},        
		{label: "4", y: 3},        
		{label: "5", y: 2},        
		{label: "6", y: 4},        
		{label: "7", y: 5},        
		{label: "8", y: 4},        
		{label: "9", y: 2},
		{label: "10", y: 1},
		{label: "1", y: 2},        
		{label: "2", y: 3}
		]
	  },
	  {
		type: "spline", 
		showInLegend: true,
		markerSize: 5,
		name: "Albumphoto.fr",
		color: "#218EC0",
		dataPoints: [
		{label: "2", y: 3},        
		{label: "3", y: 4},        
		{label: "4", y: 3},        
		{label: "5", y: 2},        
		{label: "6", y: 4},        
		{label: "7", y: 5},        
		{label: "8", y: 4},        
		{label: "9", y: 2},
		{label: "10", y: 1},
	 	{label: "1", y: 2}
		]
	  }  
		/** Junky code **/
	  ],legend:{cursor:"pointer",itemclick : function(e) {if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){e.dataSeries.visible = false;}else {e.dataSeries.visible = true;}chart.render();}},
	});
	chart.render();

	/* Set Height of 30 day chart. */
	var heightOf30days = $("#chartContainer .canvasjs-chart-canvas").height();
	$("#chartContainer").css("height", heightOf30days);
});
</script>



@include('layout/footer')