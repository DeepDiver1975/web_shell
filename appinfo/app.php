<?php

\OC::$server->getNavigationManager()->add(function () {
	$l = \OC::$server->getL10N('web_shell');
	$g = \OC::$server->getURLGenerator();
	return [
		'id' => 'shell#index',
		'order' => 100,
		'href' => $g->linkToRoute('web_shell.shell.index'),
		'icon' => $g->imagePath('web_shell', 'app.svg'),
		'name' => $l->t('Web Shell'),
	];
});
