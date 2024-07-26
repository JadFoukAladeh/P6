<?php 
// CRUD (Create, Read, Update, Delete) functions

function connect(string $path, string $user, string $password) {
    $db = new PDO($path,$user, $password);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db; 
}

// Create
function insert($path, $user, $password) {
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
function showtable(string $path, string $user, string $password) {
    echo "<h3>Content of ElevatorNetwork table</h3>";
    $db = connect($path, $user, $password); 
    $query = "SELECT * FROM authorizedUsers";  // Note: Risk of SQL injection
    $rows = $db->query($query); 
    foreach ($rows as $row) 
    {
       echo "Username: " . $row['username'] . "<br/>";    
    }
}

// Update
function update(string $path, string $user, string $password1, string $tablename, string $new_password, string $new_username
                , string $old_username) : void 
{
    $db = connect($path, $user, $password1);
    $a = 'SELECT id' . ' FROM ' . $tablename . 'WHEN username=:use1';
    $statement = $db->prepare($a);

    $statement->bindValue(':use1', $old_username);
    //Print contents of the entire database
    $rows = $db->query($statement);

    $query = 'UPDATE ' . $tablename . ' SET password=:pass, username=:use1 WHERE id=$rows' ;    // Note: Risks of SQL injection

 
// Use the execute() function to execute the formatted insert - when formatted
$result = $rows->execute();
                           // Execute prepared statement

}
// Delete
function delete(string $path, string $user, string $password, string $tablename, string $username) : void {
    
    $db = connect($path, $user, $password);
    
    $query = 'DELETE FROM ' . $tablename . ' WHERE username = :user';    // Note: Risks of SQL injection
    $statement = $db->prepare($query); 
    $statement->bindValue(':user', $username);
    $statement->execute();                      // Execute prepared statement
}

?>