<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbTable
 *
 * @author Fernando
 */
class App_Model_DbTable extends Zend_Db_Table_Abstract {
    
    protected $_name;
    protected $_primary;

    public function getQueryAll() {
        $select = $this->select()
                ->from($this->_name, array('*'))
                ->setIntegrityCheck(false);
        return $select;
    }

    public function getById($id) {                
        $primary = is_array($this->_primary) ? $this->_primary[0] : $this->_primary;
        $select = $this->getQueryAll()
                ->where($primary . " = ?", $id);
        
        return $this->fetchRow($select);
    }            
    
}
