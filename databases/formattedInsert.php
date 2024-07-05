<?php

$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevator',     // Data source name
    'jad',                                      // Username
    'ese'
);   

// Password
// Return arrays with keys that are the name of the fiels 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Insert static data (Keep changing time (UNIQUE) - removed nodeID since it is set to AUTO_INCREMENT
$query = 'INSERT INTO elevatorNetwork
        (date,  time,  status,  currentFloor,  requestedFloor) 
 VALUES (:date, :time, :status, :currentFlooor, :requestedFloor )'; // ':' identified parameters 

$statement = $db->prepare($query);

$params = [
    'date'              => '2024-07-05',
    'time'              => '17:22:22',
    'status'            => 2,
    'currentFloor'      => 3,
    'requestedFloor'    => 1

];

$result = $statement->execute($params);

var_dump($result);

$rows = $db->query('SELECT * FROM elevatorNetwork');
foreach($rows as $row){
    var_dump($row);
    echo "<br/><br/>";
}

?>