<?php

    final class View {

        public static function openBuffer() {
            ob_start();
        }

        public static function getBufferContent() {
            return ob_get_clean();
        }

        public static function display($viewName, $params = array()) {
            $viewFile = Constants::getDirView() . $viewName . '.php';

            ob_start();
            include $viewFile;
            ob_end_flush();
        }

    }