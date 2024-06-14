/* Creating multiple objects - Class Notation */
class Hotel                                            // Hotel OBJECT
{
    constructor(name, rooms, booked)                   // Method to be used by Hotel OBJECTS
        {
            this.name = name;                          // Elements to be set by user upon initation a Hotel OBJECT
            this.rooms = rooms;                        // Elements to be set by user upon initation a Hotel OBJECT
            this.booked = booked;                      // Elements to be set by user upon initation a Hotel OBJECT  
        }

    checkAvailability()                                // Method to be used by Hotel OBJECTS
        {
            console.log(this.rooms-this.booked);       // Print output on the console
            return(this.rooms-this.booked);            // Return output
        }

    getName()
        {
            console.log(this.name);                    // Print output on the console
            return(this.name);                         // Return output
        }
};

var hotel = new Hotel(jad,50,50);
hotel.checkAvailability();