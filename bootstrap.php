<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('CONFIGEE_SOURCE_PATH', __DIR__ . '/src/');

require_once('./vendor/autoload.php');


spl_autoload_register(
  function($class) {

    $srcSubdirectories = array('');

    $parts = explode('\\', $class);
    $class = end($parts);

    if (!class_exists($class, false)) {
      foreach ($srcSubdirectories as $dir) {
        if ($dir === '') {
          $fileToLoad = CONFIGEE_SOURCE_PATH . $class;
        }
        else {
          $fileToLoad = CONFIGEE_SOURCE_PATH . $dir . '/' . $class;
        }


        if (is_readable($fileToLoad . '.php')) {
          require_once($fileToLoad . '.php');
        }
      }
    }
  }
);

