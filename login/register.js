var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
const fnameCheck = (name) => {
      
        if(name == "" || name.indexOf(' ') >= 0){
            alert("White Space Not Allowed!")
            document.getElementById('register').style.visibility = 'hidden';
        }else{
            document.getElementById('register').style.visibility = 'visible';
        }
    }

    const lnameCheck = (name) => {
        if(name == ""){
            alert("White Space Not Allowed!")
        }

    }    

    const passCheck = (name) => {
        if(name == ""){
            alert("White Space Not Allowed!")
        }

    }    

    const typeValue = (value) => {
        if(value==""){
            alert("Please select type of Account!")
        }
        document.getElementById('role').value = value;
        console.log(value);
    }