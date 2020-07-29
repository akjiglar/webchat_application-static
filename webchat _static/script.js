var check = function() {
	var password=document.getElementById('new_password').value ;
	var confirm=document.getElementById('confirm_password').value ;
	if ( confirm == password) {
		document.getElementById('message').style.color = 'green';
		document.getElementById('message').innerHTML = 'Matching';
	}
	else{
		document.getElementById('message').style.color = 'red';
		document.getElementById('message').innerHTML ='Not Matching';
		}
	}