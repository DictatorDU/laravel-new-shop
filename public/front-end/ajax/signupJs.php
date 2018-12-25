<script>

// Email Vlaidation start
var emailAddress = document.getElementById('signupEmail');
emailAddress.onkeyup = function(){
	 var email = document.getElementById('signupEmail').value;
	 var xhttp = new XMLHttpRequest();
	 var serverPage = '<?php echo asset("/")?>/emailExistence/'+email;
	 xhttp.open('GET',serverPage);
	 xhttp.onreadystatechange = function(){
 	     if (xhttp.readyState == 4 && xhttp.status == 200) {
         document.getElementById("emailMsg").innerHTML = xhttp.responseText;      
       }
	 }
	 xhttp.send();
}
// Email Vlaidation end

//Phone Vlaidation start
var phoneNum = document.getElementById("phoneNum");
phoneNum.onkeyup = function(){
	var phone = document.getElementById("phoneNum").value;
	var xhttp = new XMLHttpRequest();
	var serverPage = '<?php echo asset("/")?>/phoneValidation/'+phone;
	xhttp.open("GET",serverPage);
	xhttp.onreadystatechange = function(){
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("phoneMsg").innerHTML = xhttp.responseText;
		}
	}
	xhttp.send();
}
//Phone Vlaidation end


//Data insertation start
$.ajaxSetup( {
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
} );

function saveToDatabase() {
    $( '#register-form' ).submit( function( e ) {
        e.preventDefault();
        var select = $( this ).serialize();
        // POST to php script
        $.ajax( {
            type: 'POST',
            url: '<?php echo asset("/")?>register',
            data: select
        }).then( function( data ) {
            alert( data )
        } );
        return false;
    } );
}

$(document).ready(function()
{
    saveToDatabase();
});

//Data insertation end
</script>