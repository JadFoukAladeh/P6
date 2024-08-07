<?php 
    // member.php
    session_start(); 

    // Members only section
    if(isset($_SESSION['username'])) {
        // Include the database functions file
        require '../databases/databaseFunctions.php';

        // Define user for session 
        $username = $_SESSION['username'];

        // Initialize variables for database access
        $host = '127.0.0.1'; 
        $database = 'elevator'; 
        $tablename = 'elevatorNetwork'; 
        $logname = 'dataBaseAccess';
        $path = 'mysql:host=' . $host . ';dbname=' . $database; 
        $user = 'jad';  // Could be a variable from $_SESSION['username'] if the database has been set up with permissions for another user
        $password = 'ese';

        // Connect to database and make changes
        $db = connect($path, $user, $password);
        
        // Get data from db and/or form       
        $curr_date_query = $db->query('SELECT CURRENT_DATE()'); 
        $current_date = $curr_date_query->fetch(PDO::FETCH_ASSOC);
        $current_time_query = $db->query('SELECT CURRENT_TIME()');
        $current_time = $current_time_query->fetch(PDO::FETCH_ASSOC);
        if(isset($_POST['nodeID'])) { $nodeID = $_POST['nodeID']; }
        if(isset($_POST['status'])) { $status = $_POST['status']; }
        if(isset($_POST['currentFloor'])) { $currentFloor = $_POST['currentFloor']; }
        if(isset($_POST['requestedFloor'])) { $requestedFloor = $_POST['requestedFloor']; }
        if(isset($_POST['otherInfo'])) { $otherInfo = $_POST['otherInfo']; }
        
        // Display welcome and form
        require '../databases/elevatorNetworkForm.html'; 
        echo "<h1>Welcome, " . $_SESSION['username'] . "</h1>";
        
        if(isset($_POST['insert'])) {
            echo "You pressed INSERT <br>"; 
            insert($path, $user, $password, $current_date, $current_time, $status, $currentFloor, $requestedFloor, $otherInfo);
            insert_log($path, $user, $password, "insert",$current_date, $current_time,$logname,$username);
			
        } elseif(isset($_POST['update'])) {
            echo "You pressed UPDATE <br>";
            update($path, $user, $password, $tablename, $nodeID, $status, $currentFloor, $requestedFloor, $otherInfo);
            insert_log($path, $user, $password, "update",$current_date, $current_time,$logname,$username);
	
        } elseif(isset($_POST['delete'])) {
            echo 'You pressed DELETE <br>';
            delete($path, $user, $password, $tablename, $nodeID);
            insert_log($path, $user, $password, "delete",$current_date, $current_time,$logname,$username);

        } 
        elseif(isset($_POST['read'])) {
            echo 'You pressed READ <br>';
            showtable($path, $user, $password, $tablename);
            insert_log($path, $user, $password, "read",$current_date, $current_time,$logname,$username);

        }
        
        
        // Sign out option
        echo "<p>Click <a href='logout.php'>here</a> to sign out</p>";
        echo "<p>Click <a href='members2.php'>here</a> to see authorized users</p>";
        echo "<p>Click <a href='../databases/b.html'>here</a> to see tables in database</p>";
    } else {
        echo "<p>You are not authorized!!! Go away!!!!!</p>";
    }
?>
