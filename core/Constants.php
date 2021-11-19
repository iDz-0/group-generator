<?php

    final class Constants {

        const DIR_CORE = '/core/';
        const DIR_MODEL = '/models/';
        const DIR_VIEWS = '/views/';
        const DIR_CONTROLLER = '/controllers/';

        public static function getUrlRoot() {
            return "http://localhost:8888/MyMVC-Project";
        }

        public static function getDirRoot() {
            return realpath(__DIR__ . '/../');
        }

        public static function getDirCore() {
            return self::getDirRoot() . self::DIR_CORE;
        }

        public static function getDirModel() {
            return self::getDirRoot() . self::DIR_MODEL;
        }

        public static function getDirView() {
            return self::getDirRoot() . self::DIR_VIEWS;
        }

        public static function getDirController() {
            return self::getDirRoot() . self::DIR_CONTROLLER;
        }

    }