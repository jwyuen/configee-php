<?php

namespace Configee;


class Parser {

  
  public function __construct() {
    if (!defined('CONFIG_PATH')) {
      throw new Exception('Configuration path is not defined!  Please define ' .
        'the global constant "CONFIG_PATH"!');
    }
  }

  /* Returns an array
   */
  public function getConfiguration() {

  }

  

}
