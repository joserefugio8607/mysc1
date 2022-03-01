<?php
require_once 'functions.php';
require_once 'config.php';
include 'Browser.php';


$ip = get_client_ip();
$filter_loopback = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE)  && filter_var($ip, FILTER_CALLBACK, array('options' => 'FILTER_FLAG_NO_LOOPBACK_RANGE'));

if(!isset($_SESSION['USER_OK']) && $filter_loopback && $ip !== '::1') {
	$hostname = gethostbyaddr($ip);
	$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$browser = new Browser();
	$browser_name = $browser->getBrowser();

	$_SESSION['IP'] = $ip;
	$_SESSION['HOSTNAME'] = $hostname;
	$_SESSION['USERAGENT'] = $useragent;
	$_SESSION['REFERER'] = $referer;
}

/* :Localhost NOT blocked: */
if($enable_blocker && $filter_loopback && $ip !== '::1') 
{
	if(!isValidIp($ip)) {
			header($_ENV['SERVER_PROTOCOL']." 404 Not Found", true, 404);
			die(getErrorMessage()); 
		}

	if(isBlocked($ip, $hostname, $useragent, $browser_name, $referer, $ip_isp, $ip_organization, $country_code)) {
			$_SESSION['USER_OK'] = '-1';
			header($_ENV['SERVER_PROTOCOL']." 404 Not Found", true, 404);
			die(getErrorMessage()); 
		} else
		{
			$_SESSION['USER_OK'] = 'OK';
		}
} else {
	$_SESSION['USER_OK'] = 'OK';
}

?>