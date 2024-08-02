<?php 
    // member.php
    session_start(); 

    // Members only section
    if(isset($_SESSION['username'])) {
        // Include the database functions file
        require '../databases/userFunctions.php';

        // Initialize variables for database access
        $host = '127.0.0.1'; 
        $database = 'elevator'; 
        $tablename = 'authorizedUsersAccess'; 
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
        if(isset($_POST['Up'])) {$Up = $_POST['Up']; }
        if(isset($_POST['Down'])) {$Down = $_POST['Down']; }
        if(isset($_POST['firstFloor'])) {$firstFloor = $_POST['firstFloor']; }
        if(isset($_POST['secondFloor'])) {$secondFloor = $_POST['secondFloor']; }
        if(isset($_POST['thirdFloor'])) {$thirdFloor = $_POST['thirdFloor']; }
        
        // Display welcome and form
     
        require '../databases/a.html';
        echo "<h1>Welcome, " . $_SESSION['username'] . "</h1>"; 
        if(isset($Up)) {
            echo "You pressed INSERT <br>"; 
            echo "<script>
                var audio = new Audio('path_to_your_audio_file.mp3');
                audio.play();
                

                </script>"
            insert($path, $user, $password);
            insert_log($path, $user, $password, "insert",$current_date, $current_time,$tablename,$user_cur );
			
        } elseif(isset($_POST['update'])) {
            
            echo "You pressed UPDATE <br> ";
            
            update($path, $user, $password, $username, $new_username, $new_password);
            insert_log($path, $user, $password, "update",$current_date, $current_time,$tablename,$user_cur);
			
        } elseif(isset($_POST['delete'])) {
            echo 'You pressed DELETE <br>';
            
        
            $username = $_POST['username'];                             
            echo "username is $username";
            delete($path, $user, $password, $username);
            insert_log($path, $user, $password, "delete",$current_date, $current_time,$tablename,$user_cur);
            
        } 
        elseif(isset($_POST['read'])) {
            echo 'You pressed READ <br>';
            // Display content of database
            showtable($path, $user, $password, $tablename);
            insert_log($path, $user, $password, "read",$current_date, $current_time,$tablename,$user_cur);
            
        }
        
        // Sign out option
        echo "<p>Click <a href='logout.php'>here</a> to sign out</p>";
        echo "<p>Click <a href='members.php'>here</a> to see elevatorNetwork</p>";
        echo "<p>Click <a href='../databases/b.html'>here</a> to see tables in database</p>";
    } else {
        echo "<p>You are not authorized!!! Go away!!!!!</p>";
    }
?>
