# PHP ini checker

This class makes it easy for you to quickly check if there are any PHP configuration settings that are not set to the recommended production value.

It checks all the settings which are different in either the production
 or development versions of the INIs with respect to PHP's default behavior. 
 
## Installation and usage

You can use composer to install the package by running `composer install andybeak/php-ini-checker`.

The package includes a class that exposes a single static function which returns
a list of settings that are not configured for production.

For example:

    <?php
    
    define('DS', DIRECTORY_SEPARATOR);
    require(__DIR__ . DS . 'vendor' . DS . 'autoload.php');
    print_r(\AndyBeak\IniChecker\IniChecker::getIncorrectIniSettings());

Will output something like this:

    Array
    (
        [display_errors] => On
        [display_startup_errors] => On
        [error_reporting] => 22527
        [log_errors] => 1
        [max_input_time] => -1
        [output_buffering] => 0
        [register_argc_argv] => 1
        [short_open_tag] => On
    )
