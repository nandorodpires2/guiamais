<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Servico
 *
 * @author Fernando Rodrigues
 */
class Model_DbTable_Servico extends Zend_Db_Table_Abstract {
    
    protected $_name = "servico";
    protected $_primary = "servico_id";
    
    public function getServicos() {
        
        $select = $this->select()
                ->from($this->_name)
                ->where("servico_ativo = ?", 1);
        
        return $this->fetchAll($select);
        
    }
    
    public function getServico($servico) {
        
        $select = $this->select()
                ->from($this->_name)
                ->where("servico_tag = ?", $servico);
        
        return $this->fetchRow($select);
        
    }
    
}
