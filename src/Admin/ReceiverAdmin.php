<?php

namespace App\Admin;

use Doctrine\DBAL\Schema\AbstractAsset;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ReceiverAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->with('group.general', ['class' => 'col-md-6'])
                ->add('id', null, [
                    'required' => false,
                    'disabled' => true,
                ])
                ->add('name', null, [
                    'required' => true,
                ])
                ->add('phoneNumber', null, [
                    'required' => true,
                ])
                ->add('address', null, [
                    'required' => true,
                ])
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('name')
            ->add('phoneNumber')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('id')
            ->addIdentifier('name')
            ->add('phoneNumber')
            ->add('address')
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->with('group.general', ['class' => 'col-md-6'])
                ->add('id')
                ->add('name')
                ->add('phoneNumber')
                ->add('address')
            ->end()
        ;
    }
}
