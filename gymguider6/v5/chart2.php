<?php
  include("config.php");
	$message="";
  $sql = "SELECT * FROM gyms WHERE isActive=1";
  $result = mysqli_query($db,$sql);
  $c1="50";
  $c2="56";
  $c3="48";
  $c4="58";
  $c5="70";
  $c6="50";
  $c7="30";
  $c8="20";

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GYM guider home page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>

  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
	    <link rel="stylesheet" href="ss.css" type="text/css">

	<link rel="stylesheet" href="simple-donut.css" type="text/css">

  <script type="text/javascript" src="simple-donut-jquery.js"></script>
  
	<script type="text/javascript">
		FusionCharts.ready(function(){
			var chartObj = new FusionCharts({
    type: 'doughnut2d',
    renderAt: 'chart-container',
    width: '550',
    height: '450',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Overall customers' review",
           
            "bgColor": "#ffffff",
            "startingAngle": "310",
            "showLegend": "1",
            "defaultCenterLabel": "Total review: 60",
            "centerLabel": "Review from $label: $value",
            "centerLabelBold": "1",
            "showTooltip": "0",
            "decimals": "0",
            "theme": "fusion"
        },
        "data": [{
            "label": "Positive",
            "value": <?php echo "20";?>
        }, {
            "label": "negative",
            "value": "20"
        }, {
            "label": "neutral",
            "value": "20"
        }]
    }
}
);
			chartObj.render();
		});
	</script>
  <style>
.btnsearch {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 10px 14px;
  font-size: 14px;
  cursor: pointer;
  height: 38px;
}
.bg-dark,.btn-secondary {
    background-color: #131355!important;
}
/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
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
 <a href="index.php">
 <img id ="logo"
     src="img/gym.png"
     width="220"
     height="120"
     alt="GymsGuider Logo"
/></a>
</div>
<div class="col-sm-3">
</div>
 <div class="col-sm-6 d-flex align-items-center"> 
 
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
    
 <a class="btn btn-outline-dark" href="postgym.php" role="button">Post a GYM</a>
 <a class="btn btn-secondary" href="register.php" role="button">Register as customer</a>
 <a class="btn btn-secondary" href="login.php" role="button">Login</a>

 
 </div>
 

</div>
</div>
<div class="jumbotron bg-dark">
  <div class="wrapper container">
    <h1 style="color:white">What GYMs are you looking for ?</h1>
    <form action="searchnew.php" method="post" style="color:white">      
    <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="searchby" value="byname" checked>Gym name
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="searchby" value="bycity">City name
  </label>
</div>
<br>
<br>
<div class="form-group form-inline">
<input type="text"   pattern=".{3,}"   required title="3 characters minimum" class="form-control col-sm-5" id="qsearch" name="qsearch">&nbsp;
    <button type="submit" class="btnsearch"><i class="fa fa-search"></i> Search</button>
    </div>

</form>
  </div>
</div>
  
<div class="wrapper container">
<br>
  <h5> Home page </h5>
							<h5 style="color:red;"><?php echo $message; ?></h5>
  <br>
  
 <div id="chart-container">FusionCharts XT will load here!</div>
 <div class="row">
 <div id="criteria1" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>
   
    <div id="criteria2" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>
    
    <div id="criteria3" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>

    <div id="criteria4" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>
   <div class="col-sm-3">
    The value of money
	</div>
	<div class="col-sm-3">
    cleanliness
	</div>
	<div class="col-sm-3">
    Staff
	</div>
	<div class="col-sm-3">
    Workout falicities
	</div>
	
    <div id="criteria5" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>
    
    <div id="criteria6" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>
    
    <div id="criteria7" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>
    
    <div id="criteria8" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>
	
	<div class="col-sm-3">
    Services
	</div>
	<div class="col-sm-3">
   Instructors
	</div>
	<div class="col-sm-3">
    Comfort and quality
	</div>
	<div class="col-sm-3">
    Recomended to others
	</div>
    </div>
    <?php echo "<script>updateDonutChart('#criteria1', $c1, true);</script>"?>

      <?php echo "<script>updateDonutChart('#criteria2', $c2, true);</script>"?>
    <?php echo "<script>updateDonutChart('#criteria3', $c3, true);</script>"?>
    <?php echo "<script>updateDonutChart('#criteria4', $c4, true);</script>"?>
    <?php echo "<script>updateDonutChart('#criteria5', $c5, true);</script>"?>
    <?php echo "<script>updateDonutChart('#criteria6', $c6, true);</script>"?>
    <?php echo "<script>updateDonutChart('#criteria7', $c7, true);</script>"?>
    <?php echo "<script>updateDonutChart('#criteria8', $c8, true);</script>"?>

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
