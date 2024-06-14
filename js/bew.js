

var today = new Date();
var year = today.getFullYear();
var birthday =new Date('February 21, 1997 13:30:00');
var time = today.toTimeString();

let cur_year = new Date();
cur_year.setFullYear(2024);
let cur_age = 27;
let ft;
let msg;
let msg1;
let msg2;


var age = today.getTime() - birthday.getTime();
age = Math.floor(age/31556900000);

if(age > cur_age)
    {
        cur_age = age;
    }

    
msg2 = '   <p> Copyright &copy ' + cur_year + '</p>'; ;
ft = document.getElementById('myFoot');
 ft.innerHTML = msg2;
    




 


