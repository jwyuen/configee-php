<?php

namespace Configee;


class Parser {

  private $configPath;
  public function __construct($configPath) {
    $this->configPath = $configPath;
  }

  /* Returns an array
   */
  public function getConfiguration() {
    $config = $this->parseConfigDirectoryAsArray();
    return $config;
  }

  private function parseConfigDirectoryAsArray() {
    $location = $this->configPath;
    

    $config = array();

    $elementsToCheck = array_diff(scandir($location), array('..', '.'));

    while(count($elementsToCheck) !== 0) {

      $newElementsToCheck = array();
      foreach($elementsToCheck as $key => $element) {

        $path = $location . '/' . $element;
        $subElements = null;

        if (!is_dir($path)) {
          $fileParts = pathinfo($path);
          if (isset($fileParts['extension']) 
            && $fileParts['extension'] === 'php') {
              
              $subConfig = 
              $this->convertPHPFilePathToAssocArray($path, '/', $location);
              $config = array_merge_recursive($config, $subConfig);
          }
         }
        else {
          $subElements = array_diff(scandir($path), array('..', '.'));
          foreach ($subElements as $el) {
              $newElementsToCheck[] = $element . '/' . $el; 
          }
        }
      }      
      $elementsToCheck = $newElementsToCheck;
    }

    return $config;
  } 

  private function convertPHPFilePathToAssocArray($path, $delimeter = '/', 
    $excludePathPrefix = '') {

    $simplifiedPath = str_replace($excludePathPrefix, '', $path);
    $parts = explode($delimeter, $simplifiedPath);
    if ($parts[0] === '') {
      unset($parts[0]);
      $parts = array_values($parts);
    }
    
    $result = array();
    $currentArray = array();
    for ($i = 0; $i < count($parts); $i++) {

      if ($i === 0 && !strpos($parts[$i], '.php')) {
        $result[$parts[$i]] = array();
        $currentArray = &$result[$parts[$i]];
      }
      else if ($i === 0 && strpos($parts[$i], '.php')) {
        $key = $this->stripExtensionFromPHPFile($parts[$i]);
        $result[$key] = include($path);
        break;
      }
      else if (strpos($parts[$i], '.php')) {
        $key = $this->stripExtensionFromPHPFile($parts[$i]);
        $currentArray[$key] = include($path);
      }
      else if (!isset($currentArray[$parts[$i]])) {
        $currentArray[$parts[$i]] = array();
        $currentArray = &$currentArray[$parts[$i]];
      }
      
    } 

    return $result;
  }

  private function stripExtensionFromPHPFile($file) {
    $name = explode('.', $file);
    unset($name[count($name) - 1]);
    return implode('', $name);
  }

  

}
