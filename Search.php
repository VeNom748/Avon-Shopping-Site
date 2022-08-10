<?php
    require("connection.php");
    require("Functions.php");

    $query = get_safe_value($conn , $_GET['query']);
    // gets value sent over search form
    if($query != ""){
        $sql = "SELECT * FROM products WHERE (`meta_title` LIKE '%".$query."%') OR (`meta_keywords` LIKE '%".$query."%')";
    }
    echo "My Query is $query";

?>