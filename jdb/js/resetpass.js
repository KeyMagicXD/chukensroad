var code= false ;
var x = document.getElementById("snackbar");
window.onload= setTimeout(function () {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        'size': 'invisible',
        'callback': (response) => {
          // reCAPTCHA solved, allow signInWithPhoneNumber.
          onSignInSubmit();
        }
      });

  },1000);

    

function phoneAuth() {
    //get the number
    var number=document.getElementById('number').value;
    var con= "+91";
    var num=con.concat(number)
    //phone number authentication function of firebase
    //it takes two parameter first one is number,,,second one is recaptcha
    firebase.auth().signInWithPhoneNumber(num,window.recaptchaVerifier).then(function (confirmationResult) {
        //s is in lowercase
        window.confirmationResult=confirmationResult;
        coderesult=confirmationResult;
        console.log(coderesult);
        console.log("otp sent")
      
       x=document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
    }).catch(function (error) {
        console.log("otp Failed")
        console.log(error.message)
       
        x.innerHTML=error.message;
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
     
    });
}
function codeverify() {
    var code=document.getElementById('verificationCode').value;
    coderesult.confirm(code).then(function (result) {

        document.getElementById("reset").submit();
        var user=result.user;
        console.log(user);
    }).catch(function (error) {
        x.innerHTML=error.message;
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
       
    });
}



