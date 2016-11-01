$(document).ready(function (){
	/* Vars */
	

	
	/* Dev thing. */
	$(".well").on("click", function(){
		$(".well").hide();
	}); 
	
	checkwebsiteNL();
	
	
	function checkwebsiteNL(){
		var durationWebsite = new Date().getTime();
		$.ajax({
			type: "GET",
			url: "http://www.fotoalbum.nl/",
			complete: function () {
				var duration = (new Date().getTime() - durationWebsite) / 1000;		
				$(".uptimeDowntime span.dutchwebsitespeed").html(duration+" s");
				checkwebsiteNLBE();													//  Now run on Fotoalbum.be
			}
		});	
	}
	
	function checkwebsiteNLBE(){
		var durationWebsite = new Date().getTime();
		$.ajax({
			type: "GET",
			url: "http://www.fotoalbum.be/",
			complete: function () {
				var duration = (new Date().getTime() - durationWebsite) / 1000;
			
				$(".uptimeDowntime span.dutchbelgiumwebsitespeed").html(duration+" s");
			}
		});	
	}
	

	
	
	

});