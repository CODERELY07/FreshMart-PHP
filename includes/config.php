<?php

    $env = parse_ini_file(__DIR__ . '/../.env');

    define('SMTP_HOST', $env['SMTP_HOST']);
    define('SMTP_PORT', $env['SMTP_PORT']);
    define('SMTP_USERNAME', $env['SMTP_USERNAME']);
    define('SMTP_PASSWORD', $env['SMTP_PASSWORD']);