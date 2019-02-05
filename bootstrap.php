<?php

// Load our autoloader

require __DIR__.'/vendor/autoload.php';
$loader = new Twig_Loader_Filesystem(__DIR__.'/views');
$twig = new Twig_Environment($loader, ['views' => '/views']);
?>
