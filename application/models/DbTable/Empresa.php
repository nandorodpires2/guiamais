<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empresa
 *
 * @author Fernando Rodrigues
 */
class Model_DbTable_Empresa extends Zend_Db_Table_Abstract {
    
    protected $_name = "empresa";
    protected $_primary = "empresa_id";
    
    public function busca($key) {
        
        $select = $this->select()
                ->from($this->_name, array('*'))
                ->where("empresa_servico like '%{$key}%'");
        echo $select->__toString();
        return $this->fetchAll($select);
        
    }
    
}
