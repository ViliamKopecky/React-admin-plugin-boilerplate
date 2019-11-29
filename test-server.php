<?php

$target = $_SERVER['SCRIPT_NAME'];

$requestPath = dirname(__FILE__) . $target;

if ($target === '/') {
	header('Content-type: text/html; charset=utf-8');
	require __DIR__ . '/mock/index.php';
	exit();
}

if (strpos($target, '/admin-ajax.php') !== false) {
	require __DIR__ . '/mock/admin-ajax.php';
	exit();
}

if (!is_file($requestPath)) {
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	printf('"%s" does not exist', $_SERVER['REQUEST_URI']);
	return true;
}

if (!preg_match('/\.php$/', $requestPath)) {
	header('Content-Type: ' . mime_content_type($requestPath));
	$fh = fopen($requestPath, 'r');
	fpassthru($fh);
	fclose($fh);
	return true;
}
