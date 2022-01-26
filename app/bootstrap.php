<?php 
    require_once 'config/config.php';
    require_once 'helpers/url_helper.php';

    spl_autoload_register(function($className) {
        if(strpos($className, '\\libraries\\')) {
            $str = str_replace('\\', '/', 'libraries/' . $className . '.php');
            $str = str_replace('libraries/App/', '', $str, $count);
            require_once $str;
        } 
        else {
            $prefix = 'App\\';

            $base_dir = __DIR__ . '/app/';

            $len = strlen($prefix);
            if (strncmp($prefix, $className, $len) !== 0) {
                return;
            }

            $relative_class = substr($className, $len);

            $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

            if (file_exists($file)) {
                require $file;
            }
        }
    });
?>