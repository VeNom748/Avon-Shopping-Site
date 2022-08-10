<?php

    // root is a username and "" is a password 
    // amazon_clone is a selected database from php my admin  
    
    $conn = mysqli_connect("localhost", "root", "", "amazon_clone");

    if (!$conn) {
        echo "connection faild";
    }
?>