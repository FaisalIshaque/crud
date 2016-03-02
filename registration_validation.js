function validateRegistration() {

    var fname = document.getElementById("Full_Name").value;
    var uname = document.getElementById("User_Name").value;
    var email = document.getElementById("E_Mail").value;
    var pword = document.getElementById("Pass_Word").value;

    var name_regex  = /^[A-Za-z ]+$/;
    var email_regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-z]{2,4})$/;
    var pass_regex  = /^[a-z0-9]+[.$%^&*()!@_a-z0-9]{5,9}$/;

    if (fname == null || fname == "") {
        alert("Please enter your full name");
        return false;
    }

 	if(!fname.match(name_regex)){
        alert("Name can contain alphabets and space only");
        return false; 
    }

    if (uname == null || uname == "") {
        alert("Please enter a user name");
        return false;
    }

    if (email == null || email == "") {
        alert("Please enter your email address");
        return false;
    }

    if(!email.match(email_regex)){
        alert("The format for email address is incorrect");
        return false;
    }

    if (pword == null || pword == "") {
        alert("Please enter a password");
        return false;
    }

    if(!pword.match(pass_regex)){
    	alert("Password must be 6 to 10 characters. First character must be a letter");
    	return false;
    }
}