<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrador
 *
 * @author Fernando
 */
class Model_DbTable_Administrador extends Zend_Db_Table_Abstract {
    
    protected $_name = "administrador";
    protected $_primary = "administrador_id";
    
    public function getCredentials($login, $password) {
        
        $select = $this->select()
                ->from($this->_name)
                ->where("administrador_email = ?", $login)
                ->where("administrador_senha = ?", md5($password));
        
        return $this->fetchRow($select);
        
    }
    
}
