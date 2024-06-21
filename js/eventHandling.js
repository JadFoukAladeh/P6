// Event listeners WITH PARAMETERS using ANONYMOUS FUNCTION

var e1Username =document.getElementById("username");
var e1Password =document.getElementById("password");
var e1Msg = document.getElementById("feedback");
var e2Msg = document.getElementById("feedbacks");

function checkUsername(minLength)
{
    if(e1Username.value.length < minLength)
    {
        e1Msg.innerHTML ='<p> Username must be ' + minLength + ' characters or more </p>';
    }
    else if(e1Password.value.length < minLength)
    {
        e1Msg.innerHTML ='<p> Password must be ' + minLength + ' characters or more </p>';

    }
    else
    {
        e1Msg.innerHTML = ''; // Clear any error message
    }
}

function checkPassword(minLength)
{
    if(!(zib.match(/[0-9]/)))
    {
        e2Msg.innerHTML ='<p> Password must contain numbers</p>' ;
        document.getElementById("feedbacks").innerHTML = "hey"
    }
    
    
    else
    {
        e2Msg.innerHTML = ''; // Clear any error message
    }
}

e1Username.addEventListener("focus", function() {checkUsername(7)}, false); // Annonymous function
e1Username.addEventListener("blur", function() {checkUsername(7)}, false); // Annonymous function

function setup()
{
    e1Username.focus();
}

window.addEventListener('load', setup, false)