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
                
    }
    
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
                    
                    $this->_redirect("/index");
                    
                } catch (Exception $ex) {
                    echo "Deu erro: " . $ex->getMessage();
                    $this->_redirect("/cadastro");
                    
                }
                
            }
        }
        
    }
    
}
