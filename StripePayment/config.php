<?php
	require_once "stripe-php-master/init.php";
	require_once "products.php";

	$stripeDetails = array(
		"secretKey" => "sk_test_51N2z4ASJ0cVSbRsyEOgha7J5lb1NSKHfe1nUc1vIFM3Btc1nGjDO5agYwx0paWKnqFZKEA6j71V9eXpDJlsZIoKX00O6mixIQj",  //Your Stripe Secret key
		"publishableKey" => "pk_test_51N2z4ASJ0cVSbRsyRhbX8mz04W57KUHTE7ZnabXWzVLx2bhaVC4jLbRxh6wXKss5i4q14DleB6NzlOJNWMdQA3Q600sWkfNFJd"  //Your Stripe Publishable key
	);

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys

	\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
?>
