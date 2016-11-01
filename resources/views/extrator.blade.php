@include('layout/header')

<div class="container" style="margin-top:25px;">
	<h1>Fotoalbum order transformer:</h1>
	
	<div class="well">
		<div class="alert notfound hidden alert-danger">
			This order id is not found!
		</div>
	
		<form class="form-horizontal" id="fetchForm" role="form" method="POST">
			<div class="form-group">
				<input type="text" name="id" class="form-control" placeholder="Order ID, something like 53f1b7a3-7160-4670-a331-76ac4f63bb0e">
			</div>

			<div class="form-group text-right marginbottom0">
				<button type="submit" class="btn btn-primary btn-lg margintop10">Fetch Data</button>
			</div>

		</form>
	</div>
	
	<div id="result" style="display:none;">
		<h2 class="pull-left">Result:</h2>
		<h2 class="pull-right">Country: <span class="country">(?)</span></h2>
		
		<table class="table table-condensed">
			<thead style="user-select: none;">
				<tr>
					<th>Old PDF name</th>
					<th>Filename</th>
					<th>Orderid</th>
					<th>Chunk</th>
					<th>Quantity</th>
					<th>Option</th>
					<th>Product nr.</th>
				</tr>
			</thead>
			
			<h3>PDF &amp; Order info:</h3>
			<tbody>
				<tr>
					<td class="oldpdfname"></td>
					<td></td>
					<td class="orderid"></td>
					<td class="chunk">?</td>
					<td class="quantity"></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
			
		</table>
		
		<table class="table table-condensed">
			<thead style="user-select: none;">
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Address1</th>
					<th>Address2</th>
					<th>Address3</th>
					<th>Zip code</th>
					<th>City</th>
				</tr>
			</thead>
			<h3>Address:</h3>
			<tbody>
				<tr>
					<td class="firstname"></td>
					<td class="lastname"></td>
					<td class="address1"></td>
					<td class="address2"></td>
					<td class="address3"></td>
					<td class="zip"></td>
					<td class="city"></td>
				</tr>
			</tbody>
		</table>
	</div>
	
	
</div>

<script>
$(document).ready(function (){
	var form = $("#fetchForm");
	if (form) {console.log("Found the form!");}
	
	
	
	form.submit(function(e){
		e.preventDefault();
		var formData = form.serialize();

		$.ajax({
			url:'<?php echo url('/fetchdata');?>',
			type:'POST',
			data:formData,
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

			success:function(data){
				console.log("Success! || " +data);
				$("#result").slideDown();
				var obj = JSON.parse(data);
				$("#result .country").html(obj.country); // Show country.
				
				/** Make table **/
				$("#result .table .oldpdfname").html(obj.oldpdfname); // Show oldpdfname.
				$("#result .table .orderid").html(obj.orderid); // Show orderid.
				$("#result .table .quantity").html(obj.quantity); // Show quantity.
				
				$("#result .table .firstname").html(obj.firstname); // Show firstname.
				$("#result .table .lastname").html(obj.lastname); // Show lastname.
				$("#result .table .address1").html(obj.address1); // Show Adress.
				$("#result .table .address2").html(obj.address2); // Show Adress.
				$("#result .table .address3").html(obj.address3); // Show Adress.
				$("#result .table .city").html(obj.city); // Show City.
				$("#result .table .zip").html(obj.zip); // Show Zip.
				
				
			},
			error: function (data) {
				console.log("ERROR! || " +data);
				
				
			}
		});//ajax
	});
	
});
</script>

@include('layout/footer')