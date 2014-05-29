<?php
class Fanimal_ShowDetail_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Show Detail Title"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("show detail title", array(
                "label" => $this->__("Show Detail Title"),
                "title" => $this->__("Show Detail Title")
		   ));

      $this->renderLayout(); 
	  
    }
}