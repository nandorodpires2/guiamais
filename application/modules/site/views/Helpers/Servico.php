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
class Zend_View_Helper_Servico extends Zend_View_Helper_Abstract {
    
    public function servico($servico) {
        
        $servicos = Zend_Json_Decoder::decode($servico);
        return implode(', ', $servicos);
        
    }
    
}
