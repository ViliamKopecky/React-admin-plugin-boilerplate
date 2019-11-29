<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Mock of React admin plugin</title>
	<link rel="stylesheet" href="/dist/main.css">
</head>
<body>
	<?php
 $config = new stdClass();
 $config->name = 'Mocked plugin';
 $config->id = 'mocked-admin-plugin';
 $config->action = 'mocked-admin-plugin-ajax';
 $json = json_encode($config);
 ?>
	<div id="plugin-app-root" data-config="<?php echo htmlspecialchars($json); ?>">loading…</div>
 <script>window.ajaxurl = '/wp-admin/admin-ajax.php';</script>
 <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script src="/dist/main.js"></script>
</body>
</html>
