<?php
// Select the database you want to use
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevator',     // Data source name
    'jad',                                      // Username
    'ese'                                       // Password
);                                              
// Return arrays with keys that are the name of the fiels 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Delete data 
$query = 'DELETE FROM authorizedUsers WHERE username = :user';

// Use the prepare() function to prepare the formatted insert
$statement = $db->prepare($query);

// Prepare the dynamic data
$params = [
    ':user'              => 'e',
    
];

// Use the execute() function to execute the formatted insert - when formatted
$result = $statement->execute($params);

//Print contents of the insert
var_dump($result);

//Print contents of the entire database
$rows = $db->query('SELECT * FROM authorizedUsers');
foreach($rows as $row){
    var_dump($row);
    echo "<br/><br/>";
}

?>
