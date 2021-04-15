$(document).ready(function(){

	$('#l2').hide();		
	$('#l3').hide();
	
	 $("#lien1").on({
	 	click:function(){
	 		$('#l1').show();
	 		$('#l2').hide();
	 		$('#l3').hide();
	 	}
	 });
	  $("#lien2").on({
	 	click:function(){
	 		$('#l1').hide();
	 		$('#l2').show();
	 		$('#l3').hide();
	 	}
	 });
	   $("#lien3").on({
	 	click:function(){
	 		$('#l1').hide();
	 		$('#l2').hide();
	 		$('#l3').show();
	 	}
	 });

});