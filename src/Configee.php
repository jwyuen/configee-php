<?php

namespace Configee;


class Configee {

  private $config;
  private $parser;
  
  public function __construct($configPath, $parser = null) {
    $this->parser = $parser;

    if ($this->parser === null) {
      $this->parser = new Parser($configPath);
    }

    $this->config = $this->parser->getConfiguration();
  }

  public function getConfig() {
    return $this->config;
  }

}
