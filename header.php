<?php

define("TOKEN", 'YOUR TOKEN HERE');

function createRequest($url)
{
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Token: ' . TOKEN));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE); 

	curl_setopt($ch, CURLOPT_CAINFO, __DIR__."/equifax.crt");

	$cookie_file = realpath(dirname(__FILE__) . '/cookie.txt');
	if (! file_exists($cookie_file) || ! is_writable($cookie_file))
	{
	    echo 'Cookie file missing or not writable.';
	    exit;
	}	


	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
	curl_setopt($ch, CURLOPT_COOKIEFILE,  $cookie_file);
	curl_setopt($ch, CURLOPT_HEADER, true);

	curl_setopt($ch, CURLOPT_VERBOSE, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

	return $ch;
}