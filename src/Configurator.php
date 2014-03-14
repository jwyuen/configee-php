<?php

namespace Configee;


class Configurator {

  private $config;
  private $parser;
  
  public function __construct($parser = null) {
    $this->parser = $parser;

    if ($this->parser === null) {
      $this->parser = new \Configee\Parser();
    }

  }

  public function getValue($key) {

  }
  

}
