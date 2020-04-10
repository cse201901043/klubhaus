<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'ADmad/SocialAuth' => $baseDir . '/vendor/admad/cakephp-social-auth/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'RestApi' => $baseDir . '/vendor/multidots/cakephp-rest-api/',
        'SocialShare' => $baseDir . '/vendor/drmonkeyninja/cakephp-social-share/',
        'WyriHaximus/TwigView' => $baseDir . '/vendor/wyrihaximus/twig-view/'
    ]
];