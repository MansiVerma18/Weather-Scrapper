<?php
	$error="";
	$weather="";
	if($_GET["city"]){
		$city=$_GET["city"];	
		$url=file_get_contents
		("http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=b159b3d4d1b9b138b19885eafdeee5b9");
		$weatherArray=json_decode($url,true);
		if ($weatherArray['cod'] == 200) {
        
            $weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. ";

            $tempInCelcius = intval($weatherArray['main']['temp'] - 273);

            $weather .= " The temperature is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray['wind']['speed']."m/s.";
            
        } else {
            
            $error = "Could not find city - please try again.";
        }
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">		
		<style type="text/css">	
			html { 
				background: url(backgroung.jpg) no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			body{
				background:none;
				
			}
			
			.content{
				text-align:center;
				margin-top:180px;
				margin-left:450px;
				
				width:500px;
				font-size:120%;
			}	
			
			#weather {
              
              margin-top:15px;
              
          }
		</style> 
  	</head>  
	<body>
		
		<div class="content">
			<h1 style="font-size:250%">What's the weather?</h1>		
		
		<form>  
			<div class="form-group">
				<label for="city">Enter the name of the city</label>
				<input type="text" name="city" class="form-control" placeholder="Eg. Agra,Delhi." autocomplete>
				
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-primary">Reset</button>
		</form>
		
		
          <div id="weather"><?php 
              
              if ($weather) {
                  
                  echo '<div class="alert alert-success" role="alert">
  '.$weather.'
</div>';
                  
              } else if ($error) {
                  
                  echo '<div class="alert alert-danger" role="alert">
  '.$error.'
</div>';
                  
              }
              
              ?></div>
      </div>
	  <script type="text/javascript">
	  $("#weather").click(function(){
		  $(this).fadeOut();
	  });
	  $(".content").click(function(){
		  $(this).fadeOut();
	  });
<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>