window.addEventListener('load',()=>{
    let password = document.getElementById('password');
    let passwordLabel = document.getElementById('passwordlabel');
    let cpasswordLabel = document.getElementById('cpasswordlabel');
    let confirmpassword = document.getElementById('confirmpassword');
    confirmpassword.addEventListener("keyup",()=>{
        if(confirmpassword.value.length>=1 && confirmpassword.value!=password.value)
        {
            cpasswordLabel.style.color = "red";
            passwordLabel.style.color = "red";
            if(passwordLabel.innerHTML.endsWith('✅')&& cpasswordLabel.innerHTML.endsWith('✅'))
            {
                
                passwordLabel.innerHTML=passwordLabel.innerHTML.slice(0,passwordLabel.innerHTML.length-1);
                cpasswordLabel.innerHTML=cpasswordLabel.innerHTML.slice(0,cpasswordLabel.innerHTML.length-1);
                
            }

            console.log(passwordLabel.innerHTML.indexOf('✅'));
            
        
            
        }else if(confirmpassword.value.length>=1 && confirmpassword.value.length==password.value.length && confirmpassword.value==password.value)
        {
            if(passwordLabel.innerHTML.indexOf('✅') ==-1 && cpasswordLabel.innerHTML.indexOf('✅')==-1)
            {
                cpasswordLabel.style.color = "green";
                passwordLabel.style.color = "green";
                passwordLabel.innerHTML += '✅';
                cpasswordLabel.innerHTML += '✅';
            }
            
            

        }
        
    })
})