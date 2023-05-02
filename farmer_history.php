<?php 
session_start();
ini_set('memory_limit', '-1');
$userlogin=$_SESSION['farmer_login_user'];
$servername="localhost";
$username="root";
$password="";
$dbname="agriculture_portal";


//Create Connection 
$conn =mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query1="SELECT * FROM farmerlogin WHERE email='".$userlogin."' ";
$result1=mysqli_query($conn,$query1);
$row=mysqli_fetch_array($result1);
$farmer_id=$row['farmer_id'];


$sql = "SELECT farmer_crop, farmer_quantity, farmer_price, `date` FROM farmer_history WHERE farmer_id='".$farmer_id."' ";
$result = mysqli_query($conn, $sql);




?>




<!DOCTYPE html>
<html>
<head>
<title>Agriculture Portal </title>

<!--Myprofile Css-->
<link rel="stylesheet" href="css/myprofilecss.css">

<!--MyProfile Checkbox CSS-->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/build.css">

<!--Myprofile Photo upload Css-->
<link rel="stylesheet" href="css/myprofileupload.css">

<!--Bootstrap-->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>

<!--Js for Progress form for Profile-->
<script src="js/myprofilejs.js"></script>
  
<!--Js for File upload for Profile-->
<script scr="js/myprofileupload.js"></script>

<!--Js for Validation of form -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

<!--Js for signupform-->
<script src="js/validateform.js"></script>

<!--Notify-->
<link href="misc/pnotify.css" rel="stylesheet">
<link href="misc/pnotify.brighttheme.css" rel="stylesheet">



<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gardening Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Niconne' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>

<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>

<!--Notify-->
<link href="css/pnotify.css" rel="stylesheet">
<link href="css/pnotify.brighttheme.css" rel="stylesheet">
<script src="js/pnotify.js"></script>


</head>
<body>

	<!-- header-section-starts -->


	<div class="header-banner" style="min-height:220px">
		<div class="container">
			
			<div class="header-top">
				<div class="social-icons">
					
					
					<div id="google_translate_element" ></div>
					
					<script type="text/javascript" >
					function googleTranslateElementInit() {
						new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'bn,en,gu,hi,kn,mr,ta,te'}, 'google_translate_element');
					}
					</script>
				
				</div>
				
			<span class="menu"><img src="images/nav.png" alt=""/></span>
				<div class="top-menu">
					<ul>
					<nav class="cl-effect-13">
						<li><a href="farmer_index.php">Home</a></li>
						<li><a href="php/logout.php">Logout</a></li>
						
					</nav>
					</ul>
				</div>
				<!-- script for menu -->
					<script> 
						$( "span.menu" ).click(function() {
						$( ".top-menu ul" ).slideToggle( 300, function() {
						 // Animation complete.
						});
						});
					</script>
				<!-- //script for menu -->

				<div class="clearfix"></div>
			</div>
			
			<div class="banner-info text-center">
				<h1><a href="farmer_history.php">Selling History</a></h1>
			</div>

			

		</div>
	</div>
	<!-- header-section-ends -->    


       
<table class="table table-striped table-bordered table-responsive-md btn-table">

<thead>
<tr>

    
    <th><center>Crop</center></th>
    <th><center>Quantity (in KG)</center></th>
    <th><center>Total Amount received (in Rs)</center></th>
    <th><center>Date of Transaction</center></th>
         
    
</tr>
</thead>

<tbody>
<?php  

while($row = $result->fetch_assoc()) {
    $cropname=ucfirst($row["farmer_crop"]);
    $cropquantity=$row["farmer_quantity"];
    $cropprice=$row["farmer_price"];
    $currentdate=$row['date'];

echo "<tr>";
    echo "<td><center>$cropname</center></td>";
    echo "<td><center>$cropquantity</center></td>";
    echo "<td><center>$cropprice</center></td>";
    echo "<td><center>$currentdate</center></td>";
echo "</tr>";

}
?>
</tbody>

</table> 

        
	
	<!-- footer-section -->
	<div class="footer" style="position:absolute;width:100%; bottom:0;">
		<div class="container">
			<div class="copyright text-center">
				<p>&copy; 2020 Agriculture Portal. All rights reserved | Design by Team 1 </a></p>
			</div>
		</div>
	</div>
	<!-- footer-section -->
	<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!--Google translate--> 
 <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>