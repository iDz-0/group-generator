<?php

    final class Controller {

        private $urlParsed;

        public function __construct($controller, $action, $params) {
            $this->urlParsed['controller'] = !empty($controller) ? 'Controller'.$controller : 'ControllerGroup';
            $this->urlParsed['action'] = !empty($action) ? $action.'Action' : 'defaultAction';
            $this->urlParsed['params'] = $params;
        }

        public function execute() {
            call_user_func_array(array( new $this->urlParsed['controller'], 
                                    $this->urlParsed['action']), array($this->urlParsed['params']));
        }

    }