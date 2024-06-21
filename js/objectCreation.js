// ------- CREATING OBJECTS - LITERAL NOTATION -------
var hotel =
{
    //OBJECT PROPERTIES
    name: 'Quay',                           
    rooms: 40,
    booked: 25,

    //OBJECT METHOD
    checkAvailable: function()
    {
        return this.rooms - this.booked;
    }
};


var name = hotel.name;                  //Accessing properties and methods
var free=hotel.checkAvailable();

// ------- CREATING OBJECTS - CONSTRUCTOR NOTATION -------
var hotel = new Object();                   //First create a new object using the Object() constructor function

//OBJECT PROPERTIES - after creating a blank/empty object add propertes and methods via dot notation
hotel.name= 'Quay';                          
hotel.rooms= 40;
hotel.booked= 25;

//OBJECT METHOD
hotel.checkAvailable= function()
{
    return this.rooms - this.booked;
}


// ------- CREATING MULTIPLE OBJECTS - CONSTRUCTOR NOTATION -------
function hotel(name, rooms, booked) 
{
    //OBJECT PROPERTIES
    this.name= name;                          
    this.rooms=rooms;
    this.booked=booked;

    //OBJECT METHOD
    this.checkAvailable =function()
    {
        return this.rooms - this.booked;
    };
}

var xHotel = new hotel('x', 100, 5);
var qHotel = new hotel('q', 50, 35);

// ------- CREATING MULTIPLE OBJECTS - CLASS NOTATION ------- RECOMMENDED
class hotel
{
    //OBJECT PROPERTIES
    constructor(name, rooms, booked)
    {
        this.name= name;                          
        this.rooms=rooms;
        this.booked=booked;
    }

    //OBJECT METHOD
    checkAvailable()
    {
        console.log(this.rooms - this.booked);
        return this.rooms - this.booked;
    }

    //OBJECT METHOD
    getName()
    {
        console.log(this.name);
        return this.name;
    }
}

var xHotel = new hotel('x', 100, 5);
var qHotel = new hotel('q', 50, 35);



