<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ShipmentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->with('group.general', ['class' => 'col-md-6'])
            ->add('id', null, [
                'required' => false,
                'disabled' => true,
            ])
            ->add('sendDate', null, [
                'required' => true,
            ])
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter->add('sendDate');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->addIdentifier('id')
            ->add('sendDate')
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->with('group.general', ['class' => 'col-md-6'])
            ->add('id')
            ->add('sendDate')
            ->end()
        ;
    }
}