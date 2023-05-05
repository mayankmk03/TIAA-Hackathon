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
						<li><a href="customer_index.php">Home</a></li>
						<li><a href="my_orders.php">My Orders</a></li>
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
				<h1><a href="buy_crops.php">Previous Orders</a></h1>
			</div>

			

		</div>
	</div>

<?php 
ini_set('memory_limit', '-1');
error_reporting(E_ERROR | E_PARSE);
session_start();
						
$userlogin=$_SESSION['customer_login_user'];
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

$customer_id=$_SESSION['customer_id'];


// create the SQL query
$query = "SELECT * FROM orders_placed WHERE cust_id = $customer_id";

// execute the query and get the result set
$result = mysqli_query($conn, $query);

// check if there are any rows returned
if (mysqli_num_rows($result) > 0) {

    echo "<table class='table table-striped table-bordered table-responsive-md btn-table text-center'>";

    // echo "<table class='table table-striped table-bordered table-responsive-md btn-table'>";
    echo "<tr><th style='text-align:center;'>Order ID</th><th style='text-align:center;'>Crop Name</th><th style='text-align:center;'>Quantity</th><th style='text-align:center;'>Price</th><th style='text-align:center;'>Re-Order</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["order_id"] . "</td>";
      echo "<td>" . $row["cropname"] . "</td>";
      echo "<td>" . $row["quantity"] . "</td>";
      echo "<td>" . $row["price"] . "</td>";
      echo "<td>  <button class='Buy' name='buy_now' type='submit'>Re-Order </button> </td>";
      echo "</tr>";
    }
    echo "</table>";
    

} else {
  echo "No orders found for customer with id $customer_id";
}

?>
</html>