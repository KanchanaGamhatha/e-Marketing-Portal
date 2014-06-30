function onPageLoaded() 
{
    //document.write("hello");
    document.getElementById('password').style.display = "none";
    document.getElementById('passwordPlain').style.display = "inline";
    //document.getElementById('confirmPassword').style.display = "none";
    //document.getElementById('confirmPasswordPlain').style.display = "inline";
}
function swapPasswordBoxes(funcType) 
{
    if(funcType == "click") 
    {	
            document.getElementById('passwordPlain').style.display = "none";
            document.getElementById('password').style.display = "inline";
            document.getElementById('password').focus();
    } 
    else 
    {
            if(document.getElementById('password').value.length == 0) 
            {
                    document.getElementById('passwordPlain').style.display = "inline";
                    document.getElementById('password').style.display = "none";
            }
    }
}
function clearEmail(action)
{
    if(action=='click')
    {
        if((document.getElementById('email').value.length == 0)||(document.getElementById('email').value=="Email")) 
        {
            document.getElementById('email').value="";
            document.getElementById('email').focus();
        }
        
    }
    else if(action=='blur')
    {
        if(document.getElementById('email').value.length == 0) 
        {
            document.getElementById('email').value="Email";
        }
    }
}

function clearUserName(action)
{
    if(action=='click')
    {
        if((document.getElementById('user_name').value.length == 0)||(document.getElementById('user_name').value=="Username")) 
        {
            document.getElementById('user_name').value="";
            document.getElementById('user_name').focus();
        }
        
    }
    else if(action=='blur')
    {
        if(document.getElementById('user_name').value.length == 0) 
        {
            document.getElementById('user_name').value="Username";
        }
    }
}