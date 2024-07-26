<?php
// Select the database you want to use
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=joinExample',     // Data source name
    'jad',                                      // Username
    'ese'                                       // Password
);  

//Return arrays with keys that are the name of the fiels 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Example 1 - ORDERING OUTPUT
//Obtain everything from the tableGroup and order it by nodeID
$rows = $db->query('SELECT * FROM tableGroup ORDER BY nodeID');

//Table titles 
echo "|--nodeID--|--------time--------|---------status---------| <br/>";
echo "-------------------------------------------------------------- <br/>";

//Print contents of the entire database - by ordering output by nodeID
foreach($rows as $row){
    echo str_repeat('&nbsp;', 6) . $row["nodeID"] . str_repeat('&nbsp;', 17) . $row["time"]
         . str_repeat('&nbsp;', 25) . $row["status"] . '<br/><br/>';
}

// Example 2 - GROUPING OUTPUT
//Obtain everything from the tableGroup and order it by nodeID
$rows = $db->query('SELECT nodeID, COUNT(*) AS hits FROM tableGroup GROUP BY nodeID');

//Table titles 
echo "|--nodeID--|---hits---| <br/>";
echo "-------------------------- <br/>";

//Print contents of the entire database - by grouping output by hits
foreach($rows as $row){
    echo str_repeat('&nbsp;', 6) . $row["nodeID"] . str_repeat('&nbsp;', 17) . $row["hits"]
    . str_repeat('&nbsp;', 25) . $row["status"] . '<br/><br/>';
}

?>