// ------ VARIABLES ---------------
// Javascript variables are weakly (dynamicallly) typed (..usually - this behaviour can be set differently)
var variableName;
variableName=4;
variableName=0.4;
variableName='string';

//Variable scope 
var variable; // should be used locally (FUNCTION SCOPE)  
              // all variables automatically hoisted to top of function and cna be used before a declaration statement is made in the function

let variable; // should be used globally - must be declared before use
const variable=1; // should be used globally- must be declared before use

// ------ ARRAYS ---------------
//Arrays 
let arrayColors=['red','blue','orange']
arrayColors[0]; // holds 'red'
arrayColors[0] = 'blue'; // changed to 'blue'

//Array properties 
arrayColors.length; //holds the array length, 3 elements in this case

// ------ FUNCTIONS ---------------

//Function declaration
function sayHello()
{
    document.write('Hello!');   //one of many possible statemnets - uses document object model (DOM) properties 
}

sayHello(); // calls functions

//Function expressions - with input parameters
var area =function(width,height)
{
    return width * height;      // input parameters used like variables in the function (width, height)
}

var size=area(3,5);

//Functions with multiple output parameters
var area =function(width,height)
{
    var dims = [width, height, width*height]
    return dims;     
}

var width = area(3,5)[0];  //widht=3
var height = area(3,5)[0]; //height=5
var area = area(3,5)[0];   //area = 15