<?php

namespace Configee;

use org\bovigo\vfs\vfsStream;

class Configurator_TestCase extends \PHPUnit_Framework_TestCase {

  public function 
    test_ConstructorCallsParserGetConfiguration() {
    
    $parserMock = $this->getMockBuilder('\Configee\Parser')
      ->disableOriginalConstructor()
      ->getMock();

    $parserMock->expects($this->once())
      ->method('getConfiguration');

    $configee = new Configee('', $parserMock);
  }

  public function test_getConfig_ReturnsConfigFromParserGetConfiguration() {
    $parserMock = $this->getMockBuilder('\Configee\Parser')
      ->disableOriginalConstructor()
      ->getMock();

    $randomString = 'aq2348rzxkcvqrasdkfhasdfa84asdf';
    $parserMock->expects($this->once())
      ->method('getConfiguration')
      ->will($this->returnValue($randomString));

    $configee = new Configee('', $parserMock);

    $config = $configee->getConfig();

    $this->assertEquals($config, $randomString);
  }

  
  

}
