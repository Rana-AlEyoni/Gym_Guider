<?php
// Turn off all error reporting
error_reporting(0);
?>

<?php
    
	$message="";
  include("sessioncustomer.php");   

    if($_SERVER["REQUEST_METHOD"] == "POST") {
       
         $qsearch = mysqli_real_escape_string($db,$_POST['qsearch']);
         $searchby =strtolower($_POST["searchby"]); 
         $sql="";
        if($searchby=='byname'){
          $sql = "SELECT * FROM gyms WHERE name LIKE '%$qsearch%' AND isActive=1";
        }
        else if($searchby=='bycity'){
          $sql = "SELECT * FROM gyms WHERE city LIKE '%$qsearch%' AND isActive=1";
        }
        
         $result = mysqli_query($db,$sql);
         $myusername=$_SESSION['login_customer'];

         $count = mysqli_num_rows($result);
         $sql="INSERT INTO searchhistory(username,query,search_by,no_results)
         VALUES('$myusername', '$qsearch','$searchby','$count')";
           mysqli_query($db,$sql);
	       if($count<1){
          $message="Sorry, there is no result(s) try another keyword !";
         }
			 
    }
    
   
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search gym</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  .bg-dark,.btn-secondary,.table-dark {
    background-color: #131355!important;
}
.btnsearch {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 10px 14px;
  font-size: 14px;
  cursor: pointer;
  height: 38px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
#footer{
        background-color: rgba(184,184,183,0.4);
    }
</style>
</head>
<body>

<?php require("cheader.php");?>

<div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">
    <h1 style="color:white">What GYMs are you looking for ?</h1>
    <form action="csearch.php" method="post" style="color:white">      
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
<input type="text"  pattern=".{3,}"   required title="3 characters minimum" class="form-control col-sm-5" id="qsearch" name="qsearch">&nbsp;
    <button type="submit" class="btnsearch"> Search</button>
    </div>

</form>
  </div>
