<?php

class Parser_TestCase extends PHPUnit_Framework_TestCase {

  public function 
    test_ConstructorThrowsExceptionWithNoDefinedCONFIG_PATHConstant() {

    try {
      $parser = new \Configee\Parser();
      $this->fail('An expected exception was not caught');
    }
    catch (Exception $e) {
    }

  }
  

}
