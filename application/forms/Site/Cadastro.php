<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cadastro
 *
 * @author Fernando Rodrigues
 */
class Form_Site_Cadastro extends Zend_Form {
    
    public function init() {
     
        $this->setAttribs(array(
            'id' => 'formSiteCadastro'
        ));
        
        // empresa_tipo
        $empresa_tipo = new Zend_Form_Element_Radio("empresa_tipo");
        $empresa_tipo->setLabel("Tipo: ");
        $empresa_tipo->setMultiOptions(array(
            1 => ' Pessoa Física',
            2 => ' Pessoa Jurídica'
        ));
        $empresa_tipo->setRequired();
        
        // empresa_cpf_cnpj
        
        // empresa_nome
        $empresa_nome = new Zend_Form_Element_Text("empresa_nome");
        $empresa_nome->setLabel("Empresa: ");
        $empresa_nome->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // empresa_responsavel
        $empresa_responsavel = new Zend_Form_Element_Text("empresa_responsavel");
        $empresa_responsavel->setLabel("Responsável: ");
        $empresa_responsavel->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // empresa_email
        $empresa_email = new Zend_Form_Element_Text("empresa_email");
        $empresa_email->setLabel("E-mail: ");
        $empresa_email->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // empresa_telefone
        
        
        // empresa_celular
        $empresa_celular = new Zend_Form_Element_Text("empresa_celular");
        $empresa_celular->setLabel("Celular: ");
        $empresa_celular->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // empresa_endereco
        
        // empresa_numero
        
        // empresa_complemento
        
        // empresa_bairro
        
        // empresa_cidade
        
        // empresa_estado
        
        // empresa_servico
        $empresa_servico = new Zend_Form_Element_Textarea("empresa_servico");
        $empresa_servico->setLabel("Cadastre os serviços que oferece:");
        $empresa_servico->setAttribs(array(
            'class' => 'form-control',
            'rows' => 10
        ));        
        
        // submit
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setAttrib("class", 'btn btn-default');
        $submit->setLabel("Cadastrar");
        
        $this->addElements(array(
            $empresa_tipo,
            $empresa_nome,
            $empresa_responsavel,
            $empresa_email,
            $empresa_celular,
            $empresa_servico,
            $submit
        ));  
        
    }
    
}
