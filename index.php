<?php

    require 'core/Autoloader.php';

    if(isset($_GET['url'])) {
        $controllerName = isset(explode('/', $_GET['url'])[0]) ? explode('/', $_GET['url'])[0] : null;
        $actionName = isset(explode('/', $_GET['url'])[1]) ? explode('/', $_GET['url'])[1] : null;
        $otherParams = isset(explode('/', $_GET['url'])[2]) ? explode('/', $_GET['url'])[2] : null;
    }
    else {
        $controllerName = null;
        $actionName = null;
        $otherParams = null;
    }

    View::openBuffer();
    $controller = new Controller($controllerName, $actionName, $otherParams);
    $controller->execute();

    $bufferContent = View::getBufferContent();

    View::display('template', array('body' => $bufferContent));