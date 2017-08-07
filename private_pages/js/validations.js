



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
