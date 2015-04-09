<?php

namespace OCA\Web_Shell\Appinfo;

use OCA\Web_Shell\ShellController;
use OCP\AppFramework\App;
use \OCP\IContainer;

class Application extends App {
	public function __construct(array $urlParams=array()) {
		parent::__construct('web_shell', $urlParams);
		$container = $this->getContainer();
		$server = $container->getServer();

		/**
		 * Controllers
		 */
		$container->registerService('ShellController', function (IContainer $c) use ($server) {
			return new ShellController(
				$c->query('AppName'),
				$c->query('Request')
			);
		});

		/**
		 * Core
		 */
		$container->registerService('L10N', function(IContainer $c) {
			return $c->query('ServerContainer')->getL10N($c->query('AppName'));
		});
	}
}
