<?php 
    // member.php
    session_start(); 

    // Members only section
    if(isset($_SESSION['username'])) {
        // Include the database functions file
        
        // Include the database functions file
        require '../databases/userFunctions.php';

        // Initialize variables for database access
        $host = '127.0.0.1'; 
        $database = 'elevator'; 
        $tablename = 'elevatorNetwork'; 
        $path = 'mysql:host=' . $host . ';dbname=' . $database; 
        $user = 'jad';  // Could be a variable from $_SESSION['username'] if the database has been set up with permissions for another user
        $password = 'ese';
        
        // Connect to database and make changes
        $db = connect($path, $user, $password);
        
        // Get data from db and/or form      
        if(isset($_POST['t1'])) { $authorizedUsers = $_POST['t1']; }
        if(isset($_POST['t2'])) { $authorizedUsersAccess = $_POST['t2']; }
        if(isset($_POST['t3'])) { $elevatorNetwork = $_POST['t3']; }
        if(isset($_POST['t4'])) { $dataBaseAccess = $_POST['t4']; }
        if(isset($_POST['t5'])) { $elevatorHistory = $_POST['t5']; }
       
        if(isset($authorizedUsers)) {
        echo "You are seeing authorizedUsers table <br>"; 
        // Example 1 - ORDERING OUTPUT
        //Obtain everything from the tableGroup and order it by nodeID
        $rows = $db->query('SELECT * FROM authorizedUsers ORDER BY id ');

        //Table titles 
        echo "|----ID----|--------User--------|---------Password---------| <br/>";
        echo "-------------------------------------------------------------- <br/>";

        //Print contents of the entire database - by ordering output by nodeID
        foreach($rows as $row){
            echo str_repeat('&nbsp;', 6) . $row["id"] . str_repeat('&nbsp;', 17) . $row["username"]
                . str_repeat('&nbsp;', 25) . $row["password"] . '<br/><br/>';
        }

        } elseif(isset($authorizedUsersAccess)) {
            echo "You are seeing authorizedUsersAccess table <br>"; 
        // Example 1 - ORDERING OUTPUT
        //Obtain everything from the tableGroup and order it by nodeID
        $rows = $db->query('SELECT * FROM authorizedUsersAccess ORDER BY date DESC, time DESC ');

        //Table titles 
        echo "|--------date--------|-------------time-------------|---------user---------|-----password-----|---------action---------| <br/>";
        echo "------------------------------------------------------------------------------------------------------------------------------ <br/>";

        //Print contents of the entire database - by ordering output by nodeID
        foreach($rows as $row){
            echo str_repeat('&nbsp;', 10) . $row["date"] . str_repeat('&nbsp;', 17) . $row["time"]
                . str_repeat('&nbsp;', 25) . $row["username"] . str_repeat('&nbsp;', 25) . $row["password"] . str_repeat('&nbsp;', 25) . $row["action"] . '<br/><br/>';
        }

        } elseif(isset($elevatorNetwork)) {
            echo "You are seeing elevatorNetwork table <br>"; 
        // Example 1 - ORDERING OUTPUT
        //Obtain everything from the tableGroup and order it by nodeID
        $rows = $db->query('SELECT * FROM elevatorNetwork ORDER BY date DESC, time DESC ');

        //Table titles 
        echo "|--------date--------|-------------time-------------|--nodeID--|-----status-----|-----currentFloor-----|-----requestedFloor-----|---------otherInfo---------| <br/>";
        echo "------------------------------------------------------------------------------------------------------------------------------------------------------------------------- <br/>";

        //Print contents of the entire database - by ordering output by nodeID
        foreach($rows as $row){
            echo str_repeat('&nbsp;', 5) . $row["date"] . str_repeat('&nbsp;', 20) . $row["time"]
                . str_repeat('&nbsp;', 20) . $row["nodeID"] . str_repeat('&nbsp;', 18) . $row["status"] . str_repeat('&nbsp;', 25) . $row["currentFloor"] .  str_repeat('&nbsp;', 35) . $row["requestedFloor"] .  str_repeat('&nbsp;', 40) . $row["otherInfo"] .'<br/><br/>';
        }
        } 
        elseif(isset($dataBaseAccess)) {
            echo "You are seeing dataBaseAccess table <br>"; 
        // Example 1 - ORDERING OUTPUT
        //Obtain everything from the tableGroup and order it by nodeID
        $rows = $db->query('SELECT * FROM dataBaseAccess ORDER BY date DESC, time DESC');

        //Table titles 
        echo "|--------date--------|-------------time-------------|---------user---------|-----password-----|---------action---------| <br/>";
        echo "------------------------------------------------------------------------------------------------------------------------------ <br/>";

        //Print contents of the entire database - by ordering output by nodeID
        foreach($rows as $row){
            echo str_repeat('&nbsp;', 10) . $row["date"] . str_repeat('&nbsp;', 17) . $row["time"]
                . str_repeat('&nbsp;', 25) . $row["username"] . str_repeat('&nbsp;', 25) . $row["password"] . str_repeat('&nbsp;', 25) . $row["action"] . '<br/><br/>';
        }
        }
        elseif(isset($elevatorHistory)) {
            echo "You are seeing elevatorHistory table <br>"; 
        // Example 1 - ORDERING OUTPUT
        //Obtain everything from the tableGroup and order it by nodeID
        $rows = $db->query('SELECT * FROM elevatorHistory ORDER BY date DESC, time DESC ');

        //Table titles 
        echo "|--------date--------|-------------time-------------|---------method---------|-----currentFloor-----| <br/>";
        echo "----------------------------------------------------------------------------------------------------------- <br/>";

        //Print contents of the entire database - by ordering output by nodeID
        foreach($rows as $row){
            echo str_repeat('&nbsp;', 10) . $row["date"] . str_repeat('&nbsp;', 17) . $row["time"]
                . str_repeat('&nbsp;', 25) . $row["method"] . str_repeat('&nbsp;', 25) . $row["currentFloor"] . '<br/><br/>';
        }
        }
        
        
        // Sign out option
        echo "<p>Click <a href='logout.php'>here</a> to sign out</p>";
        echo "<p>Click <a href='members2.php'>here</a> to see authorized users</p>";
        echo "<p>Click <a href='members.php'>here</a> to see elevator Network</p>";
    } else {
        echo "<p>You are not authorized!!! Go away!!!!!</p>";
    }
?>
