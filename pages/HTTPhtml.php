<?php
# Генератор статичних HTML-сторінок помилок для проксі та веб-сервера
# Запуск: через браузер або CLI (http_html)

$codes = array(
	# помилки парсингу/лімітів до запуску PHP та .htaccess
	400 => 'Bad Request',
	408 => 'Request Timeout',
	413 => 'Payload Too Large',
	414 => 'URI Too Long',
	431 => 'Request Header Fields Too Large',
	# рівень Nginx / SSL-термінації перед бекендом
	494 => 'Request Header Too Large',
	495 => 'SSL Certificate Error',
	496 => 'SSL Certificate Required',
	497 => 'HTTP Request Sent to HTTPS Port',
	# падіння PHP/Apache або шлюзу (Nginx / балансувальник)
	500 => 'Internal Server Error',
	502 => 'Bad Gateway',
	503 => 'Service Unavailable',
	504 => 'Gateway Timeout',
	# помилки зовнішнього проксі (Cloudflare), коли origin лежить
	520 => 'Web Server Returned an Unknown Error',
	521 => 'Web Server Is Down',
	522 => 'Connection Timed Out',
	523 => 'Origin Is Unreachable',
	524 => 'A Timeout Occurred',
	525 => 'SSL Handshake Failed',
	526 => 'Invalid SSL Certificate',
);

$out_dir = __DIR__;
$created = 0;

$box = 'background:#FF5757;border:2px solid #B60505;color:#FFFFFF;';
$body_css = 'background:#FFFFFF;color:#111111;'
	. 'font-family:Tahoma,Arial,sans-serif;'
	. 'margin:2% auto;max-width:320px;text-align:center;';

foreach ($codes as $code => $text) {
	$title = "$code $text";
	$html = '<?xml version="1.0" encoding="utf-8"?>' . "\n"
		. '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"'
		. ' "http://w3.org">' . "\n"
		. '<html xmlns="http://w3.org" lang="en">' . "\n"
		. '<head>' . "\n"
		. "\t" . '<meta http-equiv="Content-Type"'
		. ' content="text/html; charset=utf-8" />' . "\n"
		. "\t" . '<title>' . $title . '</title>' . "\n"
		. '</head>' . "\n"
		. '<body style="' . $body_css . '">' . "\n"
		. "\t" . '<div style="' . $box . 'margin:8px;padding:10px 6px;">' . "\n"
		. "\t\t" . '<h1 style="font-size:18px;margin:0;padding:0;">'
		. $title . '</h1>' . "\n"
		. "\t" . '</div>' . "\n"
		. "\t" . '<div>' . "\n"
		. "\t\t" . '<a href="../" title="level up"'
		. ' style="color:#38599E;text-decoration:none;">..</a>' . "\n"
		. "\t" . '</div>' . "\n"
		. '</body>' . "\n"
		. '</html>' . "\n";

	$file = $out_dir . DIRECTORY_SEPARATOR . 'HTTP' . $code . '.html';
	if (file_put_contents($file, $html) !== false) {
		$created++;
	}
}

header('Content-Type: text/plain; charset=utf-8', true);
echo "Generated: $created files in $out_dir\n";
