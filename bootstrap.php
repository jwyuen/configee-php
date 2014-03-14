<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define("SRC_PATH", './lib/');

require_once('./vendor/autoload.php');

function __class_autoload($class) {

  $libSubdirectories = array('');

  if (!class_exists($class, false)) {
    foreach ($libSubdirectories as $dir) {
      if ($dir === '') {
        $fileToLoad = LIB_PATH . '/' . $class;
      }
      else {
        $fileToLoad = LIB_PATH . '/' . $dir . '/' . $class;
      }


      if (is_readable($fileToLoad . '.php')) {
        require_once($fileToLoad . '.php');
      }
    }
  }
}

spl_autoload_register('__class_autoload');
