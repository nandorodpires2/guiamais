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
    
    public function indexAction() {
        
        $formSiteCadastro = new Form_Site_Cadastro();
        $this->view->formSiteCadastro = $formSiteCadastro;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();            
            if ($formSiteCadastro->isValid($data)) {
                $data = $formSiteCadastro->getValues();
                
                $data['empresa_servico'] = explode(',', $data['empresa_servico']);
                $options = array('charset' => 'utf-8');
                $data['empresa_servico'] = Zend_Json_Encoder::encode($data['empresa_servico'], false, $options);
                
                Zend_Debug::dump($data); die();
                
                try {
                    $modelEmpresa = new Model_DbTable_Empresa();
                    $modelEmpresa->insert($data);
                    
                    $this->setServicos($data['empresa_servico']);
                    
                    $this->_redirect("/index");
                    
                } catch (Exception $ex) {
                    echo "Deu erro: " . $ex->getMessage();
                    $this->_redirect("/cadastro");
                }
                
            }
        }
        
    }
    
    private function setServicos($servicos) {
        $servicos = Zend_Json_Decoder::decode($servicos);
        
        foreach ($servicos as $servico) {
            $modelServico = new Model_DbTable_Servico();
            $modelServico->insert(array('servico_tag' => $servico));
        }
        
    }
    
}
