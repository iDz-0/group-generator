<?php

    require 'Constants.php';

    final class Autoloader {

        public static function loadClassCore($className) {
            $file = Constants::getDirCore() . $className . '.php';
            return static::loader($file);
        }

        public static function loadClassModel($className) {
            $file = Constants::getDirModel() . $className . '.php';
            return static::loader($file);
        }

        public static function loadClassView($className) {
            $file = Constants::getDirView() . $className . '.php';
            return static::loader($file);
        }

        public static function loadClassController($className) {
            $file = Constants::getDirController() . $className . '.php';
            return static::loader($file);
        }

        private static function loader($fileToLoad) {
            if(is_readable($fileToLoad)) {
                require $fileToLoad;
            }
        }

    }

    spl_autoload_register('Autoloader::loadClassCore');
    spl_autoload_register('Autoloader::loadClassModel');
    spl_autoload_register('Autoloader::loadClassView');
    spl_autoload_register('Autoloader::loadClassController');