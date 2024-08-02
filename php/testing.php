<?php 
    
        // Include the database functions file
       
    echo "HEY ";
   
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
        echo"hey";
        
        // Get data from db and/or form       
        $curr_date_query = $db->query('SELECT CURRENT_DATE()'); 
        $current_date = $curr_date_query->fetch(PDO::FETCH_ASSOC);
        $current_time_query = $db->query('SELECT CURRENT_TIME()');
        $current_time = $current_time_query->fetch(PDO::FETCH_ASSOC);
        if(isset($_POST["btn btn-danger p-5 rounded-circle btn-lg"])) { $nodeID = $_POST['nodeID']; echo"gey";}
        
        
        
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
    
?>
