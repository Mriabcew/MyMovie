<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/MovieController.php';
require_once 'src/controllers/UserController.php';

class Routing {
    public static $routes;

    public static function get($url, $controller) {
      self::$routes[$url] = $controller;
    }

    public static function post($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function run($url) {
        $urlParts = explode("/", $url);
        $action = $urlParts[0];
        if($action == "") {
            $action = "login";
        }

        if (!isset($_COOKIE["user"]) && $action != "register") {
            $action = "login";
        }

        if(!array_key_exists($action, self::$routes)) {
            die('Wrong url!');
        }

        $controller = self::$routes[$action];
        $object = new $controller;

        $id = $urlParts[1] ?? "";

        $object->$action($id);
    }

}