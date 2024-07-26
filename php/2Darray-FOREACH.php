<?php
    $winners=[
        ['firstname' => 'Bill', 'lastname'=>'Stefanuk'],
        ['firstname' => 'Ali', 'lastname'=>'Tehrani'],
        ['firstname' => 'Sora', 'lastname'=>'Chung'],
        ['firstname' => 'Scott', 'lastname'=>'Chen'],
        ['firstname' => 'Monzur', 'lastname'=>'Kabir'],
        ['firstname' => 'Alex', 'lastname'=>'Tugulea']
    ];

    echo "<p>Winners: </p>";
    foreach($winners as $key => $value){
        echo $key . "-->" . $value["firstname"] . " " . $value["lastname"] . "<br/>";
    }
    $var = true;
    $users = file_get_contents('../js/exam.json');
    $usersArray = json_decode($users, true);
    
    foreach($usersArray as $key => $user)
    {
    

        echo $user['user'] . ' ' . $user['password'] . '<br/>';
        

    } 
?>