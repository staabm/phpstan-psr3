<?php

namespace MonologExample;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

function basicExample() {
    // create a log channel
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler('path/to/your.log', Level::Warning));

    $s = 'foo';

    $log->warning('Foo'.$s);
    $log->error('Bar'.$s);
    $log->error('Bar');

    $log->ERROR('Bar'.$s);
}

