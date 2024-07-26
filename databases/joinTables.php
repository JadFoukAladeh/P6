<?php
// Select the database you want to use
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=joinExample',  // Data source name
    'jad',                                      // Username
    'ese'                                       // Password
);   

// Return arrays with keys that are the name of the fiels 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// This query is an example of joining two tables from the database into 1 table
$query = 'SELECT t1.nodeID, t1.status, t1.currentFloor, t2.requestedFloor, t2.otherInfo
          FROM table1 t1, table2 t2
          WHERE t1.nodeID = t2.nodeID;'; 

//Print contents of the entire database joined into 1 table
$rows = $db->query($query);
foreach($rows as $row){
    var_dump($row);
    echo "<br/><br/>";
}

?>
