<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CadastroServico
 *
 * @author Fernando
 */
class Form_Admin_CadastroServico extends Zend_Form {
    
    public function init() {
        
        //servico_tag
        $servico_tag = new Zend_Form_Element_Text("servico_tag");
        $servico_tag->setLabel("Serviço");
        $servico_tag->setRequired();
        $servico_tag->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // submit
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setLabel("Enviar");
        $submit->setAttribs(array(
            'class' => 'form-control btn btn-sm btn-success'
        ));
        
        $this->addElements(array(
            $servico_tag,
            $submit
        ));
        
    }
    
}
