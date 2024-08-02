<?php
/*
        Written By: Jad Fouk Aladeh
        Date:       2024-07-31 
        Purpose:    To setup all databases and logs needed if project is moved to a new computer
                    OR 
                    To test deleting and inserting tables to databases
*/

// Select the database you want to use
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevator',     // Data source name
    'jad',                                      // Username
    'ese'                                       // Password
);   

// Return arrays with keys that are the name of the fiels 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// These will be the names of the logs we want to create in a specific format
$tables = ['authorizedUsersAccess','dataBaseAccess','elevatorNetwork','authorizedUsers','CAN_subNetwork','elevatorHistory'];


// Create all tables if they do not exist
for($i = 0; $i<sizeof($tables);$i++)
{
    // Setup all logs
    if(str_contains($tables[$i],"Access"))
    {
        $query = 'CREATE TABLE ' . $tables[$i] .
          ' (date DATE NOT NULL,
          time TIME NOT NULL,
          action VARCHAR(100) NOT NULL,
          username VARCHAR(100) NOT NULL,
          password VARCHAR(100) NOT NULL
         )ENGINE=InnoDb';

        // Use the prepare() function to prepare the formatted insert
        $statement = $db->prepare($query);

        // Use the execute() function to execute the formatted insert - when formatted
        $result = $statement->execute();
    }

    // Setup elevatorNetwork
    elseif(strcmp($tables[$i],"elevatorNetwork") === 0)
    {
        $query = 'CREATE TABLE ' . $tables[$i] .
          ' (date DATE NOT NULL,
            time TIME NOT NULL UNIQUE,
            nodeID INT UNSIGNED AUTO_INCREMENT NOT NULL,
            status TINYINT(4) NOT NULL,
            currentFloor TINYINT(4) NOT NULL,
            requestedFloor TINYINT(4) NOT NULL,
            otherInfo TEXT,
            PRIMARY KEY (nodeID),
            INDEX (date),
            UNIQUE KEY (time) 
         )ENGINE=InnoDb';
        
        // Use the prepare() function to prepare the formatted insert
        $statement = $db->prepare($query);
        

        // Use the execute() function to execute the formatted insert - when formatted
        $result = $statement->execute();
    }

    // Create authorizedUsers
    elseif(strcmp($tables[$i],"authorizedUsers") === 0)
    {
        $query = 'CREATE TABLE ' . $tables[$i] .
          ' (id INT UNSIGNED NOT NULL AUTO_INCREMENT,
            password VARCHAR(100) NOT NULL,
            username VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)
         )ENGINE=InnoDb';
        
        // Use the prepare() function to prepare the formatted insert
        $statement = $db->prepare($query);
        

        // Use the execute() function to execute the formatted insert - when formatted
        $result = $statement->execute();
    }

    // Create CAN_subNetwork
    elseif(strcmp($tables[$i],"CAN_subNetwork") === 0)
    {
        
        $query = 'CREATE TABLE ' . $tables[$i] .
          ' (CAN_nodeID INT(10) UNSIGNED NOT NULL,
            CAN_status TINYINT NOT NULL,
            CAN_currentFloor TINYINT NOT NULL,
            FOREIGN KEY (CAN_nodeID) REFERENCES elevatorNetwork(nodeID)
         )ENGINE=InnoDb';
        
        // Use the prepare() function to prepare the formatted insert
        $statement = $db->prepare($query);
        

        // Use the execute() function to execute the formatted insert - when formatted
        $result = $statement->execute();
    }

    // Create elevatorHistory
    elseif(strcmp($tables[$i],"elevatorHistory") === 0)
    {
        
        $query = 'CREATE TABLE ' . $tables[$i] .
          ' (date DATE NOT NULL,
             time TIME NOT NULL,
             method VARCHAR(25) NOT NULL,
             currentFloor TINYINT(4) UNSIGNED NOT NULL,
             INDEX(date),
             UNIQUE(time)
         )ENGINE=InnoDb';
        
        // Use the prepare() function to prepare the formatted insert
        $statement = $db->prepare($query);
        

        // Use the execute() function to execute the formatted insert - when formatted
        $result = $statement->execute();
    }
    
    else
    {
        echo "An error has occured in database creation.....<br/>";
        break; 
    }
    
    
}


?>
