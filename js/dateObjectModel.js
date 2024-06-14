var today = new Date();
var year = today.getFullYear();
var birthday =new Date('February 21, 1997 13:30:00');
var j_birthday =new Date('August 5, 2002 13:30:00');
var time = today.toTimeString();

let cur_year = new Date();
cur_year.setFullYear(2024);
let cur_age = 27;
let cur_age_j = 21;

var age = today.getTime() - birthday.getTime();
age = Math.floor(age/31556900000);

var j_age = today.getTime() - j_birthday.getTime();
j_age = Math.floor(j_age/31556900000);

if(age > cur_age)
    {
        cur_age = age;
    }

if(j_age > cur_age_j)
    {
    cur_age_j = j_age;
    }

msg = '<p>My age is: ' + cur_age + ' years old</p>';
var elemt = document.getElementById('info');
elemt.innerHTML = msg;

msg = '<p>My age is: ' + cur_age_j + ' years old</p>';
var elemt = document.getElementById('info2');
elemt.innerHTML = msg;


msg ='<p> Current time: ' +time +'</p>';
var time = document.getElementById('time');
time.innerHTML = msg;

if(today.getFullYear()  > cur_year.getFullYear())
    {
        cur_year = today.setFullYear();
    }

var dates = document.getElementById('date');
dates.innerHTML ='<p> Current date: ' + cur_year.toDateString() + '</p>';

msg = '<p> Copyright &copy ' + cur_year.getFullYear() + '</p>';     
var ft = document.getElementById('foot');
ft.innerHTML = msg;