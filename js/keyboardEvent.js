// KeyboardEvent example
var e1;


function charCounter(e)
{
    var textEntered, charDisplay, counter, lastkey;
    textEntered = document.getElementById('message').value;     // Text input by user
    charDisplay = document.getElementById('charactersLeft');  	// Get element that displays remaining chars 
    
    counter = (180 - (textEntered.length));                     // Remaining char
    charDisplay.innerHTML ='<p>Characters remaining: ' + counter +'</p>';  // Show remaining chars
    
    lastkey = document.getElementById('lastkey');               // Get element that displays lastkey input by user
    lastkey.innerHTML = 'Last key input: ' + String.fromCharCode(e.keyCode); // Output last key
    console.log(lastkey.innerHTML);
}

e1 =document.getElementById('message');                          // Get the message element <textarea>
e1.addEventListener('keypress',charCounter, false);



