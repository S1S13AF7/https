<?php
# HTTP status codes generator (legacy & monochrome friendly)

$HTTP_status_code = isset($_GET['code']) ? (int)$_GET['code'] : 200;

$HTTP_status_code = (int) @$_GET['code'];
if(!isset($_GET['code'])) {
$HTTP_status_code = '200'; }
$status_code[0]   = 'Unknown';
$status_code[100] = 'Continue';
$status_code[101] = 'Switching Protocols';
$status_code[102] = 'Processing';
$status_code[103] = 'Early Hints';
$status_code[200] = 'OK';
$status_code[201] = 'Created';
$status_code[202] = 'Accepted';
$status_code[203] = 'Non-Authoritative Information';
$status_code[204] = 'No Content';
$status_code[205] = 'Reset Content';
$status_code[206] = 'Partial Content';
$status_code[207] = 'Multi-Status';
$status_code[208] = 'Already Reported';
$status_code[226] = 'IM Used';
$status_code[300] = 'Multiple Choices';
$status_code[301] = 'Moved Permanently';
$status_code[302] = 'Found';
$status_code[303] = 'See Other';
$status_code[304] = 'Not Modified';
$status_code[305] = 'Use Proxy';
$status_code[306] = 'Switch Proxy';
$status_code[307] = 'Temporary Redirect';
$status_code[308] = 'Permanent Redirect';
$status_code[400] = 'Bad Request';
$status_code[401] = 'Unauthorized';
$status_code[402] = 'Payment Required';
$status_code[403] = 'Forbidden';
$status_code[404] = 'Not Found';
$status_code[405] = 'Method Not Allowed';
$status_code[406] = 'Not Acceptable';
$status_code[407] = 'Proxy Authentication Required';
$status_code[408] = 'Request Timeout';
$status_code[409] = 'Conflict';
$status_code[410] = 'Gone';
$status_code[411] = 'Length Required';
$status_code[412] = 'Precondition Failed';
$status_code[413] = 'Payload Too Large';
$status_code[414] = 'URI Too Long';
$status_code[415] = 'Unsupported Media Type';
$status_code[416] = 'Range Not Satisfiable';
$status_code[417] = 'Expectation Failed';
$status_code[418] = "I'm a teapot";
$status_code[421] = 'Misdirected Request';
$status_code[422] = 'Unprocessable Content';
$status_code[423] = 'Locked';
$status_code[424] = 'Failed Dependency';
$status_code[425] = 'Too Early';
$status_code[426] = 'Upgrade Required';
$status_code[428] = 'Precondition Required';
$status_code[429] = 'Too Many Requests';
$status_code[431] = 'Request Header Fields Too Large';
$status_code[451] = 'Unavailable For Legal Reasons';
$status_code[500] = 'Internal Server Error';
$status_code[501] = 'Not Implemented';
$status_code[502] = 'Bad Gateway';
$status_code[503] = 'Service Unavailable';
$status_code[504] = 'Gateway Timeout';
$status_code[505] = 'HTTP Version Not Supported';
$status_code[506] = 'Variant Also Negotiates';
$status_code[507] = 'Insufficient Storage';
$status_code[508] = 'Loop Detected';
$status_code[510] = 'Not Extended';
$status_code[511] = 'Network Authentication Required';
/*	https://en.wikipedia.org/wiki/List_of_HTTP_status_codes	*/
/*	https://developer.mozilla.org/ru/docs/Web/HTTP/Status	*/
$correct = (isset($_GET['code']) && isset($status_code[$HTTP_status_code]))?true:false;
$return = false;

$is_known = isset($status_code[$HTTP_status_code]);
$status_text = $is_known ? $status_code[$HTTP_status_code] : 'Unknown';
$proto = isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1';

header("$proto $HTTP_status_code $status_text");
header('Cache-Control: no-store, no-cache, must-revalidate', true);
header("Content-type: application/xhtml+xml; charset=utf-8", true);
//header('Content-Type: text/html; charset=utf-8', true);
header('X-UA-Compatible: IE=edge', true);

if ($HTTP_status_code >= 200 && $HTTP_status_code < 300) {
	$box_style = 'background:#00AC00;border:2px solid #016301;color:#FFFFFF;';
} elseif ($HTTP_status_code >= 400 && $HTTP_status_code < 600) {
	$box_style = 'background:#FF5757;border:2px solid #B60505;color:#FFFFFF;';
} else {
	$box_style = 'background:#3CA1FF;border:2px solid #0F78DA;color:#FFFFFF;';
}

echo '<?xml version="1.0" encoding="utf-8"?>';
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en"><head>
 <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1" />
 <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<title><?php echo "$HTTP_status_code $status_text"; ?></title>
</head>
<body style="background:#FFFFFF;color:#111111;font-family:Tahoma,Arial,sans-serif;margin:2% auto;max-width:320px;text-align:center;">
	<div style="<?php echo $box_style; ?>margin:8px;padding:10px 6px;">
		<h1 style="font-size:18px;margin:0;padding:0;"><?php 
		echo "$HTTP_status_code $status_text"; ?></h1>
	</div>
	<div>
		<a href="../" title="level up" style="color:#38599E;text-decoration:none;">..</a>
	</div>
</body>
</html>
