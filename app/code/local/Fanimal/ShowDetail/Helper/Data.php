<?php
class Fanimal_ShowDetail_Helper_Data extends Mage_Core_Helper_Abstract
{
  public function currentURL()
  {
    return $_SERVER['QUERY_STRING'];
  }

  public function showDetail($url)
  {
    if (empty($url)) {
        return 'Please provide a URL';
    } else {
      // init
      $ch = curl_init();
     
      // set options
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HEADER, false);
     
      // execute
      $output = curl_exec($ch);
     
      if ($output === FALSE) {
        return "cURL Error: " . curl_error($ch);
      } else {
        return $output;
      }
     
      // close instance
      curl_close($ch);
    }

    $data = $output;
    return $data;
  }
}
	 