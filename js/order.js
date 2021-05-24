


var shipping_prices = new Array();
shipping_prices["High School"]=10;
shipping_prices["Undergraduate"]=20;






// getCakeSizePrice() finds the price based on the size of the cake.
// Here, we need to take user's the selection from radio button selection
function getShippingPrice() {
	var cakeRadio = document.getElementsByName('shipping');

	for (i=0; i < cakeRadio.length; i++) {
		if (cakeRadio[i].checked) {
			user_input = cakeRadio[i].value;
		}
	}

	return shipping_prices[user_input];
}   



function calculateTotal() {
	var total = getServicePrice() + getPaperPrice() + getSubjectPrice() + getAlevelPrice() + getPagePrice() + getSpacingPrice() + getUrgencyPrice();
	var totalEl = document.getElementById('totalPrice');
	
	document.getElementById('totalPrice').innerHTML = "Your Total is: N" + total;
	totalEl.style.display = 'block';
	
	
}

function hideTotal() {
	var totalEl = document.getElementById('totalPrice');
	totalEl.style.display = 'none';
}

function setValue(){
    document.order.price.value = getServicePrice() + getPaperPrice() + getSubjectPrice() + getAlevelPrice() + getPagePrice() + getSpacingPrice() + getUrgencyPrice();
    document.forms["order"].submit();
}