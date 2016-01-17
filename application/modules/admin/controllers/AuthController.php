<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthController
 *
 * @author Fernando
 */
class Admin_AuthController extends Zend_Controller_Action {
    
    public function indexAction() {
        
    }
    
    public function loginAction() {
        
        $formAdminLogin = new Form_Admin_Login();
        $this->view->formAdminLogin = $formAdminLogin;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($formAdminLogin->isValid($data)) {
                
                $email = $formAdminLogin->getValue('administrador_email');                
                $senha = $formAdminLogin->getValue('administrador_senha'); 
                                
                $db = Zend_Registry::get('db');               
                $authAdapter = new Zend_Auth_Adapter_DbTable($db);
                
                $authAdapter->setTableName('administrador')
                        ->setIdentityColumn('administrador_email')
                        ->setCredentialColumn('administrador_senha')
                        ->setIdentity($email)
                        ->setCredential(md5($senha));
                $authAdapter->getDbSelect()->where("administrador_ativo = ?", 1);

                $auth = Zend_Auth::getInstance();                
                $result = $auth->authenticate($authAdapter);
                
                if ($result->isValid()) {                        
                    $modelAdministrador = new Model_DbTable_Administrador();
                    $administrador = $modelAdministrador->getCredentials($email, $senha);                    
                    Zend_Auth::getInstance()->getStorage()->write($administrador); 
                    
                    $this->_redirect("/admin");
                    
                } else {
                    die("Dados incorretos!");
                }
                
            }
            
        }
        
    }
    
}
