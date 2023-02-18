<?php

require_once __DIR__ . '/../vendor/autoload.php';

use pjpawel\LightApi\Env;
use pjpawel\LightApi\Kernel;
use pjpawel\LightApi\Component\Runner\CliRunner;

$runner = new CliRunner(new Kernel(Env::getConfigFromEnv(__DIR__ . '/../config/')), $_SERVER['argv'][1]);
$runner->run();
return $runner->result;