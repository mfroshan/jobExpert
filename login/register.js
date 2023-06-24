
    const RegisterButton = document.getElementById("register");
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var password = document.getElementById("password");

     

    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }

    
    const alertMsg = (Msg) => {
        alert(Msg);
        return false;
    }
    
    var regName = /^[A-Za-z]+$/;

    const fnameCheck = () => {    
        if(!regName.test(fname.value)){
            RegisterButton.style.visibility='hidden';
            alertMsg('Please Check First Name!');
        }else{
            RegisterButton.style.visibility='visible';
        }
    }

    const lnameCheck = () => {
        if(!regName.test(lname.value)){
            RegisterButton.style.visibility='hidden';
            alertMsg('Please Check Last Name!');
        }else{
            RegisterButton.style.visibility='visible';
        }
    }    

     

    const CheckNum = () => {
        console.log(mobile.value.length);
        if(mobile.value.length<10){
            RegisterButton.style.visibility='hidden';
            alertMsg('Please Check Last Name!');
        }else{
            RegisterButton.style.visibility='visible';
        }
    }

    

    