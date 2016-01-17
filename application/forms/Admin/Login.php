<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Fernando
 */
class Form_Admin_Login extends Zend_Form {
    
    public function init() {
        
        // administrador_email
        $administrador_email = new Zend_Form_Element_Text("administrador_email");
        $administrador_email->setLabel("E-mail");
        $administrador_email->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe o email'
        ));
        $administrador_email->setRequired();
        
        // administrador_senha
        $administrador_senha = new Zend_Form_Element_Password("administrador_senha");
        $administrador_senha->setLabel("Senha");
        $administrador_senha->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe a senha'
        ));
        $administrador_senha->setRequired();
        
        // submit
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setLabel("Enviar");
        $submit->setAttribs(array(
            'class' => 'form-control btn btn-sm btn-success'
        ));
        
        $this->addElements(array(
            $administrador_email,
            $administrador_senha,
            $submit
        ));
        
    }
    
}
