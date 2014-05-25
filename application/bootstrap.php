<?php
set_include_path(
    realpath(__DIR__).'/library'.
    PATH_SEPARATOR.realpath(__DIR__). PATH_SEPARATOR . get_include_path()
);

require __DIR__.'/../vendor/autoload.php';
