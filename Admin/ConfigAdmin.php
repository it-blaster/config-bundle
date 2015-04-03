<?php

namespace ItBlaster\ConfigBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Bridge\Propel1\Form\Type\TranslationCollectionType;
use Symfony\Bridge\Propel1\Form\Type\TranslationType;

class ConfigAdmin extends Admin
{
    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('Id')
            ->addIdentifier('Name', null, array(
                'label' => 'it_blaster_config_form_name',
                'sortable' => true,
            ))
            ->addIdentifier('Title', null, array(
                'label' => 'it_blaster_config_form_title',
                'sortable' => true,
            ))
            ->add('Value', null, array(
                'label' => 'it_blaster_config_form_value',
                'sortable' => false,
            ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                ),
                'label' => 'it_blaster_config_form_edit',
                'sortable' => false
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('it_blaster_config_form_name', ['class'=>'col-md-6'])
                ->add('Name', null, [
                    'label' => 'it_blaster_config_form_name',
                    'read_only' => !$this->getSubject()->isNew(),
                ])
                ->add('Title', null, [
                    'label' => 'it_blaster_config_form_title',
                ])
                ->add('ConfigI18ns', new TranslationCollectionType(), [
                    'label'     => false,
                    'required'  => false,
                    'type'      => new TranslationType(),
                    'languages' => $this->getConfigurationPool()->getContainer()->getParameter('locales'),
                    'options'   => [
                        'label'      => false,
                        'data_class' => 'ItBlaster\ConfigBundle\Model\ConfigI18n',
                        'columns'    => [
                            'Value' => [
                                'type' => 'textarea',
                            ],
                        ],
                    ]
                ])
            ->end()
        ;
    }

    /**
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('batch')
            ->remove('delete')
            ->remove('show')
            ->remove('export');
    }
}
