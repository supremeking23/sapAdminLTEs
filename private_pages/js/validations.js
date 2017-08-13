



//function passwordconfirm(){
function passwordconfirm(in_password,in_confirm){
	// var password = document.getElementById('password_reg');
	// var confirmpass = document.getElementById('confirm_pass');
	var password = document.getElementById(in_password);
	var confirmpass = document.getElementById(in_confirm);

	if((password.value=="")||(confirmpass.value=="")){

	}
	else{
		if(password.value != confirmpass.value){
		alert("Password does not match");
		return false;
		}
		else{
			//alert("Password match");
			return true;
		}
	}
}



function lettersonly(e){
	var unicode = e.charCode ? e.charCode : e.keyCode;
	//65-90 and 97-122
	if(unicode!=32){
		if((unicode>64&&unicode<91)||(unicode>96&&unicode<123)){
		
		}
		else{
			return false;
		}
	}
}


function numbersonly(e){
	var unicode = e.charCode ? e.charCode : e.keyCode;
	if(unicode!=8){
		if(unicode<48||unicode>57){
			return false;
		}
	}
}