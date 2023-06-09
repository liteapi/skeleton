<?php

require_once __DIR__ . '/../vendor/autoload.php';

use LiteApi\Component\Config\ConfigLoader;
use LiteApi\Component\Runner\HttpRunner;
use LiteApi\Kernel;

$configLoader = new ConfigLoader(__DIR__ . '/../');

$runner = new HttpRunner(new Kernel($configLoader->getConfig()));
$runner->run();
