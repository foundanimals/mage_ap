<?php
class Fanimal_ShowApp_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Adoptable Pets"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home"),
                "title" => $this->__("Home"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("Adoptable Pets", array(
                "label" => $this->__("Adoptable Pets"),
                "title" => $this->__("Adoptable Pets")
		   ));

      $this->renderLayout(); 
	  
    }
}