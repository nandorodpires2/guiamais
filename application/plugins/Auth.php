<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author Fernando
 */
class Plugin_Auth extends Zend_Controller_Plugin_Abstract {
    
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        
        if ($request->getModuleName() === "admin" && !Zend_Auth::getInstance()->hasIdentity()) {            
            $request->setModuleName("admin")->setControllerName("auth")->setActionName("login");
            $request->setDispatched();            
        }
        
    }
    
}
