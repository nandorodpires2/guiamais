<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Busca
 *
 * @author Fernando Rodrigues
 */
class Form_Site_Busca extends Zend_Form {
    
    public function init() {
        
        $this->setAttribs(array(
            'id' => 'formSiteBusca',
            'class' => 'form-inline'
        ));
        
        // busca
        $busca = new Zend_Form_Element_Text("busca");
        $busca->setLabel("Porduto/Serviço: ");
        $busca->setAttribs(array(
            'class' => 'form-control'
        ));
        $busca->setRequired();
        
        // submit
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setAttrib("class", 'btn btn-default');
        $submit->setLabel("Pesquisar");
        
        $this->addElements(array(
            $busca,
            $submit
        ));        
        
    }
    
}