</div>
  <script>
  
  function sortOption(str)
  {
	  $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
   
        var searchby="<?php echo $searchby;?>";
        var qsearch="<?php echo $qsearch;?>";
		
        var sam = get_filter('sam');
		var croom = get_filter('croom');
        var wifi = get_filter('wifi');
        var lockers = get_filter('lockers');
        var parking = get_filter('parking');
		
		var pool = get_filter('pool');
		var basket = get_filter('basket');
        var sauna = get_filter('sauna');
        var football = get_filter('football');
        var cmachine = get_filter('cmachine');
	    var wmachine = get_filter('wmachine');
		var classes = get_filter('classes');
        var tenis = get_filter('tenis');
        var volley = get_filter('volley');	
		 
        var gender=$('select[name=gender]').val();
		var price=$('select[name=price]').val();
		var rate=$('select[name=rate]').val();
	    var whours=$('select[name=whours]').val();
        var pet=$('select[name=pet]').val();
		var sortOption=str;
        $.ajax({
            url:"cfetch_data.php",
            method:"POST",
            data:{action:action,  sam:sam,croom:croom,wifi:wifi,lockers:lockers,parking:parking,gender:gender,price:price,rate:rate,whours:whours,
			pet:pet,pool:pool,basket:basket,sauna:sauna,football:football,cmachine:cmachine,classes:classes,tenis:tenis,volley:volley,qsearch:qsearch,
			searchby:searchby,sortOption:sortOption},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
	  
  }
  
  function changeGender(str){
	  
	  
		  filter_data();
	 
  }
  function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
   
        var searchby="<?php echo $searchby;?>";
        var qsearch="<?php echo $qsearch;?>";
		
        var sam = get_filter('sam');
		var croom = get_filter('croom');
        var wifi = get_filter('wifi');
        var lockers = get_filter('lockers');
        var parking = get_filter('parking');
		
		var pool = get_filter('pool');
		var basket = get_filter('basket');
        var sauna = get_filter('sauna');
        var football = get_filter('football');
        var cmachine = get_filter('cmachine');
	    var wmachine = get_filter('wmachine');
		var classes = get_filter('classes');
        var tenis = get_filter('tenis');
        var volley = get_filter('volley');	
		 
        var gender=$('select[name=gender]').val();
		var price=$('select[name=price]').val();
		var rate=$('select[name=rate]').val();
	    var whours=$('select[name=whours]').val();
        var pet=$('select[name=pet]').val();

        $.ajax({
            url:"cfetch_data.php",
            method:"POST",
            data:{action:action,  sam:sam,croom:croom,wifi:wifi,lockers:lockers,parking:parking,gender:gender,price:price,rate:rate,whours:whours,
			pet:pet,pool:pool,basket:basket,sauna:sauna,football:football,cmachine:cmachine,classes:classes,tenis:tenis,volley:volley,qsearch:qsearch,searchby:searchby},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }
$(document).ready(function(){

   

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
   
   
        var searchby="<?php echo $searchby;?>";
        var qsearch="<?php echo $qsearch;?>";
		
        var sam = get_filter('sam');
		var croom = get_filter('croom');
        var wifi = get_filter('wifi');
        var lockers = get_filter('lockers');
        var parking = get_filter('parking');
		
		var pool = get_filter('pool');
		var basket = get_filter('basket');
        var sauna = get_filter('sauna');
        var football = get_filter('football');
        var cmachine = get_filter('cmachine');
	    var wmachine = get_filter('wmachine');
		var classes = get_filter('classes');
        var tenis = get_filter('tenis');
        var volley = get_filter('volley');	
		
		
		 var gender=$('select[name=gender]').val();
		var price=$('select[name=price]').val();
		var rate=$('select[name=rate]').val();
	    var whours=$('select[name=whours]').val();
        var pet=$('select[name=pet]').val();
		 
         $.ajax({
            url:"cfetch_data.php",
            method:"POST",
            data:{action:action,  sam:sam,croom:croom,wifi:wifi,lockers:lockers,parking:parking,gender:gender,price:price,rate:rate,whours:whours,
			pet:pet,pool:pool,basket:basket,sauna:sauna,football:football,cmachine:cmachine,classes:classes,tenis:tenis,volley:volley,qsearch:qsearch,searchby:searchby},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });



});
</script>
<div class="container">
<br>
 

  <h5> Search page </h5>
		 
 			
  <br>
  <div class="row">
  
	
  <div class="col-md-3">
<div class="list-group">
  <h6>Range of prices</h6>
  <div class="list-group-item">
  <select name="price" onchange="changeGender(this.value)">
    <option value="">Select price range</option>
    <option value="r1">0$-50$</option>
    <option value="r2">50$-250$</option>
    <option value="r3">+250$</option>
  </select>
                    </div>
              
  </div>  

<div class="list-group">
  <h6>Overall cutomers ratings</h6>
  <div class="list-group-item">
  <select name="rate" onchange="changeGender(this.value)">
    <option value="">Select rate</option>
    <option value="5">Excellent</option>
    <option value="3">Good</option>
    <option value="1">Bad</option>
	<option value="0">No rating</option>

  </select>
                    </div>
              
  </div>  
<div class="list-group">
  <h6>Working hours </h6>
  <div class="list-group-item">
  <select name="whours" onchange="changeGender(this.value)">
      <option value="">Select period</option>
    <option value="p1">7am-5pm</option>
    <option value="p2">5pm-12am</option>
    
  </select>
                    </div>
              
  </div>   
  <div class="list-group">
  <h6>Services</h6>
  <div class="list-group-item checkbox">
                        <label>
                        <input type="checkbox" class="common_selector sam" name="sam" value="1">Swimsuit drying machine
                        </label><br>
                        <label>
                        <input type="checkbox" class="common_selector croom" name="croom" value="1">Changing room
                        </label><br>
						<label>
                        <input type="checkbox" class="common_selector wifi" name="wifi" value="1">WiFI
                        </label><br>
						<label>
                        <input type="checkbox" class="common_selector lockers" name="lockers" value="1">lockers
                        </label><br>
						<label>
                        <input type="checkbox" class="common_selector parking" name="parking" value="1">parking
                        </label>
                    </div>
              
  </div>  
<div class="list-group">
  <h6>Facilities</h6>
  <div class="list-group-item checkbox">
                        <label>
                        <input type="checkbox" class="common_selector pool" name="pool" value="1">Swimming Pool
                        </label><br>
                        <label>
                        <input type="checkbox" class="common_selector basket" name="basket" value="1">Basket ball
                        </label><br>
						<label>
                        <input type="checkbox" class="common_selector sauna" name="sauna" value="1">Sauna path
                        </label><br>
						<label>
                        <input type="checkbox" class="common_selector football" name="football" value="1">football
                        </label><br>
						<label>
                        <input type="checkbox" class="common_selector parking" name="cmachine" value="1">Cardio machine
                        </label><br>
						<label>
                        <input type="checkbox" class="common_selector wmachine" name="wmachine" value="1">Weight machine
                        </label><br>
						<label>
                        <input type="checkbox" class="common_selector Classes" name="Classes" value="1">Classes
                        </label><br>
						<label>
                        <input type="checkbox" class="common_selector tenis" name="tenis" value="1">Table Tennis
                        </label><br>
						<label>
                        <input type="checkbox" class="common_selector volley" name="volley" value="1">Volley ball
                        </label><br>
                    </div>
              
  </div>     

<div class="list-group">
  <h6>Allow gender</h6>
  <div class="list-group-item">
  <select name="gender" onchange="changeGender(this.value)">
    <option value="">Select gender</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="both">Both</option>
  </select>
                    </div>
              
  </div> 

<div class="list-group">
  <h6>Pet friendly </h6>
  <div class="list-group-item">
  <select name="pet" onchange="changeGender(this.value)">
    <option value="">Select</option>
    <option value="1">Yes</option>
    <option value="0">No</option>

  </select>
                    </div>
              
  </div> 

  </div>
 <div class="col-md-9">
  <h6>SORT your result:</h6>
 <table class="table table-dark">
    <thead>
     
       
        <th  onclick="sortOption('sort2')"><a style="color:white;" href='#'>Price(low to high)</a></th>
        <th onclick="sortOption('sort1')"><a style="color:yellow;" href='#'>Price(high to low)</a></th>
		<th onclick="sortOption('sort3')"><a style="color:white;" href='#'>Overall rating (low to high)</a></th>
        <th onclick="sortOption('sort4')"><a style="color:yellow;" href='#'>Overall rating (high to low)</a></th>
        <th onclick="sortOption('sort5')"><a style="color:white;" href='#'>Most review first</a></th>
		<th onclick="sortOption('sort6')"><a style="color:yellow;" href='#'>Less review first</a></th>


      
    </thead>
	
</table>  

		<div class="filter_data">
		<div class="row" id="filterdata">
		<?php while($row1 = mysqli_fetch_array($result)):;
				
					
        ?>
<div class="card col-dm-6" style="width:1000px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%">
<img  class="card-img-top" src="<?php echo "uploads/".$row1['image'];?>" alt="Gym Logo" style="width:210px; margin:2%;">
<div style ="position: relative; margin-left:28%; margin-top:-18%;" class="card-body">
<h3 class="card-title"><?php echo $row1['name']; ?></h3>
 


<p class="card-text"><?php echo $row1['price']." $per month";?></p>
<p class="card-text"><?php echo $row1['no_rates']." Rates";?>

 <button style="margin-left:60%; width :20%;" type="submit"  class="btn btn-dark card-text" id="Delete">
     <a href="cgymdetail.php?id=<?php echo $row1['id'];?>" style="color:white;">View details</a>
                                                                   
                                                                  </button> </p> 

                                                                  
</div>
</div>
<?php endwhile;?>
</div>
</div>
</div>
  </div>
  
</div>
<br><br>
<?php require("footer.php");?>

</body>
</html>