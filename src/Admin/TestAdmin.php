<?php

namespace App\Admin;

use App\Form\Admin\QuestionType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class TestAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'test';
    protected $baseRouteName = 'test';

    protected function configureFormFields(FormMapper $formMapper)
    {
//        $formMapper->add('name', TextType::class)
//                   ->add('questions', CollectionType::class, [
//                       'entry_type' => QuestionType::class,
//                       'entry_options' => ['label' => false],
//                       'allow_add' => true,
//                   ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
    }
}