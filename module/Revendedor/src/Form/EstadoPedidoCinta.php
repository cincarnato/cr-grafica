<?php
/**
 * Created by PhpStorm.
 * User: crist
 * Date: 24/1/2019
 * Time: 19:38
 */

namespace Revendedor\Form;


use Zend\Form\Form;

class EstadoPedidoCinta extends Form
{


    public function __construct($em) {
        parent::__construct('EstadoPedidoCinta');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', "form-horizontal");
        $this->setAttribute('role', "form");

        $this->add(array(
            'name' => 'id',
            'type' => 'Zend\Form\Element\Hidden',
        ));

        $this->add(array(
            'name' => 'estado',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'attributes' => array(
                'required' => false,
                "class" => "form-control"
            ),
            'options' => array(
                'object_manager' => $em,
                'target_class' => 'Revendedor\Entity\Estado',
                'property' => 'nombre',
                'label' => "Estado",
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => "Guardar",
                'class' => "btn btn-primary"
            )
        ));


    }


}