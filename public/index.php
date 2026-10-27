<?php
declare(strict_types=1);

require_once __DIR__ . '/../autoloader.php';
require_once __DIR__ . '/../config/config.php';

use controller\FrontController;

FrontController::main();
