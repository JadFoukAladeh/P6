<?php
// Select the database you want to use
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevator',     // Data source name
    'jad',                                      // Username
    'ese'                                       // Password
);                                              
// Return arrays with keys that are the name of the fiels 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Insert static data (Keep changing nodeID and time (PRIMARY AND UNIQUE) they must be unique)
$query = 'INSERT INTO elevatorNetwork
        (date,          time,       nodeID,     status,     currentFloor, requestedFloor, otherInfo) VALUES 
        ("2029-05-05",  "12:01:01", 4,          3,          1,            1,              "na")';

// Use the exec() function to execute the insert - when nonformatted
$result = $db->exec($query);

// Error handeling - ensure database insert was successful 
if($result===false){
    $error = $db->errorInfo();
    echo "Error: " . $error[2];
}   
else{
    var_dump($result);
}

//Print contents of the entire database
$rows = $db->query('SELECT * FROM elevatorNetwork');
foreach($rows as $row){
    var_dump($row);
    echo "<br/><br/>";
}

?>