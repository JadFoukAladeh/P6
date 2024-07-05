<?php

$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevator',     // Data source name
    'jad',                                      // Username
    'ese'
);                                              // Password
// Return arrays with keys that are the name of the fiels 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Insert static data (Keep changing nodeID and time (PRIMARY AND UNIQUE) they must be unique)
$query = 'INSERT INTO elevatorNetwork
        (date,  time,   nodeID, status, currentFloor, requestedFloor) 
        VALUES ("2029-05-05","12:01:01", 2, 2, 1,1)';

$result = $db->exec($query);
    
if($result===false){
    $error = $db->errorInfo();
    echo "Error: " . $error[2];
}   else{
    var_dump($result);
}

$rows = $db->query('SELECT * FROM elevatorNetwork');
foreach($rows as $row){
    var_dump($row);
    echo "<br/><br/>";
}

?>