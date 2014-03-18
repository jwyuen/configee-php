<?php

namespace Configee;

use org\bovigo\vfs\vfsStream;

class Parser_TestCase extends \PHPUnit_Framework_TestCase {


  public function test_getConfigurationGetsCorrectConfig() {

    $sampleConfigDirectory = 
      include(__DIR__ . '/fixtures/exampleConfigDirectory.php');

    $expectedResult = array(
      'general' => array(),
      'production' => array(
        'db' => array(
          'host' => 'localhost',
          'user' => 'someusername',
          'password' => 'somepassword'
        ),
        'anotherfolder' => array('somefile' => array()),
      ),
      'development' => array(
        'db' => array(
          'host' => 'localhost',
          'user' => 'someusername',
          'password' => 'somepassword'
        ),
      )
    );


    $configPath = 'root';
    $configRoot = vfsStream::setup($configPath);
    $root = vfsStream::create($sampleConfigDirectory, $configRoot);
    $url = vfsStream::url($configPath);
    
    $parser = new Parser($url);
    $result = $parser->getConfiguration();
    $this->assertEquals($result, $expectedResult);
  }
  

}
