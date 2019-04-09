<?php

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;

$debug = $configurator->isDebugMode();

if(getenv('NETTE_DEBUG') === '1') {
	$debug = true;
}

$configurator->setDebugMode($debug);

//$configurator->setDebugMode('23.75.345.200'); // enable for your remote IP
$configurator->enableTracy(__DIR__ . '/../log');

$configurator->setTimeZone('Europe/Prague');
$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon');

$container = $configurator->createContainer();

return $container;
