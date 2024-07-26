<?php
// Select the database you want to use
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevator',     // Data source name
    'jad',                                      // Username
    'ese'                                       // Password
);   

// Return arrays with keys that are the name of the fiels 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Static queries for time
$querytime = "SELECT CURRENT_TIME()";
$result = $db->query($querytime);
$curtime= $result->fetch()['CURRENT_TIME()'];
var_dump($curtime);

// Static queries for data 
$querydate = "SELECT CURRENT_DATE()";
$result = $db->query($querydate);
$curdate= $result->fetch()['CURRENT_DATE()'];
var_dump($curdate);

// Insert dynamic data (this can be input from user or OS) - removed nodeID since it is set to AUTO_INCREMENT
$query = 'INSERT INTO elevatorNetwork
        (date,  time,  status,  currentFloor,  requestedFloor, otherInfo) 
 VALUES (:date, :time, :status, :currentFloor, :requestedFloor , :otherInfo)'; // ':' identified parameters 

// Use the prepare() function to prepare the formatted insert
$statement = $db->prepare($query);

// Prepare the dynamic data - note current time and date added to database in this insertion
$params = [
    'date'              => $curdate,
    'time'              => $curtime,
    'status'            => 2,
    'currentFloor'      => 3,
    'requestedFloor'    => 1,
    'otherInfo'         => 'hey'
];

// Use the execute() function to execute the formatted insert - when formatted
$result = $statement->execute($params);

//Print contents of the insert
var_dump($result);

//Print contents of the entire database
$rows = $db->query('SELECT * FROM elevatorNetwork');
foreach($rows as $row){
    var_dump($row);
    echo "<br/><br/>";
}

?>