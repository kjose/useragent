<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description, x-cookie, x-contenttype, x-encoding');

$headers = getallheaders();
$cookie = $headers['x-cookie'];

$url = $_GET['url'];
$ua = $_GET['ua'];
$ch = curl_init($url);
$chHeaders = array(
	'Content-type: text/html; charset=utf-8',
	'User-Agent: ' . $ua,
	'Cookie: ' . $cookie
);
// echo '<pre>' . print_r( $chHeaders , true);
// die();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $chHeaders);
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
curl_setopt($ch, CURLOPT_ENCODING , "gzip");
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_REFERER, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$content = 'ERROR : ';
try {
	$content = curl_exec($ch);
} catch(Exception $e) {
	$content .= $e->getMessage();
}

// $info = curl_getinfo($ch);
// echo '<pre>' . print_r( $info , true);

// Transform encoding from utf8 to website client encoding
echo mb_convert_encoding($content, 'utf-8', $headers['x-encoding']);
curl_close($ch);

?>
