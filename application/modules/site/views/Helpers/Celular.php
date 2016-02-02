<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Celular
 *
 * @author Fernando Rodrigues
 */
class Zend_View_Helper_Celular extends Zend_View_Helper_Abstract {
    
    public function celular($numero) {
        return substr($numero, 0, -4)."XXXX";
    }
    
}
