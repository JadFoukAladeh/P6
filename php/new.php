<?php

//  new (uses sessions)
    session_start();    //start session
    
   
    
    if($username && $password)
    {
        $_SESSION['username']=$username;
        echo "<p>Congratulations, you are now logged ino the site</p>";
        echo "<p> Please click <a href=\'member.php'\> Here </a></p>";
    }
    else
    {
        echo "<p> Please enter a username and password</p>";
    }



?>