<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Busca
 *
 * @author Fernando Rodrigues
 */
class Site_BuscaController extends Zend_Controller_Action {
    
    public function init() {
        $this->view->headScript()->appendFile($this->view->baseUrl('views/js/site/busca.js'));
    }
    
    public function indexAction() {
        
        $key = $this->getRequest()->getParam('busca', null);        
        $modelEmpresa = new Model_DbTable_Empresa();
        $servicos = $modelEmpresa->busca($key);
        $this->view->servicos = $servicos;        
        
        /**
         * Grava a busca
         */
        if ($key) {
            $dataBusca = array(
                'busca_key' => $key,
                'busca_session' => Zend_Session::getId()
            );
            $modelBusca = new Model_DbTable_Busca();
            try {
                $modelBusca->insert($dataBusca);
            } catch (Exception $ex) {
                //Zend_Debug::dump($ex->getMessage());
            }
            
        } else {
            die("Invalid");
        }
                
    }
    
    public function servicoAction() {
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        
        $servicos = $this->getServicos();
        
        echo Zend_Json_Encoder::encode($servicos);
        
    }
    
    /**
     * 
     * Retorna os servicos cadastrados
     * 
     * @return type
     */
    private function getServicos() {
        
        $key = $this->getRequest()->getParam('key');     
        $modelSercvico = new Model_DbTable_Servico();
        $where = "servico_tag like '%{$key}%'";
        $servicos = $modelSercvico->fetchAll($where);
        
        //Zend_Debug::dump($servicos); die();
        
        $array = array();        
        $arrayServicos = array();
        foreach ($servicos as $servico) {
            $arrayServicos[] = $servico->servico_tag;            
        }
        
        $arrayServicos = array_unique($arrayServicos);
        
        return $arrayServicos;
    }
    
}
