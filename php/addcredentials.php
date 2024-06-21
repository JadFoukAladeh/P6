<?php

//  new (uses sessions)
    session_start();    //start session
    echo "hey";

    

    $users = file_get_contents('../js/exam.json');
    $usersArray = json_decode($users, true);
    $inputArray = array
    (
        'user' => $_POST['username'],
        'password' => $_POST['password']
    );
        
    $usersArray[] =$inputArray;
    // foreach($usersArray as $key => $user)
    // {
    //     echo "did we make it";
    //     $usersArray[$key]['user'] = $_POST['username'];
    //     $usersArray[$key]['password'] = $_POST['password'];
    //     echo "hello user:" . $usersArray[$key]['user'] . "<br/>";
    //     echo "hello user:" . $usersArray[$key]['password'] . "<br/>";
        
    // } 
    // $usersArray[] = $_POST['username'];
    // $usersArray[] = $_POST['password'];
    
    $new=json_encode($usersArray, true);
    file_put_contents('../js/exam.json', $new);
    
    

?>