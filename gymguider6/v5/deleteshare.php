<?php
    include("sessionadmin.php");  

    $q=$_REQUEST["id"];

    $sqlupdate = "DELETE from feedback  WHERE id='$q'";
    //echo  $sqlupdate;
    mysqli_query($db, $sqlupdate);
	    
    header('Location: ' . $_SERVER['HTTP_REFERER']);    
    ?>