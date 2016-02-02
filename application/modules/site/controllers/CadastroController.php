<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CadastroController
 *
 * @author Fernando Rodrigues
 */
class Site_CadastroController extends Zend_Controller_Action {
    
    public function init() {
        $this->view->headScript()->appendFile($this->view->baseUrl('views/js/site/cadastro.js')); 
    }
    
    /**
     * 
     */
    public function indexAction() {
        
        $formSiteCadastro = new Form_Site_Cadastro();
        $this->view->formSiteCadastro = $formSiteCadastro;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();            
            if ($formSiteCadastro->isValid($data)) {
                $data = $formSiteCadastro->getValues();
                
                try {
                    $modelEmpresa = new Model_DbTable_Empresa();
                    $modelEmpresa->insert($data);
                    
                    $this->setServicos($data['empresa_servico']);
                    
                    $this->_redirect("/index");
                    
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
                
            } else {
                Zend_Debug::dump($formSiteCadastro->getErrorMessages());
            }
        }
        
    }
    
    /**
     * 
     */
    public function validarAction() {
        
        $empresa_id = $this->getRequest()->getParam("empresa");        
        $this->view->is_post = false;         
        
        /**
         * dados da empresa
         */
        $modelEmpresa = new Model_DbTable_Empresa();
        $empresa = $modelEmpresa->getEmpresa($empresa_id);
        $this->view->empresa = $empresa;
        
        if ($this->getRequest()->isPost()) {
                        
            $telefone = $this->getRequest()->getParam("telefone", null);
            $codigo = $this->getRequest()->getParam("codigo", null);
            
            if ($telefone) {
                $this->sendCode($telefone, $empresa_id);
            }
            
            if ($codigo) {
                $this->checkCode($codigo, $empresa_id);
            }            
            
            $this->view->is_post = true;
        }
        
    }
    
    /**
     * 
     * @param type $phone
     */
    private function sendCode($phone, $empresa_id) {
        
    }
    
    /**
     * 
     * @param type $code
     */
    private function checkCode($code, $empresa_id) {
        $code_ok = '1234';
        
        if ($code == $code_ok) {
            
            // atualiza o status
            $modelEmpresa = new Model_DbTable_Empresa();
            try {
                $modelEmpresa->update(array('empresa_ativo' => 1), "empresa_id = {$empresa_id}");
                $this->_redirect("cadastro/validar/empresa/{$empresa_id}");
            } catch (Exception $ex) {

            }
            
        } else {
            die('codigo errado');
        }
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
    
}
