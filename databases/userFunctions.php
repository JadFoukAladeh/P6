<?php 
// CRUD (Create, Read, Update, Delete) functions

function connect(string $path, string $user, string $password) {
    $db = new PDO($path,$user, $password);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db; 
}

// Create
function insert($path, $user, $password) : void{
    $db = connect($path, $user, $password);
    $query = 'INSERT INTO authorizedUsers(username, password) VALUES
    (:username, :password)';
    $params = [
        'username' => $_POST['username'], 
        'password' => $_POST['password'] 
    ];

    $statement = $db->prepare($query);
    $result = $statement->execute($params); 
}

// Read
function showtable(string $path, string $user, string $password) : void{
    echo "<h3>Content of authorizedUsers table</h3>";
    $db = connect($path, $user, $password); 
    $query = "SELECT * FROM authorizedUsers";  // Note: Risk of SQL injection
    $rows = $db->query($query); 
    foreach ($rows as $row) 
    {
       echo "Username: " . $row['username'] . "<br/>";    
    }
}

// Update
function update($path,  $user,  $password, $username, $new_username, $new_password): void
{

    $db = connect($path, $user, $password);

    $query = "UPDATE authorizedUsers 
          SET username = :n_user, password = :n_pass 
          WHERE username = :user";
    
    $statement = $db->prepare($query);

    $params = [
        'user'              => $username,
        'n_user'            => $new_username, 
        'n_pass'            => $new_password
        
    ];
    
    $result = $statement->execute($params); 
}

// Delete
function delete(string $path, string $user, string $password,  string $username) : void {
    
    $db = connect($path, $user, $password);
    
    $query = 'DELETE FROM authorizedUsers WHERE username = :user' ;    // Note: Risks of SQL injection
    // Prepare the dynamic data
    $statement = $db->prepare($query);
    
    $params = [
        ':user'              => $username
        
    ];
    
    // Use the execute() function to execute the formatted insert - when formatted
    $result = $statement->execute($params);    // Execute prepared statement
}


/*  LOGGING FUNCTIONS FOR THE DATABASE   */
function insert_log($path, $user, $password,  string $action, $current_date, $current_time, $log, $username) {
    // Connect to the database 
    $db = connect($path, $user, $password);
    
    // Create query 
    $query = 'INSERT INTO '. $log . '(date,  time,  action,  username,  password) VALUES
                              (:date, :time, :action, :username, :password)';
    // Specify query inputs 
    $params = [
        'date' => $current_date['CURRENT_DATE()'],
        'time' => $current_time['CURRENT_TIME()'],
        'action' => $action, 
        'username' => $username,
        'password' => $password
    ];
    
    // Prepare query 
    $statement = $db->prepare($query);

    // Execute query
    $result = $statement->execute($params); 

}
?>