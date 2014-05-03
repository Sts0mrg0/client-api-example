<?php

include(__DIR__."/header.php");

$ch = createRequest("https://client-api.shipito.com/api/v1/dashboard");
$response = curl_exec($ch);
var_dump(curl_getinfo($ch));

if(curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200 )
{
	curl_close($ch);
	var_dump($response);
}elseif(curl_getinfo($ch, CURLINFO_HTTP_CODE) === 401 ){
	echo "Not authenticated, run authenticate.php first";
}else{
	var_dump(curl_error($ch));
	curl_close($ch);
}

?>