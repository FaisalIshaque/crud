function validateUpdate() {
    
    var f_name = document.getElementById("fullname").value;
    var e_mail = document.getElementById("email").value;
    var p_word = document.getElementById("password").value;

    var name_regex  = /^[A-Za-z ]+$/;
    var email_regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-z]{2,4})$/;
    var pass_regex  = /^[a-z]\w{5,9}$/;


    if (f_name == null || f_name == "") {
        alert("Please enter your full name");
        return false;
    }

    if(!f_name.match(name_regex)){
        alert("Name can contain alphabets and space only");
        return false;
    }

    if (e_mail == null || e_mail == "") {
        alert("Please enter your email address");
        return false;
    }

    if(!e_mail.match(email_regex)){
        alert("The format for email address is incorrect");
        return false;
    }

    if (p_word == null || p_word == "") {
        alert("Please enter a password");
        return false;
    }

    if(!p_word.match(pass_regex)){
        alert("Password must be 6 to 10. First character must be a letter");
        return false;
    }
}