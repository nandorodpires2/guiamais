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
     
        /**
         * Buscas mais populares
         */
        $modelServico = new Model_DbTable_Servico();
        $servicos = $modelServico->getServicos();
        $this->view->servicos = $servicos;
        
    }

}

