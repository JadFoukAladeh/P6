<?php
// Select the database you want to use
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevator',     // Data source name
    'jad',                                      // Username
    'ese'                                       // Password
);  

//Return arrays with keys that are the name of the fiels 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//Obtain everything from the elevatorNetwork and order it by nodeID
$rows = $db->query('SELECT * FROM elevatorNetwork ORDER BY nodeID');

//Print contents of the entire database
foreach($rows as $row){
    var_dump($row);
    echo "<br/><br/>";
}

?>