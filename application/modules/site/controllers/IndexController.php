<?php

class Site_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {
        
        $formSiteBusca = new Form_Site_Busca();
        $this->view->formSiteBusca = $formSiteBusca;
        
    }

}

