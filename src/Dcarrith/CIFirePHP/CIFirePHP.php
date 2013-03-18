<?php namespace Dcarrith\CIFirePHP;

use Monolog\Logger;
use Monolog\Handler\FirePHPHandler;

class CIFirePHP {

        private $_dummy;
        private $_logger;

        function __construct($name, $environment) {

		$dummy = false;

                if($environment == "production"){
                        $dummy = true;
                }

		$this->_dummy = $dummy;

                if (!$dummy) {

                        $this->_logger = new Logger($name);
                        $this->_logger->pushHandler(new FirePHPHandler());
                        $this->_logger->addInfo("Logger has been initialized.");
                }
        }

        function log($variable, $label) {

                if (!$this->_dummy) {
			if (!is_array($label)) {
				$label = array($label);
			}
                        $this->_logger->addInfo($variable, $label);
                }
        }
}

?>
