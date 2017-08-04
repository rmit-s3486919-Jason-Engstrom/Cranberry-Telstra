<!DOCTYPE html>
<html>
heyo<br>
<?php 
//$url = 'https://cloud.google.com/appengine/docs/standard/php/issue-requests#gae-url-requests-php-stream-handlers';
$url = 'https://tic2017team030.iot.telstra.com';///measurement/measurements';
$username = 'ZappyBoard';
$password = 'B3_0ur_lord!';
//$data = ['data' => 'this', 'data2' => 'that'];
$headers = [
    'Accept: */*',
    'Content-Type: application/x-www-form-urlencoded',
    'Custom-Header: custom-value',
    'Custom-Header-Two: custom-value-2'
];

// open connection
echo "before curl_init()";
$ch = curl_init();
echo "after curl_init()";

if ($ch != NULL)
{
	echo "and away we ";
}
// set curl options
$options = [
     CURLOPT_URL => $url,
	 CURLOPT_HTTPGET => TRUE,
	 //CURLOPT_USERPWD => $username . ":" . $password,
	 CURLOPT_USERPWD => "$username:$password",
    // CURLOPT_POST => count($data),
    // CURLOPT_POSTFIELDS => http_build_query($data),
    // CURLOPT_HTTPHEADER => $headers,
    // CURLOPT_RETURNTRANSFER => true,

//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt_array($ch, $options);

// execute
$result = curl_exec($ch);

//echo $result;

// close connection
curl_close($ch);
?>
</html>