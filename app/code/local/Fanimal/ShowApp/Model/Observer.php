<?php
class Fanimal_ShowApp_Model_Observer
{		
  public function cron()
  {
    $dirPath = Mage::getBaseDir('var') . DS . 'adoptapet';
    
    $locations = array('http://api.adoptapet.com/search/pets_at_shelter?key=95052e1b892a28c5f89f696edf39b4ec&shelter_id=87677&output=json', 'http://api.adoptapet.com/search/pets_at_shelter?key=ffa2f34adb6076ce7aba8162fb899d64&shelter_id=87678&output=json');
    $location_data = array();
    $urls = array();
    $pets = array();

    if (!is_dir($dirPath)){
      mkdir($dirPath, 0777, true);
    }

    foreach ($locations as $location){
      $ch = curl_init();
     
      // set options
      curl_setopt($ch, CURLOPT_URL, $location);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HEADER, false);
     
      // execute
      $output = curl_exec($ch);
      $location_data[] = json_decode($output, true);
     
      // if ($output === FALSE) {
      //   return "cURL Error: " . curl_error($ch);
      // } else {
      //   return $output;
      // }
     
      // close instance
      curl_close($ch);
    }


    foreach ($location_data as $location){
      foreach ($location['pets'] as $pet){
        $url = $pet['details_url'];
        $url = str_replace('limited_', '', $url);
        $urls[] = $url;
      }
    }


    foreach ($urls as $url){
      $ch = curl_init();
     
      // set options
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HEADER, false);
     
      // execute
      $output = curl_exec($ch);
      $output = json_decode($output, true);
     
      // if ($output === FALSE) {
      //   return "cURL Error: " . curl_error($ch);
      // } else {
      //   return $output;
      // }
     
      // close instance
      curl_close($ch);
    
      $output['pet']['location'] = array($output['pet']['addr_city']);
      $output['pet']['url'] = $url;


      //[images] => Array
      //          (
      //          )

      $output['pet']['preview_image'] = array(
        $output['pet']['images'][0]['thumbnail_url'], 
        $output['pet']['images'][0]['thumbnail_width'], 
        $output['pet']['images'][0]['thumbnail_height']
      );

      $pets[] = $output['pet'];
    }

    $pets = json_encode($pets);

    file_put_contents(
      $dirPath. DS .'data.txt', 
      print_r($pets, true)
    );

    // for production, rename this path accordingly
    copy('/var/www/magento_dev/var/adoptapet/data.txt', '/var/www/magento_dev/showDetail/data/data.txt');
  }
}
