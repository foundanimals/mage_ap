<?php
class Fanimal_ShowDetail_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Adoptable Pet Detail"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home"),
                "title" => $this->__("Home"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("Adoptable Pet Detail", array(
                "label" => $this->__("Adoptable Pet Detail"),
                "title" => $this->__("Adoptable Pet Detail")
		   ));

      $this->renderLayout(); 
	  
    }
}