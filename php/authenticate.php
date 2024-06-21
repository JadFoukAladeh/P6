<?php
//  new (uses sessions)
    session_start();    //start session
    $var = true;
    $users = file_get_contents('../js/exam.json');
    $usersArray = json_decode($users, true);
    
    foreach($usersArray as $key => $user)
    {


        if(($usersArray[$key]['user'] == $_POST['username']))
        {
            echo "Welcome user";
            $_SESSION['username']=$username;
            echo "<p>Congratulations, you are now logged ino the site</p>";
            echo "<p> Please click <a href=\P6/php/members.php\> Here </a></p>";
            $var=false;
            break;

        }
        

    } 

    
    if($var)
    {
        echo "<p> Please enter a valid username and password. Back to login page: <a href='../exam.html'> Here </a> </p>";

    }
?>
