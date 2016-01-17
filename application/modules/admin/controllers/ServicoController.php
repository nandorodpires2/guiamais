<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServicoController
 *
 * @author Fernando
 */
class Admin_ServicoController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
        
    }
    
    public function cadastroAction() {
        
        $formCadastroServico = new Form_Admin_CadastroServico();
        $this->view->formCadastroServico = $formCadastroServico;
        
        if ($this->getRequest()->isPost()) {
            $dataPost = $this->getRequest()->getPost();
            if ($formCadastroServico->isValid($dataPost)) {
                
                $dataPost = $formCadastroServico->getValues();
                
                try {
                    $modelServico = new Model_DbTable_Servico();
                    $modelServico->insert($dataPost);
                    $this->_redirect("admin/servico/cadastro");
                } catch (Exception $ex) {
                    if ($ex->getCode() === 1062) {
                        die("Já cadastrado!");
                    }
                }
                
            }
        }
        
    }
    
}
