<?php 
// CRUD (Create, Read, Update, Delete) functions

function connect(string $path, string $user, string $password) {
    $db = new PDO($path,$user, $password);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db; 
}

// Insert
function insert($path, $user, $password, $current_date, $current_time, $status, $currentFloor, $requestedFloor, $otherInfo) {
    $db = connect($path, $user, $password);
    $query = 'INSERT INTO elevatorNetwork(date, time, status, currentFloor, requestedFloor, otherInfo) VALUES
    (:date, :time, :status, :currentFloor, :requestedFloor, :otherInfo)';
    $params = [
        'date' => $current_date['CURRENT_DATE()'],
        'time' => $current_time['CURRENT_TIME()'],
        'status' => $status, 
        'currentFloor' => $currentFloor,
        'requestedFloor' => $requestedFloor, 
        'otherInfo' => $otherInfo
    ];
    $statement = $db->prepare($query);
    $result = $statement->execute($params); 
}

// Read
function showtable(string $path, string $user, string $password, $tablename) {
    echo "<h3>Content of ElevatorNetwork table</h3>";
    $db = connect($path, $user, $password); 
    $query = "SELECT * FROM $tablename GROUP BY nodeID ORDER BY nodeID";  // Note: Risk of SQL injection
    $rows = $db->query($query); 
    echo "DATE|TIME|NODEID|STATUS|CURRENTFLOOR|REQUESTED FLOOR|OTHERINFO <br>";
    foreach ($rows as $row) {
        echo $row['date'] . " | " . $row['time'] . " | " . $row['nodeID'] . " | " . $row['status'] . " | " 
             . $row['currentFloor'] . " | " . $row['requestedFloor'] . " | " . $row['otherInfo'] . "<br>";
    }
}

// Update
function update(string $path, string $user, string $password, string $tablename, int $node_ID, int $new_status, int $new_currentFloor, 
                int $new_requestedFloor, string $new_otherInfo) : void {
    $db = connect($path, $user, $password);
    $query = 'UPDATE ' . $tablename . ' SET status = :stat, currentFloor = :curFloor, requestedFloor = :rqFloor, otherInfo = :oInfo
             WHERE nodeID = :id' ;    // Note: Risks of SQL injection
    $statement = $db->prepare($query); 
    $statement->bindValue('stat', $new_status); 
    $statement->bindValue('curFloor', $new_currentFloor);
    $statement->bindValue('rqFloor', $new_requestedFloor);
    $statement->bindValue('oInfo', $new_otherInfo);
    $statement->bindValue('id', $node_ID); 
    $statement->execute();                      // Execute prepared statement
}
// Delete
function delete(string $path, string $user, string $password, string $tablename, int $node_ID) : void {
    $db = connect($path, $user, $password);
    $query = 'DELETE FROM ' . $tablename . ' WHERE nodeID = :id' ;    // Note: Risks of SQL injection
    $statement = $db->prepare($query); 
    $statement->bindValue('id', $node_ID); 
    $statement->execute();                      // Execute prepared statement
}

/*  LOGGING FUNCTIONS FOR THE DATABASE   */
function insert_log($path, $user, $password,  string $action) {
    $db = connect($path, $user, $password);
    $curr_date_query = $db->query('SELECT CURRENT_DATE()'); 
    $current_date = $curr_date_query->fetch(PDO::FETCH_ASSOC);
    $current_time_query = $db->query('SELECT CURRENT_TIME()');
    $current_time = $current_time_query->fetch(PDO::FETCH_ASSOC);
    $x= $current_date['CURRENT_DATE()'];
    $y = $current_time['CURRENT_TIME()'];
    $query = 'INSERT INTO userLogs 
             (action, user, password, date, time) 
      VALUES (:action, :user, :password, :date, :time )'; // ':' identified parameters 
      
    $params = [
             'action' => $action, 
             'user' => $user,
             'password' => $password, 
             'date' => $x,
            'time' => $y
    ];
    var_dump($query);
    var_dump($db->prepare($query));
    $statement = $db->prepare($query);
    $result = $statement->execute(); 
    

//Print contents of the entire database
$rows = $db->query('SELECT * FROM userLogs');
foreach($rows as $row){
    var_dump($row);
    echo "<br/><br/>";
}

}

?>