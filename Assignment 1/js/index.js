function mylogin()
{
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            xmlFunction(this);       
        }
    };
    
    xhttp.open("GET", "database.xml", true);
    xhttp.send();
}
function xmlFunction(xml)
{
    var i;
    var flag = 0;
    var xmlDoc = xml.responseXML;
    
    var username = document.getElementById("username").value;
    var passwrd = document.getElementById("password").value;
    var x = xmlDoc.getElementsByTagName("account");
    
    for(i =0; i < x.length; i++)
    {
        var name = x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
        var pass = x[i].getElementsByTagName("pass")[0].childNodes[0].nodeValue;
        
        document.write("<br>"+name+" "+pass+" ");
        if(username.localeCompare(name))
        {
        }
        else
        {
            flag = 1;
        }
    }
    if(flag==1)
        window.location="/home.html";
    else
    {
        document.write("<a href=\"/login.html\">Login Again</a> Username/password wrong")
    }
}