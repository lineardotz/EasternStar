function overlay(prodid) {
	if(prodid != 0)
		{
		$.post('viewdetails.php', { productid: prodid }, function(result) { 
			$('#overlay').html(result);
		});
		}
	
	
	el = document.getElementById("overlay");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}

function addToCache(prodid)
{
	quantity = $("#selectQuantity").val();
    if(quantity == "Select")
    	{
    		alert("Please select quantity you want to add");
    	}
    else
    	{
    	$.post('addToCart.php', { productid: prodid, quantity: quantity }, function(result) { 
        	$('#myCartCount').html(result);
        });
    	overlay(0);
    	renderCart();
    	}
    
}

function removeFromCart(prodid)
{
	$.post('removeFromCart.php', { productid: prodid}, function(result) { 
    	$('#myCartCount').html(result);
    	renderCart();
    });
}

function renderCart()
{
	$.post('renderCart.php', {}, function(result) { 
    	$('#prodSummary').html(result);
    	
    });
}

$(document).ready(function(){
    $("#contactForm").submit( function () {    
      $.post(
       'mail.php',
        $(this).serialize(),
        function(data){
    	   alertAndReset(data);
        }
      );
      return false;   
    });   
});

function alertAndReset(data)
{
	var message = data;
	var n=message.match(/Thank/g);
	if(n == "Thank")
	{
		alert(message);
		document.getElementById("contactForm").reset();
	}
	else
	{
		alert(message);
	}
}

$(document).ready(function(){
    $("#finalizeOrder").submit( function () { 
      $.post(
       'insertOrder.php',
        $(this).serialize(),
        function(result){
    	   renderSummary(result);
        }
      );
      return false;
    });   
});

function renderSummary(result) {	
	$('#scrollSection').html(result);
	$('#myCartCount').html("(0)");
}