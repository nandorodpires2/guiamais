<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmpresaController
 *
 * @author Nando
 */
class Admin_EmpresaController extends Zend_Controller_Action {
    
    public function init() {
        $this->view->headScript()->appendFile($this->view->baseUrl('views/js/admin/empresa/cadastro.js')); 
    }
    
    public function indexAction() {
        
    }
    
    public function cadastroAction() {
        $formSiteCadastro = new Form_Site_Cadastro();
        $formSiteCadastro->addElement("checkbox", "empresa_ativo", array(
            'label' => 'Ativo?',
            'order' => 12
        ));
        $this->view->formSiteCadastro = $formSiteCadastro;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();            
            if ($formSiteCadastro->isValid($data)) {
                $data = $formSiteCadastro->getValues();
                                                               
                try {
                    $modelEmpresa = new Model_DbTable_Empresa();
                    $modelEmpresa->insert($data);
                    
                    $this->setServicos($data['empresa_servico']);
                    
                    $this->_redirect("admin/empresa/cadastro");
                    
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
                
            } else {
                Zend_Debug::dump($formSiteCadastro->getErrorMessages());
            }
        }
    }
    
    public function buscaServicoAction() {
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        
        $servicos = $this->getServicos();
        
        echo Zend_Json_Encoder::encode($servicos);
        
    }
    
    /**
     * 
     * @param type $servicos
     */
    private function setServicos($servicos) {
        $servicos = explode(',', $servicos);
        
        foreach ($servicos as $servico) {
            $modelServico = new Model_DbTable_Servico();
            
            // verifica se já existe o servico
            $hasServico = $modelServico->getServico($servico);            
            if (!$hasServico) {
                $modelServico->insert(array('servico_tag' => $servico));
            }
            
        }
        
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
