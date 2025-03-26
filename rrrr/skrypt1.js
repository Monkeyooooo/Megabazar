
form = document.getElementById('login');
password = document.getElementById('password');
confirm_password = document.getElementById('confirm_password');
button1 = document.getElementById('button1');

button1.addEventListener('click',function(){
    console.log("jebacdisa");
if(password.value == confirm_password.value){

    form.submit();
}
else{
alert("Hasła nie pasują do siebie!");
}

});
