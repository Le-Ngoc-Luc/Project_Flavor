function formvalidate(){
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var username = document.getElementById('username').value;
    var regEmail = /^\w+@[a-zA-Z]{3,}\.com$/i;
    var regPhone = /^\d{3,}$/;
    var regUser = /^[a-zA-Z0-9]{3,}$/;
    if(!regEmail.test(email)){
        alert('Please re-enter your email');
        return false;
    }

    if(!regUser.test(username)){
        alert('Please re-enter your username');
        return false;
    }

    if(!regPhone.test(phone)){
        alert('Please re-enter your Phone number');
        return false;
    }
    
    return true;
}