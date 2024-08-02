<?php
// Select the database you want to use
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevator',     // Data source name
    'jad',                                      // Username
    'ese'                                       // Password
);                                              
// Return arrays with keys that are the name of the fiels 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$curr_date_query = $db->query('SELECT CURRENT_DATE()'); 
$current_date = $curr_date_query->fetch(PDO::FETCH_ASSOC);
$current_time_query = $db->query('SELECT CURRENT_TIME()');
$current_time = $current_time_query->fetch(PDO::FETCH_ASSOC);
        $status="hey";
        
$query = 'INSERT INTO logs(date, time, action, username, password) VALUES
(:date, :time, :action, :username, :password)';
$params = [
    'date' => $current_date['CURRENT_DATE()'],
    'time' => $current_time['CURRENT_TIME()'],
    'action' => $status, 
    'username' => 'jad',
    'password' => 'ese'
];

$statement = $db->prepare($query);
$result = $statement->execute($params); 

?>