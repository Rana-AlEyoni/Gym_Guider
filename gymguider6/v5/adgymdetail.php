<?php
// Turn off all error reporting
error_reporting(0);
?>

<?php
    include("sessionadmin.php");  
    $q=$_REQUEST["id"];
    $sql = "SELECT * FROM gyms WHERE id='$q'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin-Home page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <style>
#footer{
        background-color: rgba(184,184,183,0.4);
        height:120;
    }
    
</style>
</head>
<body>

<div class="header">
<div class="row">
 <div class="col-sm-3">
 <a href="admin-main.php">
 <img id ="logo"
     src="img/gym.png"
     width="220"
     height="120"
     alt="GymsGuider Logo"
/></a>
</div>
<div class="col-sm-3 d-flex align-items-center"> 
</div>
 <div class="col-sm-3 d-flex align-items-center"> 
 
 <div class="btn-group">
      <button type="button" class="btn btn-outline-secondary">

          <img src="img/ChangeCurrency.jpg"
               width="15"
               height="15"
               alt ="change currency"/>
          Change currency</button>
      <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Dollars</a>
        <a class="dropdown-item" href="#">Riyal</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </div>
 </div>

 <div class="col-sm-3 d-flex align-items-center"> 
 <li class="dropdown">
    <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown">
        <img src="img/user1.png"  height="80" width="80" class="img-circle special-img"> </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-cog"></i> Account</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i> Sign-out</a></li>
                </ul>
</li>
<p style="color:blue;"><?php echo "Welcome: ".$_SESSION['login_admin']; ?></p>
</div>
 <div class="col-sm-2 d-flex align-items-center">
 
 </div>
 <div class="col-sm-2 d-flex align-items-center">

 </div>
 <div class="col-sm-2 d-flex align-items-center">

 </div>
</div>
</div>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
<div class="container">
<br>


<h5><?php echo $row['name'];?> </h5>
  <br>
  <div class="row">
  <div class="col-sm-6">
<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 500px;
  }
  </style>
<div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>
<div class="row">
<!-- The slideshow -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="<?php echo "uploads/".$row['image'];?>" alt="Los Angeles" width="1100" height="500">
  </div>
  <div class="carousel-item">
    <img src="<?php echo "uploads/".$row['image2'];?>" alt="Chicago" width="1100" height="500">
  </div>
  <div class="carousel-item">
    <img src="<?php echo "uploads/".$row['image3'];?>" alt="New York" width="1100" height="500">
  </div>
  <div class="carousel-item">
    <img src="<?php echo "uploads/".$row['image4'];?>" alt="New York" width="1100" height="500">
  </div>
  <div class="carousel-item">
    <img src="<?php echo "uploads/".$row['image5'];?>" alt="New York" width="1100" height="500">
  </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>


</div>
  </div>

</div>
</div>
<br><br><br>
<div class="row">


<div style="background-color: rgba(184,184,183,0.4); width: 80%;text-align:20px;">
<h6><?php echo $row['price']." per month";?></h6><br>
  <h6>The email: <?php echo $row['email']; ?></h6><br>
  <h6>The Phone: <?php echo $row['phone']; ?></h6><br>
  <h6>The Country: <?php echo $row['country']; ?></h6><br>
  <h6>The City: <?php echo $row['city']; ?></h6><br>
  <h6>The District: <?php echo $row['district']; ?></h6><br>
  <h6>The Working hours: <?php echo $row['wstart_at']."-".$row['wend_at']; ?></h6>

</div>
</div>
<br>
 <a class="btn btn-secondary" href="publish.php?id=<?php echo $row['id'];?> role="button">Publish</a>  <a class="btn btn-outline-dark" href="reject.php?id=<?php echo $row['id'];?> role="button">Reject</a>
</div>
<br><br>
<footer id="footer" class="page-footer">
    <br/>
    <div class="row">

</span>

    <span style=" position: relative; left: 37%; color:#131355 ; font-size: 13px"> <b> Copyright &copy 2019 GymsGuider. All rights reserved.</b></span>
    <p style=" position: relative; left: 44%; font-size: 13px;"> <a href="#"> About us</a> | <a href="#">Contact us</a> </p>
    <br/>

</div>


</footer>
</body>
</html>
