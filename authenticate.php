<?php

include(__DIR__."/header.php");

$data = json_encode(array(
	"username"=> "login",
	"password"=> "password"
));

$ch = createRequest("https://client-api.shipito.com/api/v1/authenticate");
curl_setopt($ch, CURLOPT_POST, count($data));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
$response = curl_exec($ch);

if(curl_getinfo($ch, CURLINFO_HTTP_CODE) === 204 )
{
	curl_close($ch);
	echo "Authenticated";
}else{
	var_dump($response);
	var_dump(curl_error($ch));
	curl_close($ch);
}

?>
