<?php

namespace OCA\Web_Shell;

use OC\Console\Application;
use OCP\AppFramework\Http;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IRequest;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\NullOutput;

class ShellController extends Controller {

	/**
	 * @param string $appName
	 * @param IRequest $request
	 */
	public function __construct($appName, IRequest $request){
		parent::__construct($appName, $request);
	}

	/**
	 * @NoCSRFRequired
	 *
	 * @return TemplateResponse
	 */
	public function index() {

		return new TemplateResponse($this->appName, 'index');
	}

	/**
	 * @NoCSRFRequired
	 * @param string $command
	 */
	public function execute($command) {
		// set to run indefinitely if needed
		set_time_limit(0);

		$app = new Application(\OC::$server->getConfig());
		$app->setAutoExit(false);
		$app->loadCommands(new NullOutput());
		$output = new BufferedOutput();
		$exitCode = $app->run(new StringInput($command), $output);

		return [
			'code' => $exitCode,
			'output' => $output->fetch()
		];
	}
}
