<?php
class Fanimal_ShowApp_Model_Observer
{		
  public function data()
  {

    $dirPath = Mage::getBaseDir('var') . DS . 'export';
    $data = 'Ha Ha';

    if (!is_dir($dirPath)){
      mkdir($dirPath, 0777, true);
    }

    file_put_contents(
      $dirPath. DS .'data.txt', 
      print_r($data, true)
    );
  }
}
