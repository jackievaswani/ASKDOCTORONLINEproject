<?php

require  'connect.php';
session_start();
if(isset($_SESSION['userid']))
	require 'nav1.php';
	
else
	require 'nav.php';


/****

* Simple PHP application for using the Bing Search API

*/

$acctKey = '3b+olGeHvhxuLRyOLiP5c/BYqkG711xic2W3nfBaaTs';

$rootUri = 'https://api.datamarket.azure.com/Bing/Search';

// Read the contents of the .html file into a string.

$contents = file_get_contents('bing_basic.html');

if (isset($_POST['query']) && !empty($_POST['query']))

{
//$_POST['query']="ASKDOCTORONLINE : ".$_POST['query'];
// Here is where you'll process the query.

// The rest of the code samples in this tutorial are inside this conditional block.
// Encode the query and the single quotes that must surround it.

$query = urlencode("'{$_POST['query']}'");

// Get the selected service operation (Web or Image).

$serviceOp = $_POST['service_op'];

// Construct the full URI for the query.

$requestUri = "$rootUri/$serviceOp?\$format=json&Query=$query";

$auth = base64_encode("$acctKey:$acctKey");

$data = array(

'http' => array(

'request_fulluri' => true,

// ignore_errors can help debug – remove for production. This option added in PHP 5.2.10

'ignore_errors' => true,

'header' => "Authorization: Basic $auth")

);

$context = stream_context_create($data);

// Get the response from Bing.

$response = file_get_contents($requestUri, 0, $context);

$jsonObj = json_decode($response); $resultStr = ''; // Parse each result according to its metadata type.
 foreach($jsonObj->d->results as $value)
 { switch ($value->__metadata->type) { 
 case 'WebResult': $resultStr .= "<a href=\"{$value->Url}\">{$value->Title}</a><p>{$value->Description}</p>"; break;
 case 'ImageResult': $resultStr .= "<h4>{$value->Title} ({$value->Width}x{$value->Height}) " . "{$value->FileSize} bytes)</h4>" . "<a href=\"{$value->MediaUrl}\">" . "<img src=\"{$value->Thumbnail->MediaUrl}\"></a><br />"; break; 
 } } // Substitute the results placeholder. Ready to go.
 $contents = str_replace('{RESULTS}', $resultStr, $contents);




}

echo $contents;

?>