<?php

require_once __DIR__ . '/../vendor/autoload.php';

use pjpawel\LightApi\Env;
use pjpawel\LightApi\Kernel;
use pjpawel\LightApi\Component\Runner\HttpRunner;

$runner = new HttpRunner(new Kernel(Env::getConfigFromEnv(__DIR__ . '/../config/')));
$runner->run();
