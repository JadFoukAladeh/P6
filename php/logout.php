<?php
//  Authenticate.php (uses sessions)
    session_start();    //start session
    session_destroy();

    echo "you've been logged out";
    echo "Log in again here <a href=../P6/login.html >Here</a>";



?>