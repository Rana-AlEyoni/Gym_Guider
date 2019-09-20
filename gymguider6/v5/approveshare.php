<?php
    include("sessionadmin.php");  

    $q=$_REQUEST["id"];

    $sqlupdate = "UPDATE feedback SET isvalid='1' WHERE id='$q'";
    //echo  $sqlupdate;
    mysqli_query($db, $sqlupdate);
	    
    header('Location: ' . $_SERVER['HTTP_REFERER']);    
    
    ?>