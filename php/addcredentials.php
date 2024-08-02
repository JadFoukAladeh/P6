<?php

//  new (uses sessions)
    session_start();    //start session - cruicial for short term storage (i.e keeping client logged in during session)

    // Obtain password and username from session
    $username = $_POST['username'];
    $password = $_POST['password'];
    $authenticated = FALSE;
    
    // Select the database you want to use
    $db = new PDO(
        'mysql:host=127.0.0.1;dbname=elevator',     // Data source name
        'jad',                                      // Username
        'ese'                                       // Password
    );  

    //Return arrays with keys that are the name of the fiels 
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //Obtain everything from the authorizedUsers and check for given username
    $rows = $db->query('SELECT * FROM authorizedUsers WHERE username="$username"');

    //Authenticate against the database
    foreach($rows as $row){
        echo $row['username'];
        if($username === $row['username'] && $password === $row['password']){
            $authenticated = TRUE;
        }
    }

    // Check if user has been validated
    if($authenticated) // Valid user
    {
        $_SESSION['username'] = $username;
        echo "<p> Congrats, you are logged in</p>";
        echo "<p> Click <a href='members.php'>here</a> to goto the members only page</p>";
    }
    else
    {
        echo "<p> You are not authenticated!!!!</p>";
    }
?>