<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PalletAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->with('group.general', ['class' => 'col-md-6'])
                ->add('id', null, [
                    'required' => false,
                    'disabled' => true,
                ])
                ->add('shipment', null, [
                    'required' => true,
                ])
                ->add('receiver', null, [
                    'required' => true,
                ])
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('receiver')
            ->add('shipment')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->addIdentifier('id')
            ->add('receiver')
            ->add('shipment')
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->with('group.general', ['class' => 'col-md-6'])
                ->add('id')
                ->add('receiver')
                ->add('shipment')
//                ->add('boxes')
            ->end()
        ;
    }
}