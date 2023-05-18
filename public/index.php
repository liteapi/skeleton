<?php

use LiteApi\Component\Runner\HttpRunner;
use LiteApi\Kernel;

require_once __DIR__ . '/../vendor/autoload.php';


$runner = new HttpRunner(new Kernel(__DIR__ . '/../config/'));
$runner->run();
