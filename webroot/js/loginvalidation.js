// Document is ready
$(document).ready(function (e) {
    let count = 0;


$("#emailcheck").hide();
let emailError = true;
$("#email").keyup(function () {
	validateEmail();
});

function validateEmail() {
	let emailValue = $("#email").val();
	if (emailValue.length == "") {
	$("#emailcheck").show();
    count=1;
    emailError = false;
	return false;
	} else {
	$("#emailcheck").hide();
	}
}


// Validate Email
const email = document.getElementById("email");
email.addEventListener("blur", () => {
	let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
	let s = email.value;
	if (regex.test(s)) {
	email.classList.remove("is-invalid");
    count=1;
	emailError = true;
	} else {
	email.classList.add("is-invalid");
	emailError = false;
	}
});

// Validate Password
$("#passcheck").hide();
let passwordError = true;
$("#password").keyup(function () {
	validatePassword();
});
function validatePassword() {
	let passwordValue = $("#password").val();
	if (passwordValue.length == "") {
	$("#passcheck").show();
    count=1;
	passwordError = false;
	return false;
	}
	if (passwordValue.length < 3 || passwordValue.length > 10) {
	$("#passcheck").show();
	$("#passcheck").html(
		"**length of your password must be between 3 and 10"
	);
	$("#passcheck").css("color", "red");
    count=1;
	passwordError = false;
	return false;
	} else {
	$("#passcheck").hide();
	}
}


// Submit button
$("#submitbtn1").click(function (e) {
	validatePassword();
	validateEmail();
	if (count==1) {
        e.preventdefault(); 
       } 
});
});
