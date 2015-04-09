<?php
use OCA\Web_Shell\Appinfo\Application;

$application = new Application();
$application->registerRoutes(
	$this,
	[
		'routes' => [
			[
				'name' => 'shell#index',
				'url' => '/',
				'verb' => 'GET'
			],
			[
				'name' => 'shell#execute',
				'url' => '/execute',
				'verb' => 'POST'
			]
		]
	]
);
