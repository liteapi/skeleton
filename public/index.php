<?php

require_once __DIR__ . '/../vendor/autoload.php';

use pjpawel\LightApi\Kernel;
use pjpawel\LightApi\Component\Runner\HttpRunner;

$runner = new HttpRunner(new Kernel(__DIR__ . '/../config/'));
$runner->run();
