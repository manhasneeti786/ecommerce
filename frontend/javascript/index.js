const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signup');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})




function manage_cart(pid,type){
    if(type=='update'){
        var qty= jQuery("#"+pid+"qty").val();
    }else{
        var qty= jQuery("#qty").val();
    }
jQuery.ajax({
url:'manage_cart.php',
type:'post',
data: 'pid='+pid+'&qty='+qty+'&type='+type,
success:function(result){
    if(type=='update' || type=='remove'){
        window.location.href= window.location.href;
    }
jQuery('.htc_qua').html(result);

}
});
}

