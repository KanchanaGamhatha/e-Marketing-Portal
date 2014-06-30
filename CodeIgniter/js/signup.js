function onPageLoaded() 
{
    //document.write("hello");
    document.getElementById('password').style.display = "none";
    document.getElementById('passwordPlain').style.display = "inline";
    document.getElementById('password2').style.display = "none";
    document.getElementById('passwordPlain2').style.display = "inline";
}
function swapPasswordBoxesPassword(funcType) 
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
function swapPasswordBoxesConfirmPassword(funcType) 
{
    if(funcType == "click") 
    {	
            document.getElementById('passwordPlain2').style.display = "none";
            document.getElementById('password2').style.display = "inline";
            document.getElementById('password2').focus();
    } 
    else 
    {
            if(document.getElementById('password2').value.length == 0) 
            {
                    document.getElementById('passwordPlain2').style.display = "inline";
                    document.getElementById('password2').style.display = "none";
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
function clearName(action)
{
    if(action=='click')
    {
        if((document.getElementById('name').value.length == 0)||(document.getElementById('name').value=="Name")) 
        {
            document.getElementById('name').value="";
            document.getElementById('name').focus();
        }
        
    }
    else if(action=='blur')
    {
        if(document.getElementById('name').value.length == 0) 
        {
            document.getElementById('name').value="Name";
        }
    }
}