<?php
namespace App\Application\Internit\CursoBundle\Admin;

use App\Application\Internit\CursoBundle\Entity\Curso;
use App\Application\Internit\TipoCursoBundle\Entity\TipoCurso;
use App\Application\Internit\RegimeBundle\Entity\Regime;
use App\Application\Internit\DocumentoAcademicoBundle\Entity\DocumentoAcademico;

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

final class CursoAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof Curso ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('nome',  TextType::class, [
                    'label' => 'Nome',
                    'required' =>  true ,
                    
                ]);

                $form->add('descricao',  TextareaType::class, [
                    'label' => 'Descricao',
                    'required' =>  false ,
                    
                ]);

                $form->add('tipoCurso', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o TipoCurso',
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

                $form->add('regime', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Regime',
                    'help' => 'Filtros para pesquisa: [ id, regime, descricao,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getRegime();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","regime","descricao", ]))
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

        $datagrid->add('nome', null, [
            'label' => 'Nome',
        ]);

        $datagrid->add('descricao', null, [
            'label' => 'Descricao',
        ]);

        $datagrid->add('tipoCurso', ModelFilter::class, [
            'label' => 'TipoCurso',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (TipoCurso $tipoCurso) {
                    return $tipoCurso->getId()
                    .' - '.$tipoCurso->getTipo()
                    ;
                },
            ],
        ]);

        $datagrid->add('regime', ModelFilter::class, [
            'label' => 'Regime',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Regime $regime) {
                    return $regime->getId()
                    .' - '.$regime->getRegime()
                    ;
                },
            ],
        ]);

    $datagrid->add('documentoAcademico', ModelFilter::class, [
        'label' => 'DocumentoAcademico',
        'field_options' => [
            'multiple' => true,
            'choice_label'=> function (DocumentoAcademico $documentoAcademico) {
                return $documentoAcademico->getId()
                .' - '.$documentoAcademico->getTitulo()
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


        $list->addIdentifier('nome', null, [
            'label' => 'Nome',
                                                            
        ]);


        $list->addIdentifier('descricao', null, [
            'label' => 'Descricao',
                                                            
        ]);


        $list->add('tipoCurso', null, [
            'label' => 'TipoCurso',
            'associated_property' => function (TipoCurso $tipoCurso) {
                return $tipoCurso->getId()
                .' - '.$tipoCurso->getTipo()
                ;
            },
        ]);


        $list->add('regime', null, [
            'label' => 'Regime',
            'associated_property' => function (Regime $regime) {
                return $regime->getId()
                .' - '.$regime->getRegime()
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

                $show->add('nome', null, [
                    'label' => 'Nome',
                                                            
                ]);

                $show->add('descricao', null, [
                    'label' => 'Descricao',
                                                            
                ]);

                $show->add('tipoCurso', null, [
                    'label' => 'TipoCurso',
                    'associated_property' => function (TipoCurso $tipoCurso) {
                        return $tipoCurso->getId()
                        .' - '.$tipoCurso->getTipo()
                        ;
                    },
                ]);

                $show->add('regime', null, [
                    'label' => 'Regime',
                    'associated_property' => function (Regime $regime) {
                        return $regime->getId()
                        .' - '.$regime->getRegime()
                        ;
                    },
                ]);



            $show->end();
        $show->end();
    }


}