<?php namespace dcarrith\CIFirePHP;

use Monolog\Logger;
use Monolog\Handler\FirePHPHandler;

class CIFirePHP {

        private $_dummy;
        private $_logger;

        function __construct($name, $environment) {

                if($environment == "production"){
                        $_dummy = true;
                } else {
                        $_dummy = false;
                }

                if (!$_dummy) {

                        $_logger = new Logger($name);
                        $_logger->pushHandler(new FirePHPHandler());
                        $_logger->addInfo("Logger has been initialized.");
                }
        }

        function log($variable, $label) {

                if (!$_dummy) {
                        $_logger->addInfo($label, $variable);
                }
        }
}

?>
