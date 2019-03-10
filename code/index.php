<?php 

require 'vendor/autoload.php';
f_autoload();
session_start();


require 'routes/web.php';

Router::handleRest();