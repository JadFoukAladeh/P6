<?php
// Select the database you want to use
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevator',     // Data source name
    'jad',                                      // Username
    'ese'                                       // Password
);                                              
// Return arrays with keys that are the name of the fiels 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Example 1 -  Update password 
$query = 'UPDATE authorizedUsers SET password = :pass WHERE username=:user1 ';

// Use the prepare() function to prepare the formatted insert
$statement = $db->prepare($query);

// Prepare the dynamic data
$params = [
    
    ':pass'              => 'ese22',
    ':user1'              => '2'
    
    
];

// Use the execute() function to execute the formatted insert - when formatted
$result = $statement->execute($params);

//Print contents of the insert
var_dump($result);
echo "<br/>";

//Print contents of the entire database
$rows = $db->query('SELECT * FROM authorizedUsers');
foreach($rows as $row){
    var_dump($row);
    echo "<br/><br/>";
}

// Example 2 -  Update username 
$query = 'UPDATE authorizedUsers SET username = :user1 WHERE password=:pass ';

// Use the prepare() function to prepare the formatted insert
$statement = $db->prepare($query);

// Prepare the dynamic data
$params = [
    
    ':pass'              => 'ese22',
    ':user1'              => 'testing'
    
    
];

// Use the execute() function to execute the formatted insert - when formatted
$result = $statement->execute($params);

//Print contents of the insert
var_dump($result);
echo "<br/>";

//Print contents of the entire database
$rows = $db->query('SELECT * FROM authorizedUsers');
foreach($rows as $row){
    var_dump($row);
    echo "<br/><br/>";
}



// Example 3 -  Update user
$query = 'UPDATE authorizedUsers SET password=:pass, username=:user WHERE id=:id';

// Use the prepare() function to prepare the formatted insert
$statement = $db->prepare($query);

// Prepare the dynamic data
$params = [
    

    // new credentials
    ':user'              => 'news',
    ':pass'              => 'news',
    ':id'                => '21'
    
    
];

// Use the execute() function to execute the formatted insert - when formatted
$result = $statement->execute($params);

//Print contents of the insert
var_dump($result);
echo "<br/>";

//Print contents of the entire database
$rows = $db->query('SELECT * FROM authorizedUsers');
foreach($rows as $row){
    var_dump($row);
    echo "<br/><br/>";
}

