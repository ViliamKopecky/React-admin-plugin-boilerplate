<?php declare(strict_types=1);

return [
	'getInitialData' => function () {
		return [
			'languages' => ['cs', 'en']
		];
	},
	'ajaxResponse' => function (array $post) {
		return $post;
	}
];
