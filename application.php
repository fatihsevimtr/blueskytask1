<?php

require __DIR__.'/vendor/autoload.php';
include 'config/selectusers.php';
include 'config/createuser.php';
include 'config/selectbyid.php';
use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new SelectCommand());
$application->add(new CreateCommand());
$application->add(new SelectByIdCommand());

$application->run();
