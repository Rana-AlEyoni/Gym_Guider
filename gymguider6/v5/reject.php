<?php
    include("sessionadmin.php");  

    $q=$_REQUEST["id"];

    $sqlupdate = "DELETE from gyms  WHERE id='$q'";
    //echo  $sqlupdate;
    mysqli_query($db, $sqlupdate);
	    
    header("location: newrequests.php");
    
    ?>