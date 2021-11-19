<?php

    final class ControllerRoot {

        public function defaultAction() {
            $modelRoot = new Root();

            View::display('root/view', array('data' => $modelRoot->getData()));    
        }
    }
