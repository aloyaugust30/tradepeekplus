// JavaScript Document
$(document).ready(function(){  
$("#submit").click(function(){
var review = $("#review").val();
var count2 = $("#count2").val();
var prod_id = $("#prod_id").val();


// Returns successful data submission message when the entered information is stored in database.
var dataString = 'review1='+ review + '&count1='+ count2 + '&prod_id1='+ prod_id;
if(review=='')
{
	alert("Please Enter a Comment");
}
else
{
	//AJAX code to submit form.
	$.ajax({
			type: "POST",
			url: "rating/add",
			data: dataString,
			cache: false,
			success: function(result){
								alert(result);
									}
	});
}
return false;
});
});