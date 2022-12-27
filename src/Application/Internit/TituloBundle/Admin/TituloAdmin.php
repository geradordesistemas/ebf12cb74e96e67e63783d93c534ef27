<?php
namespace App\Application\Internit\TituloBundle\Admin;

use App\Application\Internit\TituloBundle\Entity\Titulo;
use App\Application\Internit\TipoTituloBundle\Entity\TipoTitulo;
use App\Application\Internit\CorpoAcademicoBundle\Entity\CorpoAcademico;

use App\Application\Project\ContentBundle\Admin\Base\BaseAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/** Components Form */
use Sonata\DoctrineORMAdminBundle\Filter\ModelFilter;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class TituloAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof Titulo ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('titulo',  TextType::class, [
                    'label' => 'Titulo',
                    'required' =>  true ,
                    
                ]);

                $form->add('descricao',  TextareaType::class, [
                    'label' => 'Descricao',
                    'required' =>  false ,
                    
                ]);

                $form->add('tipo', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Tipo',
                    'help' => 'Filtros para pesquisa: [ id, tipo, descricao,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getTipo();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","tipo","descricao", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);


            $form->end();
        $form->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('id', null, [
            'label' => 'Id',
        ]);

        $datagrid->add('titulo', null, [
            'label' => 'Titulo',
        ]);

        $datagrid->add('descricao', null, [
            'label' => 'Descricao',
        ]);

        $datagrid->add('tipo', ModelFilter::class, [
            'label' => 'Tipo',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (TipoTitulo $tipo) {
                    return $tipo->getId()
                    .' - '.$tipo->getTipo()
                    ;
                },
            ],
        ]);

    $datagrid->add('academicos', ModelFilter::class, [
        'label' => 'Academicos',
        'field_options' => [
            'multiple' => true,
            'choice_label'=> function (CorpoAcademico $academicos) {
                return $academicos->getId()
                .' - '.$academicos->getNome()
                .' - '.$academicos->getSobrenome()
                ;
            },
        ],
    ]);

    }

    protected function configureListFields(ListMapper $list): void
    {

        $list->addIdentifier('id', null, [
            'label' => 'Id',
                                                            
        ]);


        $list->addIdentifier('titulo', null, [
            'label' => 'Titulo',
                                                            
        ]);


        $list->addIdentifier('descricao', null, [
            'label' => 'Descricao',
                                                            
        ]);


        $list->add('tipo', null, [
            'label' => 'Tipo',
            'associated_property' => function (TipoTitulo $tipo) {
                return $tipo->getId()
                .' - '.$tipo->getTipo()
                ;
            },
        ]);




        $list->add(ListMapper::NAME_ACTIONS, ListMapper::TYPE_ACTIONS, [
            'actions' => [
                'show'   => [],
                'edit'   => [],
                'delete' => [],
            ]
        ]);

    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->tab('Geral');
            $show->with('Informações Gerais', [
                'class'       => 'col-md-12',
                'box_class'   => 'box box-solid box-primary',
                'description' => 'Informações Gerais',
            ]);

                $show->add('id', null, [
                    'label' => 'Id',
                                                            
                ]);

                $show->add('titulo', null, [
                    'label' => 'Titulo',
                                                            
                ]);

                $show->add('descricao', null, [
                    'label' => 'Descricao',
                                                            
                ]);

                $show->add('tipo', null, [
                    'label' => 'Tipo',
                    'associated_property' => function (TipoTitulo $tipo) {
                        return $tipo->getId()
                        .' - '.$tipo->getTipo()
                        ;
                    },
                ]);



            $show->end();
        $show->end();
    }


}