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
        $tablename = 'authorizedUsers'; 
        $path = 'mysql:host=' . $host . ';dbname=' . $database; 
        $user = 'jad';  // Could be a variable from $_SESSION['username'] if the database has been set up with permissions for another user
        $password = 'ese';

        // Connect to database and make changes
        $db = connect($path, $user, $password);
        
        // Display welcome and form
        echo "<h1>Welcome, " . $_SESSION['username'] . "</h1>";
        require '../databases/form.html'; 
        if(isset($_POST['insert'])) {
            echo "You pressed INSERT <br>"; 
            insert($path, $user, $password);
			
        } elseif(isset($_POST['update'])) {
            
            echo "You pressed UPDATE <br>";
            $username = $_POST['old_username'];
            $new_username = $_POST['new_username'];
            $new_password = $_POST['new_password'];
            $old_password = $_POST['old_password'];
            echo "1. $username 2.$new_username 3.$new_password 4.$old_password";
            update($path, $user, $password, $new_password, $new_username, $username);
            echo "other sirde";
			
        } elseif(isset($_POST['delete'])) {
            echo 'You pressed DELETE <br>';
            
            
            $rows = $db->query('SELECT * FROM authorizedUsers');
            foreach($rows as $row){
                var_dump($row);
                echo "<br/><br/>";
            }
            $username = $_POST['username'];
            echo "$path, $user, $password, $tablename, $username";
            delete($path, $user, $password,$tablename, $username);
            
        } 
        // Display content of database
        showtable($path, $user, $password, $tablename);
        // Sign out option
        echo "<p>Click <a href='logout.php'>here</a> to sign out</p>";
        echo "<p>Click <a href='../databases/form.html'>here</a> to see authorized users</p>";
    } else {
        echo "<p>You are not authorized!!! Go away!!!!!</p>";
    }
?>
