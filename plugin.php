<?php declare(strict_types=1);

/*
Plugin Name: Plugin boilerplate
Author: Viliam Kopecky
Version: 1.0.0
Author URI: https://github.com/viliamkopecky/
*/

$main = function() {
	$meta = get_plugin_data( __FILE__ );

	$PLUGIN_NAME = $meta['Name'];
	$PLUGIN_ID = sanitize_title(basename(__DIR__));
	$PLUGIN_CAPABILITY = 'manage_options';
	$PLUGIN_AJAX_ID = $PLUGIN_ID . '_ajax';

	$Plugin = require_once __DIR__ . '/lib/Plugin.php';

	$Plugin['ID'] = $PLUGIN_ID;
	$Plugin['NAME'] = $PLUGIN_NAME;
	$Plugin['CAPABILITY'] = $PLUGIN_CAPABILITY;
	$Plugin['AJAX_ID'] = $PLUGIN_AJAX_ID;

	add_action('wp_ajax_'.$Plugin['AJAX_ID'], function () use ($Plugin) {
		header('Content-Type: application/json; charset=utf-8');
		$payload = $Plugin['ajaxResponse']($_POST);
		echo json_encode($payload);
		wp_die();
	});

	add_action('admin_menu', function () use ($Plugin) {
		$menu = add_menu_page($Plugin['NAME'], $Plugin['NAME'], $Plugin['CAPABILITY'], $Plugin['ID'], function () use ($Plugin) {
			$config = [
				'action' => $Plugin['AJAX_ID'],
				'id' => $Plugin['ID'],
				'name' => $Plugin['NAME'],
				'data' => $Plugin['getInitialData']()
			];
			echo '<div id="plugin-app-root" data-pluginapp="'.esc_attr($Plugin['ID']).'" class="PluginApp-root" data-config="' . esc_attr(json_encode($config)) . '"></div>';
		});

		add_action('admin_print_styles-' . $menu, function () {
			wp_enqueue_style(
				'stylesheet_name',
				plugins_url('dist/main.css', __FILE__),
				[],
				filemtime(__DIR__ . '/dist/main.css')
			);
		});

		add_action('admin_print_scripts-' . $menu, function () {
			wp_enqueue_script(
				'javascript_file',
				plugins_url('dist/main.js', __FILE__),
				['jquery'],
				filemtime(__DIR__ . '/dist/main.js')
			);
		});
	});

};

$main();
