<?php
require_once '../app/config/config.php';

// Load Helpers
require_once '../app/helpers/url_helper.php';
require_once '../app/helpers/session_helper.php';

// Autoload Core Libraries
spl_autoload_register(function($className) {
    require_once '../core/' . $className . '.php';
});

// Initialize Router
$init = new Router(); 